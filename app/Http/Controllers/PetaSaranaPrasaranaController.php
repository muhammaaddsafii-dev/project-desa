<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Fasum;
use Illuminate\Http\Request;

class PetaSaranaPrasaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasums = Fasum::get();
        $assets = Asset::all();
        return view('application.maps.peta-sarana-prasarana', [
            'fasums' => $fasums,
            'assets' => $assets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
