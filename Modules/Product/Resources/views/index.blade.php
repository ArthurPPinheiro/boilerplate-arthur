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
                  <h3 class="mb-0">Product</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{ route('Admin.Product.create') }}" class="btn btn-sm btn-primary">Criar</a>
                </div>
              </div>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                    @foreach ((new Modules\Product\Entities\Entity)->getFillable() as $fillable)
                        <th scope="col" class="sort" data-sort="{{ Str::slug($fillable) }}">{{ $fillable }}</th>
                    @endforeach
                    <th class="text-center" scope="col">Ações</th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($products as $product)
                    <tr>
                        @foreach ((new Modules\Product\Entities\Entity)->getFillable() as $fillable)
                            <td class="budget">
                                {{ $product->$fillable }}
                            </td>
                        @endforeach
                        <td class="text-center nowrap">
                            <a class="btn btn-icon-only text-blue" href="{{ route('Admin.Product.edit', $product) }}" aria-expanded="false">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-icon-only text-red" href="{{ route('Admin.Product.delete', $product) }}" aria-expanded="false">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
