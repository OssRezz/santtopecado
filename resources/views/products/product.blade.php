@extends('layouts.layout')
@section('title', 'Products')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <div class="card bg-gray">
                    <div class="card-header text-white"><i class="fas fa-plus-square"></i> Formulario de productos</div>
                    <div class="card-body">
                        <form action="products/create" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="product" class="form-control" placeholder="Nombre del producto" />
                                <label for="">Nombre del producto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="price" class="form-control"
                                    placeholder="Precio del producto" />
                                <label for="">Precio del producto</label>
                            </div>

                            <div class="d-grid">
                                <input type="submit" class="btn btn-outline-light" value="Crear producto" />
                            </div>
                        </form>

                        @if (session()->has('message'))
                            <div class="alert alert-light alert-dismissible fade show my-3" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-gray">
                    <div class="card-header text-white"><i class="fas fa-hamburger"></i> Productos registrados</div>
                    <div class="card-body m-1 p-1">
                        <table class="table text-white table-hover">
                            <tr>
                                <th>Producto</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Accion</th>
                            </tr>
                            @foreach ($products as $aux)
                                <tr>
                                    <td>{{ $aux->productName }}</td>
                                    <td class="text-center">{{ $aux->productPrice }}</td>
                                    <td class="text-center">{{ $aux->fkStatus }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-light btn-sm"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        <div class="">
                            <span>{{ $products->links('vendor/pagination/bootstrap-5', ['paginator' => $products]) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
