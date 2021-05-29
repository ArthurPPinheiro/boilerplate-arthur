<?php

namespace Modules\Teste2\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Kris\LaravelFormBuilder\FormBuilder;

use Modules\Teste2\Entities\Teste2;

class Teste2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('teste2::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('Modules\Teste2\Form\Teste2Form', [
            'method' => 'POST',
            'url' => url('teste2/store')
        ]);

        return view('teste2::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $teste2 = $this->save( new Teste2, $request );

            return redirect()->back()->with('message', 'Item Cadastrado');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('teste2::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $teste2 = Teste2::where('id', $id)->first();
        try {
            $teste2 = $this->save( $teste2, $request );

            return redirect()->back()->with('message', 'Item Cadastrado');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function save(Teste2 $teste2, Request $request){

        $teste2->name = $request->name;
        $teste2->email = $request->email;

        $teste2->save();

        return $teste2;

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
