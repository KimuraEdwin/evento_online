<?php

namespace App\Http\Controllers;

use App\Models\Expositor;
use Illuminate\Http\Request;

class ExpositorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expositores.expositor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Expositor  $expositor
     * @return \Illuminate\Http\Response
     */
    public function show(Expositor $expositor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expositor  $expositor
     * @return \Illuminate\Http\Response
     */
    public function edit(Expositor $expositor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expositor  $expositor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expositor $expositor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expositor  $expositor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expositor $expositor)
    {
        //
    }
}
