<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentGateways extends Enum
{
    const PagarMe      = 0;
    const PagSeguro    = 1;
    const MercadoPago  = 2;

    public static function getDescription($value): string
    {
        if ($value == self::PagarMe) {
            return 'Pagar.Me';
        }

        if ($value == self::PagSeguro) {
            return 'PagSeguro';
        }

        if ($value == self::MercadoPago) {
            return 'Mercado Pago';
        }

        return parent::getDescription($value);
    }
}
