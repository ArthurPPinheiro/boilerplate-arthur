<?php namespace Modules\Product\Form;

use Kris\LaravelFormBuilder\Form;
use Modules\ProductCategories\Entities\Entity as Categories;

class ProductForm extends Form
{
    public function buildForm()
    {
        $categoriesList  = array();
        $categories = Categories::get();

        foreach($categories as $category){
            $categoriesList[$category->id] = $category->name;
        }

        $selected_category = null;
        if (isset($this->model->category_id)) {
            $selected_category = $this->model->category_id;
        }

        $this
            ->add('name', 'text', ['label' => 'Nome'])
            ->add('sku', 'text', ['label' => 'SKU'])
            ->add('stock', 'number', ['label' => 'Estoque'])
            ->add('price', 'number', ['label' => 'Preço', 'attr' => ['step' => '0.01']])
            ->add('slug', 'text', ['label' => 'Slug'])
            ->add('description', 'textarea', ['label' => 'Descrição'])
            ->add('status', 'choice', ['choices' => ['1' => 'Ativo', '0' => 'Inativo'], 'label' => 'Status'])
            ->add('weight', 'number', ['label' => 'Peso (g)'])
            ->add('width', 'number', ['label' => 'largura (cm)'])
            ->add('height', 'number', ['label' => 'Altura (cm)'])
            ->add('length', 'number', ['label' => 'Comprimento (cm)'])
            ->add('image', 'image', ['label' => 'Imagem'])
            ->add('category_id', 'choice', ['choices' => $categoriesList, 'label' => 'Categoria', 'selected' => $selected_category])
            ->add('galeria', 'image', ['label' => 'Imagem', 'attr' => ['multiple', true]])

            ->add('submit', 'submit', ['label' => 'Salvar', 'attr' => ['class' => 'btn btn-primary']]);
    }
}
