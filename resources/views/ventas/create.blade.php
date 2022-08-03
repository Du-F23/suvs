@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Crear Auto</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="container">
                                <form action="{{ route('ventas.store') }}" method="POST">
                                    {{-- generar el token para el envio de dato csrf --}}
                                    @csrf
                                    <label class="col" for="">Cliente:</label>
                                    <br>
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
                                    <select name="modificacion" id="modificacion" class="form-control">
                                        @foreach ($modificaciones as $mod)
                                            <option value="{{ $mod->nombre }}">
                                                {{ $mod->nombre }} </option>
                                            <input type="text" hidden value="{{ $mod->precio }}" name="total">
                                        @endforeach
                                    </select>
                                    <br>
                                    <label class="col" for="">Fecha de Ingreso:</label>
                                    <br>
                                    <input id="fecha_venta" class="col-12 inputborder form-control" type="date"
                                        name="fecha_venta">
                                    <br>
                                    <div class="modal-footer">
                                        <a href="{{ route('autos.index') }}" type="button"
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
