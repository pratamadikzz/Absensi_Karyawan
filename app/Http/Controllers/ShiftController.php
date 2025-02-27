<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allShift = Shift::all();
        return view('shift.index', compact('allShift'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shift.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //buat validasi
        $validateData = $request->validate([
           'shift' => 'required|max:100',
        ]);

        //simpan data
        Shift::create ($validateData);

        //redirect ke index shiftan
        return redirect()->route('shift.index')->with('success', 'Shift berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        return view('shift.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        return view('shift.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shift $shift)
    {
        //buat validasi
        $validateData = $request->validate([
            'shift' => 'required|max:100',
        ]);

        //update data
        $shift->update($validateData);

        //redirect ke index shift
        return redirect()->route('shift.index')->with('success', 'Shift berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        //hapus data
        $shift->delete();

        //redirect ke index shift
        return redirect()->route('shift.index')->with('success', 'Shift berhasil dihapus');
    }
}
