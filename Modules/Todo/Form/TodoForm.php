<?php namespace Modules\Todo\Form;

use Kris\LaravelFormBuilder\Form;

class TodoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('titulo', 'text')
            ->add('descricao', 'text')
            ->add('submit', 'submit', ['label' => 'Salvar', 'attr' => ['class' => 'btn btn-primary']]);
    }
}
