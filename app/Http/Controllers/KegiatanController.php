<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::latest()->get();

        return view('kegiatan.index', compact('kegiatan'));
    }

  public function create()
  {
      return view('kegiatan.create');
  }

  public function store(Request $request)
  {
$validated = $request->validate([
    'judul' => 'required|string|max:255',
    'deskripsi' => 'required|string',
]);

Kegiatan::create($validated);

      return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
  }
public function show(Kegiatan $kegiatan)
{
    return view('kegiatan.show', compact('kegiatan'));
}
  public function edit(Kegiatan $kegiatan)
  {
      return view('kegiatan.edit', compact('kegiatan'));
  }

  public function update(Request $request, Kegiatan $kegiatan)
  {
      $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
      ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}