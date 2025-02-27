<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allJabatan = Jabatan::all();
        return view('jabatan.index', compact('allJabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //buat validasi
        $validateData = $request->validate([
           'jabatan' => 'required|max:100',
        ]);

        //simpan data
        Jabatan::create ($validateData);

        //redirect ke index jabatanan
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        return view('jabatan.show', compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        //buat validasi
        $validateData = $request->validate([
            'jabatan' => 'required|max:100',
        ]);

        //update data
        $jabatan->update($validateData);

        //redirect ke index jabatan
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        //hapus data
        $jabatan->delete();

        //redirect ke index jabatan
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus');
    }
}
