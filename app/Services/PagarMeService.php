<?php

namespace App\Services;

use App\Enums\PaymentGateways;

class PagarMeService {

    public static function transaction($user)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $transaction = $pagarme->transactions()->create([
            'amount' => 1000,
            'payment_method' => 'credit_card',
            'card_holder_name' => 'Anakin Skywalker',
            'card_cvv' => '123',
            'card_number' => '4242424242424242',
            'card_expiration_date' => '1220',
            'customer' => [
                'external_id' => '1',
                'name' => 'Nome do cliente',
                'type' => 'individual',
                'country' => 'br',
                'documents' => [
                  [
                    'type' => 'cpf',
                    'number' => '00000000000'
                  ]
                ],
                'phone_numbers' => [ '+551199999999' ],
                'email' => 'cliente@email.com'
            ],
            'billing' => [
                'name' => 'Nome do pagador',
                'address' => [
                  'country' => 'br',
                  'street' => 'Avenida Brigadeiro Faria Lima',
                  'street_number' => '1811',
                  'state' => 'sp',
                  'city' => 'Sao Paulo',
                  'neighborhood' => 'Jardim Paulistano',
                  'zipcode' => '01451001'
                ]
            ],
            'shipping' => [
                'name' => 'Nome de quem receberá o produto',
                'fee' => 1020,
                'delivery_date' => '2018-09-22',
                'expedited' => false,
                'address' => [
                  'country' => 'br',
                  'street' => 'Avenida Brigadeiro Faria Lima',
                  'street_number' => '1811',
                  'state' => 'sp',
                  'city' => 'Sao Paulo',
                  'neighborhood' => 'Jardim Paulistano',
                  'zipcode' => '01451001'
                ]
            ],
            'items' => [
                [
                  'id' => '1',
                  'title' => 'R2D2',
                  'unit_price' => 300,
                  'quantity' => 1,
                  'tangible' => true
                ],
                [
                  'id' => '2',
                  'title' => 'C-3PO',
                  'unit_price' => 700,
                  'quantity' => 1,
                  'tangible' => true
                ]
            ]
        ]);

        return $transaction;
    }

    public static function capture($transaction)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $capturedTransaction = $pagarme->transactions()->capture([
            'id' => 'ID_OU_TOKEN_DA_TRANSAÇÃO',
            'amount' => $transaction->amount
        ]);

        return $capturedTransaction;
    }

    public static function refund($transaction)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $refundedTransaction = $pagarme->transactions()->refund([
            'id' => $transaction->id,
        ]);

        return $refundedTransaction;
    }

    public static function partialRefund($transaction)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $partialRefundedTransaction = $pagarme->transactions()->refund([
            'id' => $transaction->id,
            'amount' => 'VALOR_PARCIAL_DO_ESTORNO',
        ]);

        return $partialRefundedTransaction;
    }

    public static function getTransactions()
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        return $pagarme->transactions()->getList();
    }

    public static function getPaidTransactions()
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        return $pagarme->transactions()->getList([
            'status' => 'paid'
        ]);
    }

    public static function getTransaction($transaction_id)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        return $pagarme->transactions()->get([
            'id' => $transaction_id
        ]);
    }

    public static function notifyBoleto($transaction)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $transactionPaymentNotify = $pagarme->transactions()->collectPayment([
            'id' => 'ID_DA_TRANSAÇÃO',
            'email' => 'cliente@email.com'
        ]);

        return $transactionPaymentNotify;
    }

    public static function getInstallments($amount)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $calculateInstallments = $pagarme->transactions()->calculateInstallments([
            'amount' => 'VALOR_DA_TRANSAÇÃO_EM_CENTAVOS',
            'free_installments' => 'PARCELAS_SEM_JUROS',
            'max_installments' => 'MÁXIMO_DE_PARCELAS',
            'interest_rate' => 'TAXA_DE_JUROS_AO_MÊS'
        ]);

        return $calculateInstallments;
    }

    public static function boletoSetPaid($transaction)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $paidBoleto = $pagarme->transactions()->simulateStatus([
            'id' => 'ID_DA_TRANSAÇÃO',
            'status' => 'paid'
        ]);

        return $paidBoleto;
    }

    public static function getRefunds()
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        return $pagarme->refunds()->getList();
    }

    public static function getRefund($transaction)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        return $pagarme->refunds()->getList([
            'transaction_id' => 'ID_DA_TRANSAÇÃO_ESTORNADA'
        ]);
    }

    public static function createCard($card)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $card = $pagarme->cards()->create([
            'holder_name' => 'Yoda',
            'number' => '4242424242424242',
            'expiration_date' => '1225',
            'cvv' => '123'
        ]);

        return $card;
    }

    public static function getCards()
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $card = $pagarme->cards()->create([
            'holder_name' => 'Yoda',
            'number' => '4242424242424242',
            'expiration_date' => '1225',
            'cvv' => '123'
        ]);

        return $pagarme->cards()->getList();
    }

    public static function getCard($card_id)
    {
        $pagarme = new PagarMe\Client('SUA_CHAVE_DE_API');

        $card = $pagarme->cards()->get([
            'id' => 'ID_DO_CARTÃO'
        ]);

        return $card;
    }

}
