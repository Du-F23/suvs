@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar Modificacion</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="container">
                                <form action="{{ route('modificaciones.update', $modificacion->id) }}" method="POST">
                                    {{-- generar el token para el envio de dato csrf --}}
                                    @csrf
                                    @method('PUT')
                                    <label class="col" for="">Nombre Modificacion:</label>
                                    <br>
                                    <input id="name" class="col-12 inputborder form-control" type="text"
                                        name="nombre" value="{{ $modificacion->nombre }}">
                                    <br>
                                    <label class="col" for="">Descripcion de la Modificacion:</label>
                                    <br>
                                    <input id="descripcion" class="col-12 inputborder form-control" type="text"
                                        name="descripcion" value="{{ $modificacion->descripcion }}">
                                    <br>
                                    <label class="col" for="">Precio de la Modificacion:</label>
                                    <br>
                                    <input id="precio" class="col-12 inputborder form-control" type="text"
                                        name="precio" value="{{ $modificacion->precio }}" required>
                                    <div class="modal-footer">
                                        <a href="{{ route('modificaciones.index') }}" type="button"
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
