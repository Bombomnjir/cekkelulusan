<?php

namespace App\Http\Controllers;
use App\Models\Siswa;

use Illuminate\Http\Request;

class SiswaController extends Controller
{

public function index()
{
    $query = Siswa::query();

    if(request('search')){
        $query->where('nama', 'like', '%'.request('search').'%')
              ->orWhere('nisn', 'like', '%'.request('search').'%');
    }

    // WAJIB paginate, bukan get()
    $siswas = $query->latest()->paginate(10);

    $total = Siswa::count();
    $lulus = Siswa::where('status', 'lulus')->count();
    $tidak = Siswa::where('status', 'tidak')->count();

    return view('dashboard', compact('siswas', 'total', 'lulus', 'tidak'));
}
   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nisn' => 'required|unique:siswas,nisn',
        'status' => 'required|in:lulus,tidak',
    ]);

    Siswa::create([
        'nama' => $request->nama,
        'nisn' => $request->nisn,
        'status' => $request->status,
    ]);

    return redirect()->route('dashboard')
        ->with('success', 'Data siswa berhasil ditambahkan');
}
public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nisn' => 'required|unique:siswas,nisn,' . $id,
        'status' => 'required|in:lulus,tidak',
    ]);

    $siswa = Siswa::findOrFail($id);

    $siswa->update([
        'nama' => $request->nama,
        'nisn' => $request->nisn,
        'status' => $request->status,
    ]);

    return redirect()->route('siswa.index')
        ->with('success', 'Data siswa berhasil diupdate');
}
public function destroy($id)
{
    $siswa = Siswa::findOrFail($id);
    $siswa->delete();

    return redirect()->route('siswa.index')
        ->with('success', 'Data siswa berhasil dihapus');
}
public function edit($id)
{
    $siswa = Siswa::findOrFail($id);
    return view('siswa.edit', compact('siswa'));
}
public function create()
{
    return view('siswa.create');
}


    /**
     * Show the form for creating a new resource.
     */
    
}
