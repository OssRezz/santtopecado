@extends('layouts.layout')
@section('title', 'Sales')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col mb-3">
                <div class="card bg-gray">
                    <div class="card-header text-white"><i class="fas fa-store"></i> Formulario de venta</div>
                    <div class="card-body">
                        <form id="frm-producto">
                            <div class="form-floating mb-3">
                                <select id="producto" name="producto" class="form-select">
                                    <option value="" selected disabled>Seleccione un producto</option>
                                    @foreach ($products as $aux)
                                        <option value="{{ $aux->id }}">{{ $aux->precioProducto }}</option>
                                    @endforeach
                                </select>
                                <label for="">Producto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" id="cantidad" name="cantidad" class="form-control"
                                    placeholder="Cantidad del producto" />
                                <label for="">Cantidad del producto</label>
                            </div>
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-outline-light" value="Agregar producto" />
                            </div>
                        </form>

                        <div class="py-3"></div>

                        <div class="card bg-gray mx-0 mb-5">
                            <div class="card-header text-white"><i class="fas fa-shopping-basket"></i> Carrito de venta
                            </div>
                            <div class="card-body p-1">
                                <table class="table table-bordered table-hover text-white">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">Accion</th>
                                        </tr>
                                    </thead>

                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button id="btn-venta" class="btn btn-outline-light">Registrar venta</button>
                        </div>

                        <div id="respuesta"></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="respuestaAlert">
                <div class="agregar-receta"></div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/additems.js') }}"></script>
    <script>
        $("#btn-venta").on("click", function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            const arrayCarrito = JSON.stringify(administrarVentas);

            $.ajax({
                type: "POST",
                url: "{{ route('store.ajax') }}",
                data: {
                    arrayCarrito
                },
                success: function(data) {
                    $('#respuesta').html(data);
                },
            });
        });
    </script>
@endsection
