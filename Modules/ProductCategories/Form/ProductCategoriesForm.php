<?php namespace Modules\ProductCategories\Form;

use Kris\LaravelFormBuilder\Form;

class ProductCategoriesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->add('submit', 'submit', ['label' => 'Salvar', 'attr' => ['class' => 'btn btn-primary']]);
    }
}
