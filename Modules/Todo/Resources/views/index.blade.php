@extends('admin::layouts.app')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Todo</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{ route('Admin.Todo.create') }}" class="btn btn-sm btn-primary">Criar</a>
                </div>
              </div>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                    @foreach ((new Modules\Todo\Entities\Entity)->getFillable() as $fillable)
                        <th scope="col" class="sort" data-sort="{{ Str::slug($fillable) }}">{{ $fillable }}</th>
                    @endforeach
                    <th class="text-center" scope="col">Ações</th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($todos as $todo)
                    <tr>
                        @foreach ((new Modules\Todo\Entities\Entity)->getFillable() as $fillable)
                            <td class="budget">
                                {{ $todo->$fillable }}
                            </td>
                        @endforeach
                        <td class="text-center">
                                <a class="btn btn-icon-only text-blue" href="{{ route('Admin.Todo.edit', $todo) }}" aria-expanded="false">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-icon-only text-red" href="{{ route('Admin.Todo.delete', $todo) }}" aria-expanded="false">
                                    <i class="fas fa-trash"></i>
                                </a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          {{-- <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div> --}}
        </div>
      </div>
    </div>
@endsection
