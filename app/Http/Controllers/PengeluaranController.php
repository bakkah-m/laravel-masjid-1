<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengeluaran::orderBy('created_at', 'DESC')->get();

        return view('pengeluaran.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pengeluaran::create($request->all());

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan.');
        return redirect()->route('pengeluaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', ['data' => $pengeluaran]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $pengeluaran->update($request->all());

        Alert::success('Berhasil', 'Data Berhasil Diubah.');
        return redirect()->route('pengeluaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus.');
        return redirect()->back();
    }
}
