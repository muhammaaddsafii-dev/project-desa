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

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'Name' => 'nullable|string|max:255',
            'PERKERASAN' => 'nullable|string|max:255',
            'KONDISI' => 'nullable|string|max:255',
            // 'SUMBER' => 'nullable|string|max:255',
        ]);

        // Find the resident by ID
        $jalan = Jalan::findOrFail($id);

        // Update the resident with form data
        $jalan->update([
            'Name' => $request->Name,
            'PERKERASAN' => $request->PERKERASAN,
            'KONDISI' => $request->KONDISI,
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
