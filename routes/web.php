<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/dashboard', function (Request $request) {
    $start = $request->query('start');
    $end = $request->query('end');

    if($start && $end){
        $pemasukan = Pemasukan::where('is_valid', 1)->whereBetween('created_at', [$start, $end])->get();
        $pengeluaran = Pengeluaran::whereBetween('created_at', [$start, $end])->get();

        return view('dashboard', ['pemasukan'=>$pemasukan, 'pengeluaran'=>$pengeluaran]);
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);

    Route::get('/validasi/{id}', [PemasukanController::class, 'validasi'])->name('pemasukan.validasi');
});

Route::resource('pemasukan', PemasukanController::class)->only('create', 'store');

require __DIR__.'/auth.php';
