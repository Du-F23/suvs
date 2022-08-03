@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Crear Cliente</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="container">
                                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                                    {{-- generar el token para el envio de dato csrf --}}
                                    @csrf
                                    @method('PUT')
                                    <label class="col" for="">Nombre:</label>
                                    <br>
                                    <input id="nombre" class="col-12 inputborder form-control" type="text"
                                        name="nombre" value="{{ $cliente->nombre }}">
                                    <br>
                                    <label class="col" for="">Apellido Paterno:</label>
                                    <br>
                                    <input id="app" class="col-12 inputborder form-control" type="text"
                                        name="app" value="{{ $cliente->app }}">
                                    <br>
                                    <label class="col" for="">Apellido Materno:</label>
                                    <br>
                                    <input id="apm" class="col-12 inputborder form-control" type="text"
                                        name="apm" value="{{ $cliente->apm }}">
                                    <br>
                                    <label class="col" for="">Direccion:</label>
                                    <br>
                                    <input id="direccion" class="col-12 inputborder form-control" type="text"
                                        name="direccion" value="{{ $cliente->direccion }}">
                                    <br>
                                    <label class="col" for="">Telefono:</label>
                                    <br>
                                    <input id="telefono" class="col-12 inputborder form-control" type="text"
                                        name="telefono" value="{{ $cliente->telefono }}">
                                    <br>
                                    <label class="col" for="">Correo Electronico:</label>
                                    <br>
                                    <input id="email" class="col-12 inputborder form-control" type="text"
                                        name="email" value="{{ $cliente->email }}">
                                    <br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
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
