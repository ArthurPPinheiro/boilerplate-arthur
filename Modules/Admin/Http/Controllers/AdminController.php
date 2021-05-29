<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin::index');
    }

    public function dashboard()
    {
        return view('admin::dashboard');
    }

    public function icons()
    {
        return view('admin::icons');
    }

    public function login()
    {
        return view('admin::login');
    }

    public function map()
    {
        return view('admin::map');
    }

    public function maps()
    {
        return view('admin::maps');
    }

    public function profile()
    {
        return view('admin::profile');
    }

    public function register()
    {
        return view('admin::register');
    }

    public function tables()
    {
        return view('admin::tables');
    }

    public function upgrades()
    {
        return view('admin::upgrades');
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
