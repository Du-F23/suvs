@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Autos</h5>
                        </div>
                        <a href="{{ route('autos.create') }}" class="btn bg-gradient-primary btn-sm mb-0"
                            type="button">+&nbsp; Añadir
                            Auto</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Marca
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Modelo
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Color
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Año
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Placas
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Cliente
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($autos as $mod)
                                    <tr>
                                        <td>{{ $mod->marca }}</td>
                                        <td class="text-center">{{ $mod->modelo }}</td>
                                        <td class="text-center">{{ $mod->color }}</td>
                                        <td class="text-center">{{ $mod->anio }}</td>
                                        <td class="text-center">{{ $mod->placa }}</td>
                                        <td class="text-center">{{ $mod->cliente }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('autos.edit', $mod->id) }}" class="mx-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Editar Cliente">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>

                                            <form action="{{ route('autos.destroy', $mod) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type='submit' class="btn"
                                                    onClick="return confirm('Estas seguro  a eliminar el registro?')">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
