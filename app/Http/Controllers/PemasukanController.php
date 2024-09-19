<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemasukan::orderBy('created_at', 'DESC')->get();

        return view('pemasukan.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemasukan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!$request->nominal || !$request->file('bukti_bayar')){
            Alert::error('Gagal', 'Mohon Masukkan Data Dengan Benar.');
            return redirect()->back();
        }
        if ($request->file('bukti_bayar')) {

            $file = $request->file('bukti_bayar');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/images/bukti_bayar/'), $filename);

            Pemasukan::create([
                'nama'=>$request->nama,
                'instansi'=>$request->instansi,
                'nominal'=>$request->nominal,
                'bukti_bayar'=>$filename
            ]);
        }
        
        Alert::success('Berhasil', 'Terima Kasih '.$request->nama.' atas Infaq yang telah diberikan, semoga Allah SWT memberikan balasan yang berlipat ganda. Aamiin');
        return redirect()->route('landing');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    public function validasi(string $id){
        $pemasukan = Pemasukan::find($id);
        $pemasukan->is_valid = true;
        $pemasukan->save();

        Alert::success('Berhasil', 'Data Telah Valid.');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus.');
        return redirect()->back();
    }
}
