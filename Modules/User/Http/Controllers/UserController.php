<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\User\Entities\Entity as User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::all();;

        return view('user::index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $user = new User();

        $form = $formBuilder->create('Modules\User\Form\UserForm', [
            'method' => 'POST',
            'url' => url('admin/user/store'),
            'model' => $user
        ]);

        return view('user::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'required|confirmed|min:6'
        ]);

        DB::beginTransaction();

        try {
            DB::commit();

            $user = $this->save( new User, $request );

            Session::flash('type', 'success');
            Session::flash('message', 'Item adicionado com sucesso');

            return redirect()->route('Admin.User');

        } catch (\Throwable $th) {
            DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.User');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(FormBuilder $formBuilder, User $user)
    {
        $form = $formBuilder->create('Modules\User\Form\UserForm', [
            'method' => 'PUT',
            'url' => url('admin/user/update/'.$user->id),
            'model' => $user
        ]);
        return view('user::edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, User $user)
    {
        DB::beginTransaction();

        if($request->input('password') != null){
            $validate = $request->validate([
                'old_password' => 'required',
                'new_password' => 'confirmed|min:6|different:old_password'
            ]);
        }

        try {
            DB::commit();

            $user = $this->save( $user, $request );

            Session::flash('type', 'success');
            Session::flash('message', 'Item editado com sucesso');

            return redirect()->route('Admin.User');
        } catch (\Throwable $th) {
             DB::rollBack();

            Session::flash('type', 'error');
            Session::flash('message', $th->getMessage());

            return redirect()->route('Admin.User');
        }
    }

    public function save(User $user, Request $request)
    {
        if($request->input('new_password') != null){
            if (Hash::check($request->input('new_password'), $user->password)) {
                $user->fill([
                    'password' => Hash::make($request->new_password)
                ])->save();

                $request->session()->flash('success', 'Password changed');
                return redirect()->route('your.route');
            } else {
                $request->session()->flash('error', 'Password does not match');
                return redirect()->route('your.route');
            }
        }

        foreach($user->getFillable() as $fillable){
            if($fillable == 'password'){
                if($request->input('password') != null){
                    $user->password = Hash::make($request->input('password'));
                }
            } else{
                $user->$fillable = $request->input($fillable);
            }
        }

        $user->save();

        return $user;

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
