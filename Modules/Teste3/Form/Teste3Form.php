<?php namespace Modules\Teste3\Form;

use Kris\LaravelFormBuilder\Form;

class Teste3Form extends Form
{
    public function buildForm()
    {
        $this
            ->add('teste', 'text')
            ->add('submit', 'submit', ['label' => 'Salvar', 'attr' => ['class' => 'btn btn-primary']]);
    }
}
