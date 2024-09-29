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

    public function index_admin()
    {
        $fasums = Fasum::get();
        $assets = Asset::all();
        return view('application.maps-admin.peta-sarana-prasarana', [
            'fasums' => $fasums,
            'assets' => $assets
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'jenis' => 'nullable|string|max:255',
            'objek' => 'nullable|string|max:255',
            'toponim' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            // 'SUMBER' => 'nullable|string|max:255',
        ]);

        // Find the resident by ID
        $jalan = Fasum::findOrFail($id);

        // Update the resident with form data
        $jalan->update([
            'jenis' => $request->jenis,
            'objek' => $request->objek,
            'toponim' => $request->toponim,
            'keterangan' => $request->keterangan,
            // 'SUMBER' => $request->SUMBER,
        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Data successfully updated.');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
