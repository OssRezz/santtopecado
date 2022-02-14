@extends('layouts.layout')
@section('title', 'Events')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xl-4 mb-3">
                <div class="card bg-gray">
                    <div class="card-header text-white"><i class="fas fa-plus-square"></i> Formulario de evento</div>
                    <div class="card-body">
                        <form action="events/create" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="eventName" class="form-control" placeholder="Nombre del evento" />
                                <label for="">Nombre del evento</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="eventPlace" class="form-control"
                                    placeholder="Lugar del evento" />
                                <label for="">Lugar del evento</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" name="eventDate" class="form-control" placeholder="Fecha del evento" />
                                <label for="">Fecha del evento</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-outline-light">Crear evento</button>
                            </div>
                        </form>

                        @if (session()->has('message'))
                            <div class="alert alert-light alert-dismissible fade show my-3" role="alert">
                                {{ session()->get('message') }}
                                <button type="submit" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-gray">
                    <div class="card-header text-white"><i class="fas fa-th-list"></i> Eventos registrados</div>
                    <div class="card-body m-1 p-1">
                        <table class="table table-border text-white">
                            <thead>
                                <tr>
                                    <th class="text-center">Evento</th>
                                    <th class="text-center">Lugar</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Accion</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($events as $aux)
                                    <tr>
                                        <td>
                                            <div class="d-grid">
                                                <a href="{{ url('sales', $aux) }}"
                                                    class="btn btn-outline-light border-0 text-left">{{ $aux->eventName }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $aux->eventPlace }}</td>
                                        <td class="text-center">{{ $aux->eventDate }}</td>
                                        <td class="text-center">{{ $aux->fkStatus }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-light btn-sm"><i
                                                    class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="">
                            <span>{{ $events->links('vendor/pagination/bootstrap-5', ['paginator' => $events]) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
