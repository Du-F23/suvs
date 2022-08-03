@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar Venta</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="container">
                                <form action="{{ route('ventas.update', $venta) }}" method="POST">
                                    {{-- generar el token para el envio de dato csrf --}}
                                    @csrf
                                    @method('PUT')
                                    <label class="col" for="">Cliente:</label>
                                    <br>
                                    <input type="text" value="{{ $venta->cliente }}" disabled class="form-control">
                                    <select name="cliente" id="cliente" class="form-control">
                                        @foreach ($clientes as $cliente)
                                            <option
                                                value="{{ $cliente->nombre }} {{ $cliente->app }}
                                        {{ $cliente->apm }}">
                                                {{ $cliente->nombre }} {{ $cliente->app }}
                                                {{ $cliente->apm }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label class="col" for="">Auto:</label>
                                    <br>
                                    <input type="text" value="{{ $venta->auto }}" disabled class="form-control">
                                    <select name="auto" id="auto" class="form-control">
                                        @foreach ($autos as $auto)
                                            <option
                                                value="{{ $auto->marca }}
                                        {{ $auto->modelo }} {{ $auto->color }}
                                        {{ $auto->placas }}">
                                                {{ $auto->marca }}
                                                {{ $auto->modelo }} {{ $auto->color }}
                                                {{ $auto->placas }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label class="col" for="">Modificacion:</label>
                                    <br>
                                    <input type="text" value="{{ $venta->modificacion }}" disabled class="form-control">
                                    <select name="modificacion" id="modificacion" class="form-control">
                                        @foreach ($modificaciones as $mod)
                                            <option value="{{ $mod->nombre }}">
                                                {{ $mod->nombre }} </option>
                                            <input type="text" hidden class="form-control" value="{{ $mod->precio }}"
                                                name="total">
                                        @endforeach
                                    </select>
                                    <br>
                                    <label class="col" for="">Total:</label>
                                    <br>
                                    <input type="text" disabled class="form-control" value="{{ $venta->total }}">
                                    <label class="col" for="">Fecha de Ingreso:</label>
                                    <br>
                                    <input id="fecha_venta" class="col-12 inputborder form-control" type="date"
                                        name="fecha_venta" value="{{ $venta->fecha_venta }}">
                                    <br>
                                    <label class="col" for="">Terminado:</label>
                                    <br>
                                    <select class="form-control" name="terminado" id="terminado">
                                        @if ($venta->terminado == 0)
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        @else
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        @endif
                                    </select>
                                    <div class="modal-footer">
                                        <a href="{{ route('ventas.index') }}" type="button"
                                            class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
