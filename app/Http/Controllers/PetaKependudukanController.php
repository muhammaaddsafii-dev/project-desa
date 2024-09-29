<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use App\Models\Resident;
use Illuminate\Http\Request;

class PetaKependudukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = Resident::get();
        $assets = Asset::all();
        return view('application.maps.peta-kependudukan', [
            'residents' => $residents,
            'assets' => $assets,

        ]);
    }


    public function index_admin()
    {
        $residents = Resident::get();
        $assets = Asset::all();
        return view('application.maps-admin.peta-kependudukan', [
            'residents' => $residents,
            'assets' => $assets,
        ]);
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'NIK' => 'nullable|string|max:16',
            'Nama_Kepal' => 'nullable|string|max:255',
            'Jenis_Kela' => 'nullable|string|max:255',
            'Profesi_KK' => 'nullable|string|max:255',
            'Jumlah_KK' => 'nullable|integer',
            'RT' => 'nullable|string|max:5',
            'RW' => 'nullable|string|max:5',
            'Status_Tem' => 'nullable|string|max:255',
            'Luas_Lanta' => 'nullable|string|max:255',
            'Jenis_Lanta' => 'nullable|string|max:255',
            'Jenis_Dind' => 'nullable|string|max:255',
            'Fasilitas_' => 'nullable|string|max:255',
            'Fasilitas1' => 'nullable|string|max:255',
            'Fasilita_1' => 'nullable|string|max:255',
            'Bahan_Baka' => 'nullable|string|max:255',
            'Kartu_Jami' => 'nullable|string|max:255',
            'Akses_Info' => 'nullable|string|max:255',
            'Keterangan' => 'nullable|string|max:500',
        ]);

        // Find the resident by ID
        $resident = Resident::findOrFail($id);

        // Update the resident with form data
        $resident->update([
            'NIK' => $request->NIK,
            'Nama_Kepal' => $request->Nama_Kepal,
            'Jenis_Kela' => $request->Jenis_Kela,
            'Profesi_KK' => $request->Profesi_KK,
            'Jumlah_KK' => $request->Jumlah_KK,
            'RT' => $request->RT,
            'RW' => $request->RW,
            'Status_Tem' => $request->Status_Tem,
            'Luas_Lanta' => $request->Luas_Lanta,
            'Jenis_Lanta' => $request->Jenis_Lanta,
            'Jenis_Dind' => $request->Jenis_Dind,
            'Fasilitas_' => $request->Fasilitas_,
            'Fasilitas1' => $request->Fasilitas1,
            'Fasilita_1' => $request->Fasilita_1,
            'Bahan_Baka' => $request->Bahan_Baka,
            'Kartu_Jami' => $request->Kartu_Jami,
            'Akses_Info' => $request->Akses_Info,
            'Keterangan' => $request->Keterangan,
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
