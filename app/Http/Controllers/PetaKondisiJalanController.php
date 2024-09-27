<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use App\Models\Jalan;
use Illuminate\Http\Request;

class PetaKondisiJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kondisijalans = Jalan::get();
        $assets = Asset::all();
        return view('application.maps.peta-kondisi-jalan', [
            'kondisijalans' => $kondisijalans,
            'assets' => $assets
        ]);
    }

    public function index_admin()
    {
        $kondisijalans = Jalan::get();
        $assets = Asset::all();
        return view('application.maps-admin.peta-kondisi-jalan', [
            'kondisijalans' => $kondisijalans,
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
