<?php

namespace App\Http\Controllers;

use App\offer;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(offer $offer)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(offer $offer)
    {
        //
    }
}
