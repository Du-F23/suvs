<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutoRequest;
use App\Http\Requests\UpdateAutoRequest;
use App\Models\Auto;
use App\Models\Cliente;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autos = Auto::all();
        return view('autos.index', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('autos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAutoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAutoRequest $request)
    {
        // dd($request->all());
        Auto::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'color' => $request->color,
            'placa' => $request->placa,
            'cliente' => $request->cliente,
        ]);

        return redirect()->route('autos.index')->with('success', 'Auto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function show(Auto $auto)
    {
        return view('autos.show', compact('auto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function edit(Auto $auto)
    {
        $clientes = Cliente::all();
        return view('autos.edit', compact('auto', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAutoRequest  $request
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAutoRequest $request, Auto $auto)
    {
        $auto->update($request->all());
        return redirect()->route('autos.index')->with('success', 'Auto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        $auto->delete();
        return redirect()->route('autos.index')->with('success', 'Auto eliminado correctamente');
    }
}
