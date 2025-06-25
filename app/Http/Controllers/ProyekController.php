<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::all();

        // Ambil juga proyek kalau diperlukan
        $proyeks = Proyek::query();

        // Filter jika ada input
        if ($request->filled('nama')) {
            $proyeks->where('nama_proyek', 'like', '%' . $request->nama . '%');
        }

        if ($request->filled('kontraktor')) {
            $proyeks->where('kontraktor', 'like', '%' . $request->kontraktor . '%');
        }

        if ($request->filled('tahun')) {
            $proyeks->where('tahun', $request->tahun);
        }

        if ($request->filled('nilai')) {
            $proyeks->where('nilai', $request->nilai);
        }

        // Tambah filter tag jika kamu implementasikan many-to-many
        if ($request->filled('tag')) {
            $proyeks->whereHas('tags', function ($query) use ($request) {
                $query->whereIn('nama', $request->tag);
            });
        }

        return view('proyek.index', [
            'proyeks' => $proyeks->get(),
            'tags' => $tags
        ]);

    }

    public function create()
    {
        $tags = Tag::all();
        return view('proyek.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'kontraktor' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'nilai' => 'required|integer',
            'tags' => 'array|exists:tags,id_tag',
        ]);

        $proyek = Proyek::create([
            'nama_proyek' => $request->nama_proyek,
            'kontraktor' => $request->kontraktor,
            'tahun' => $request->tahun,
            'nilai' => $request->nilai,
        ]);

        $proyek->tags()->attach($request->tags);
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit($id_proyek)
    {
        $proyek = Proyek::with('tags')->findOrFail($id_proyek);
        $tags = Tag::all();
        return view('proyek.edit', compact('proyek', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'kontraktor' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'nilai' => 'required|integer',
            'tags' => 'array'
        ]);

        $proyek = Proyek::findOrFail($id);
        $proyek->update([
            'nama_proyek' => $request->nama_proyek,
            'kontraktor' => $request->kontraktor,
            'tahun' => $request->tahun,
            'nilai' => $request->nilai,
        ]);

        $proyek->tags()->sync($request->tags);
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil dihapus.');
    }

}
