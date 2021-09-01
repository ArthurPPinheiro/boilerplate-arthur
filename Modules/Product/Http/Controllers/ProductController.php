<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Product\Entities\Entity as Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::all();;

        return view('product::index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $product = new Product();

        $form = $formBuilder->create('Modules\Product\Form\ProductForm', [
            'method' => 'POST',
            'url' => url('admin/product/store'),
            'model' => $product
        ]);

        return view('product::create', compact('form'));
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

            $product = $this->save( new Product, $request );

            Session::flash('type', 'success');
            Session::flash('message', 'Item adicionado com sucesso');

            return redirect()->route('Admin.Product');

        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Product');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(FormBuilder $formBuilder, Product $product)
    {
        $form = $formBuilder->create('Modules\Product\Form\ProductForm', [
            'method' => 'PUT',
            'url' => url('admin/product/update/'.$product->id),
            'model' => $product
        ]);
        return view('product::edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Product $product)
    {
        DB::beginTransaction();

        try {
            DB::commit();

            $product = $this->save( $product, $request );

            Session::flash('type', 'success');
            Session::flash('message', 'Item editado com sucesso');

            return redirect()->route('Admin.Product');
        } catch (\Throwable $th) {
             DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Product');
        }
    }

    public function save(Product $product, Request $request){

        foreach($product->getFillable() as $fillable){
           $product->$fillable = $request->input($fillable);
        }

        $product->save();

        return $product;

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
