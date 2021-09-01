<?php

namespace Modules\ProductCategories\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\ProductCategories\Entities\Entity as ProductCategories;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $productcategoriess = ProductCategories::all();;

        return view('productcategories::index', compact(['productcategoriess']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $productcategories = new ProductCategories();

        $form = $formBuilder->create('Modules\ProductCategories\Form\ProductCategoriesForm', [
            'method' => 'POST',
            'url' => url('admin/productcategories/store'),
            'model' => $productcategories
        ]);

        return view('productcategories::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            DB::commit();

            $productcategories = $this->save( new ProductCategories, $request );

            Session::flash('type', 'success');
            Session::flash('message', 'Item adicionado com sucesso');

            return redirect()->route('Admin.ProductCategories');

        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.ProductCategories');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(FormBuilder $formBuilder, ProductCategories $productcategories)
    {
        $form = $formBuilder->create('Modules\ProductCategories\Form\ProductCategoriesForm', [
            'method' => 'PUT',
            'url' => url('admin/productcategories/update/'.$productcategories->id),
            'model' => $productcategories
        ]);
        return view('productcategories::edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, ProductCategories $productcategories)
    {
        DB::beginTransaction();

        try {
            DB::commit();

            $productcategories = $this->save( $productcategories, $request );

            Session::flash('type', 'success');
            Session::flash('message', 'Item editado com sucesso');

            return redirect()->route('Admin.ProductCategories');
        } catch (\Throwable $th) {
             DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.ProductCategories');
        }
    }

    public function save(ProductCategories $productcategories, Request $request){

        foreach($productcategories->getFillable() as $fillable){
           $productcategories->$fillable = $request->input($fillable);
        }

        $productcategories->save();

        return $productcategories;

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
