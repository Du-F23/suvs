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
                                <form action="{{ route('autos.store') }}" method="POST">
                                    {{-- generar el token para el envio de dato csrf --}}
                                    @csrf
                                    <label class="col" for="">Modelo:</label>
                                    <br>
                                    <input id="modelo" class="col-12 inputborder form-control" type="text"
                                        name="modelo">
                                    <br>
                                    <label class="col" for="">Marca:</label>
                                    <br>
                                    <input id="marca" class="col-12 inputborder form-control" type="text"
                                        name="marca">
                                    <br>
                                    <label class="col" for="">Color:</label>
                                    <br>
                                    <input id="color" class="col-12 inputborder form-control" type="text"
                                        name="color">
                                    <br>
                                    <label class="col" for="">Año:</label>
                                    <br>
                                    <input id="anio" class="col-12 inputborder form-control" type="text"
                                        name="anio">
                                    <br>
                                    <label class="col" for="">Placa:</label>
                                    <br>
                                    <input id="placa" class="col-12 inputborder form-control" type="text"
                                        name="placa">
                                    <br>
                                    <label class="col" for="">Cliente:</label>
                                    <br>
                                    <select id="cliente" class="col-12 inputborder form-control" name="cliente">
                                        <option selected>Seleccione un cliente</option>
                                        @foreach ($clientes as $cliente)
                                            <option
                                                value="{{ $cliente->nombre }} {{ $cliente->app }}
                                                {{ $cliente->apm }}">
                                                {{ $cliente->nombre }} {{ $cliente->app }}
                                                {{ $cliente->apm }}</option>
                                        @endforeach
                                    </select>
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
