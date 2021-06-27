<?php

namespace Modules\Teste3\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Teste3\Entities\Entity as Teste3;
use Modules\Teste3\Form\Teste3Form;

class Teste3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $teste3s = Teste3::all();;

        return view('teste3::index', compact(['teste3s']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $teste3 = new Teste3();

        $form = $formBuilder->create(Teste3Form::class, [
            'method' => 'POST',
            'url' => url('admin/teste3/store'),
            'model' => $teste3
        ]);

        return view('teste3::create', compact('form'));
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

            $teste3 = $this->save( new Teste3, $request );

            Session::flash('type', 'success');
            Session::flash('message', 'Item adicionado com sucesso');

            return redirect()->route('Admin.Teste3');

        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Teste3');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(FormBuilder $formBuilder, Teste3 $teste3)
    {
        $form = $formBuilder->create(Teste3Form::class, [
            'method' => 'PUT',
            'url' => url('admin/teste3/update/'.$teste3->id),
            'model' => $teste3
        ]);
        return view('teste3::edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Teste3 $teste3)
    {
        DB::beginTransaction();

        // $teste3 = Teste3::where('id', $id)->first();
        try {
            DB::commit();

            $teste3 = $this->save( $teste3, $request );

            Session::flash('type', 'success');
            Session::flash('message', 'Item editado com sucesso');

            return redirect()->route('Admin.Teste3');
        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.Teste3');
        }
    }

    public function save(Teste3 $teste3, Request $request){

        foreach($teste3->getFillable() as $fillable){
            $teste3->$fillable = $request->input($fillable);
        }

        $teste3->save();

        return $teste3;

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Teste3 $teste3)
    {
        $teste3->delete();

        Session::flash('type', 'success');
        Session::flash('message', 'Item deletado com sucesso');

        return redirect()->back();
    }
}
