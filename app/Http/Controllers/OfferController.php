<?php

namespace App\Http\Controllers;

use App\offer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = offer::all();
        return response()->json(['Ofertas' => $offers->toArray()]);  
    }

    // , $this->successStatus

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
            'description' => 'required| max:100',
            'assessment' => 'required| max:100',
            'enterprise_id' => 'required| max:100',
            'start_date' => 'required| max:100',
            'start_time' => 'required| max:100',
            'finish_time' => 'required| max:100',
            'music_direct' => 'required| max:100',
            'sport_direct' => 'required| max:100',

        ]);

        offer::insert(['name'=>request()->name, 'description'=>request()->description, 'assessment'=>request()->assessment, 
        'enterprise_id'=>request()->enterprise_id, 'start_date'=>request()->start_date, 'start_time'=>request()->start_time,
        'finish_time'=>request()->finish_time,  
        'music_direct'=>request()->music_direct, 'sport_direct'=>request()->sport_direct]);

        return response()->json(['Oferta' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = offer::where('id', '=', $id)->with('Enterprise')->get();

        return response()->json(['Oferta' => $offer]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosOferta = request()->except(['_token', '_method']);
        offer::where('id','=',$id)->update($datosOferta);

        return response()->json(['Oferta' => 'Dato guardado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oferta = offer::where('id',$id);
        $oferta->delete();
        // offer::destroy($oferta);

        return response()->json(['Oferta' => 'Oferta Eliminada'], 200);
    }

    public function ofertaConEmpresaBar()
    {
        $from = Carbon::now()->toDateString();
        $to = Carbon::now()->addDay()->toDateString();
        $time = Carbon::now()->toTimeString();
        $offers = offer::whereBetween('start_date', [$from, $to])->with('Bar')->get();
        // $offers = offer::where('id', '>', 0)->with('Bar')->get();
        return response()->json(['Ofertas' => $offers]);
    }

    public function ofertaConEmpresaRestaurante()
    {
        $from = Carbon::now()->toDateString();
        $to = Carbon::now()->addDay()->toDateString();
        $time = Carbon::now()->toTimeString();
        $offers = offer::whereBetween('start_date', [$from, $to])->with('Restaurant')->get();
        // $offers= offer::where('id', '>', 0)->with('Restaurant')->get();
        return response()->json(['Ofertas' => $offers]);
    }

    public function ofertaConEmpresaDiscoteca()
    {
        $from = Carbon::now()->toDateString();
        $to = Carbon::now()->addDay()->toDateString();
        $time = Carbon::now()->toTimeString();
        $offers = offer::whereBetween('start_date', [$from, $to])->with('Discotheque')->get();
        // $offers = offer::where('id', '>', 0)->with('Discotheque')->get();
        return response()->json(['Ofertas' => $offers]);
    }

    public function filtros(Request $request)
    {
        $filtros = request()->except(['_token', '_method']);
        // for($i = 0; $i<count($filtros); $i++){
            
        // }

        $from = Carbon::now()->toDateString();
        $to = Carbon::now()->addDay()->toDateString();
        $time = Carbon::now()->toTimeString();
        $offers = offer::whereBetween('start_date', [$from, $to])->with('Restaurant')->get();
        // $offers= offer::where('id', '>', 0)->with('Restaurant')->get();
        // return response()->json(['Ofertas' => $offers]);
        
        return response()->json(['Filtros' => $filtros]);
    }


}
