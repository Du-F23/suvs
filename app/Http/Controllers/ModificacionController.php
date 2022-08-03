<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModificacionRequest;
use App\Http\Requests\UpdateModificacionRequest;
use App\Models\Modificacion;

class ModificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modificaciones = Modificacion::all();
        return view('modificaciones.index', compact('modificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modificaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModificacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModificacionRequest $request)
    {
        Modificacion::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);

        return redirect()->route('modificaciones.index')->with('success', 'Modificación creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modificacion  $modificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Modificacion $modificacion)
    {
        return view('modificaciones.show', compact('modificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modificacion  $modificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Modificacion $modificacion)
    {
        return view('modificaciones.edit', compact('modificacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModificacionRequest  $request
     * @param  \App\Models\Modificacion  $modificacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModificacionRequest $request, Modificacion $modificacion)
    {
        $modificacion->update($request->validated());
        return redirect()->route('modificaciones.index')->with('success', 'Modificación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modificacion  $modificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modificacion $modificacion)
    {
        $modificacion->delete();
        return redirect()->route('modificaciones.index')->with('success', 'Modificación eliminada correctamente');
    }
}
