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
        $this->validate(request(), [
            'name' => 'required| max:100',
            'address' => 'required| max:100',
            'type' => 'required| max:100',
            'logo' => 'required',
            'own' => 'required| max:100',
            'city' => 'required| max:100',
            'state' => 'required| max:100',
            'latitud' => 'required',
            'longitud' => 'required'
        ]);
        
        $empresa = $request->all();
        enterprise::create($empresa);
        // enterprise::create(['name'=>$empresa->name, 'address'=>$empresa->address, 'type'=>$empresa->type, 
        //  'logo'=>$empresa->logo, 'own'=>$empresa->own, 'state'=>$empresa->state, 'city'=>$empresa->city, 'subtype'=>$empresa->subtype]);

        return response()->json(['Oferta' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enterprise = enterprise::where('id', '=', $id)->with('ofertas')->get();

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

        return response()->json(['Empresa' => 'Empresa actualizada'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = enterprise::where('id','=',$id);
        $empresa->delete();

        return response()->json(['Empresa' => 'Empresa Eliminada'], 200);
    }

    public function typeEnterprise($type)
    {
        $enterprises = enterprise::where('type', '=', $type)->with('ofertas')->get();
        return response()->json(['Empresas' => $enterprises]);

    }
}
