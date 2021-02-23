<?php

namespace App\Http\Controllers;

use App\iWillGo;
use Illuminate\Http\Request;

class IWillGoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ir = iWillGo::all();
        return response()->json(['Ir' => $ir->toArray()]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'offer_id' => 'required',
            'user_id' => 'required',
        ]);

        iWillGo::insert(['offer_id'=>request()->offer_id, 'user_id'=>request()->user_id]);

        return response()->json(['iWillGo' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\iWillGo  $iWillGo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ir = iWillGo::findOrFail($id);

        return response()->json(['Ir' => $ir->toArray()]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\iWillGo  $iWillGo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosIr = request()->except(['_token', '_method']);
        iWillGo::where('id','=',$id)->update($datosIr);

        return response()->json(['VoyAIr' => 'Ir actualizado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\iWillGo  $iWillGo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ir = iWillGo::where('id',$id);
        $ir->delete();
        // offer::destroy($oferta);

        return response()->json(['iwillGo' => 'Eliminado'], 200);
    }

    public function personasInscritas($id)
    {
        $ir = iWillGo::where('offer_id', '=', $id)->get();
        return response()->json(['Ir' => $ir]);
    }

    public function eliminar($idOffer, $idUser)
    {
        $ir = iWillGo::where('offer_id', '=', $idOffer)->where('user_id', '=', $idUser);
        $ir->delete();

        return response()->json(['iwillGo' => 'Eliminado'], 200);
    }

}
