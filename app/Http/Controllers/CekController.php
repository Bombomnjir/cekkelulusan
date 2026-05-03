<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class CekController extends Controller
{
    public function cek(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required'
        ]);

        $siswa = Siswa::where('nisn', $request->nisn)
            ->where('nama', 'like', '%' . $request->nama . '%')
            ->first();

        if (!$siswa) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        return view('siswa.hasil', compact('siswa'));
    }
}