@extends('admin::layouts.app')

@section('content')
   @include('users::roles.form', ['type' => 'create', 'title' => 'Criar Role'])
@endsection
