<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use App\Models\Venta;
use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Modificacion;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autos = Auto::all();
        $clientes = Cliente::all();
        $modificaciones = Modificacion::all();
        return view('ventas.create', compact('autos', 'clientes', 'modificaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVentaRequest $request)
    {
        Venta::create([
            'total' => $request->total,
            'fecha_venta' => $request->fecha_venta,
            'cliente' => $request->cliente,
            'auto' => $request->auto,
            'modificacion' => $request->modificacion,
        ]);
        return redirect()->route('ventas.index')->with('success', 'Venta creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $autos = Auto::all();
        $clientes = Cliente::all();
        $modificaciones = Modificacion::all();
        return view('ventas.edit', compact('venta', 'autos', 'clientes', 'modificaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVentaRequest  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVentaRequest $request, Venta $venta)
    {
        $venta->update($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente');
    }
}
