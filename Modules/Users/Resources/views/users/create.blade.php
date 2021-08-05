@extends('admin::layouts.app')

@section('content')
    @include('users::users.form', ['type' => 'create', 'title' => 'Criar Usuário'])
@endsection
