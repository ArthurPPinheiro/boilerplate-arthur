<?php namespace Modules\Teste2\Form;

use Kris\LaravelFormBuilder\Form;

class Teste2Form extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('email', 'text');
    }
}
