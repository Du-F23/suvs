@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Ventas</h5>
                        </div>
                        <a href="{{ route('ventas.create') }}" class="btn bg-gradient-primary btn-sm mb-0"
                            type="button">+&nbsp; Añadir
                            Venta</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Cliente
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Auto
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Terminado
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Fecha de Ingreso
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Modificacion
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventas as $mod)
                                    <tr>
                                        <td>{{ $mod->cliente }}</td>
                                        <td class="text-center">{{ $mod->auto }}</td>
                                        <td class="text-center">
                                            @if ($mod->terminado == 1)
                                                <i class="fas fa-check text-success"></i> Si
                                            @else
                                                <i class="fas fa-times text-danger"></i> No
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $mod->fecha_venta }}</td>
                                        <td class="text-center">{{ $mod->modificacion }}</td>
                                        <td class="text-center">{{ $mod->total }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('ventas.edit', $mod->id) }}" class="mx-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Editar Cliente">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>

                                            <form action="{{ route('ventas.destroy', $mod) }}" method="POST">
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
