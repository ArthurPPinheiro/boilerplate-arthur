<?php

namespace Modules\Todo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Todo\Entities\Entity as Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $todos = Todo::all();;

        return view('todo::index', compact(['todos']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $todo = new Todo();

        $form = $formBuilder->create('Modules\Todo\Form\TodoForm', [
            'method' => 'POST',
            'url' => url('admin/todo/store'),
            'model' => $todo
        ]);

        return view('todo::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $todo = $this->save( new Todo(), $request );

            return redirect()->back()->with('message', 'Item Cadastrado');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(FormBuilder $formBuilder, Todo $todo)
    {
        $form = $formBuilder->create('Modules\Todo\Form\TodoForm', [
            'method' => 'POST',
            'url' => url('admin/todo/update'),
            'model' => $todo
        ]);

        return view('todo::edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::where('id', $id)->first();
        try {
            $todo = $this->save( $todo, $request );

            return redirect()->back()->with('message', 'Item Cadastrado');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function save(Todo $todo, Request $request)
    {
        $todo->titulo = $request->titulo;
        $todo->descricao = $request->descricao;

        $todo->save();

        return $todo;

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
