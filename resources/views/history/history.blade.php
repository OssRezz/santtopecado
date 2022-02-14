@extends('layouts.layout')
@section('title', 'Sales History')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card bg-gray">
                    <div class="card-header text-white"><i class="fas fa-file-invoice-dollar"></i> Historial de ventas</div>
                    <div class="card-body m-1 p-1">
                        <table class="table text-white">
                            <tr>
                                <th>Evento</th>
                                <th>Precio</th>
                                <th>Fecha</th>
                            </tr>
                            <tr>
                                <td>Evento maridaje misfit</td>
                                <td>$32.000</td>
                                <td>19/11/20</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
