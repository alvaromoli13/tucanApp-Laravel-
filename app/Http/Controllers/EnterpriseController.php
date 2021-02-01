<?php

namespace App\Http\Controllers;

use App\enterprise;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enterprise = enterprise::all();
        return response()->json(['Empresas' => $enterprise->toArray()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enterprise = enterprise::findOrFail($id);

        return response()->json(['Empresa' => $enterprise->toArray()]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpresa = request()->except(['_token', '_method']);
        enterprise::where('id','=',$id)->update($datosEmpresa);

        return response()->json(['Empresa' => 'Dato guardado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(enterprise $enterprise)
    {
        //
    }
}
