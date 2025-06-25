<?php

namespace App\Http\Controllers;

use App\Models\DetailProyek;
use App\Models\Proyek;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DetailProyekController extends Controller
{


    public function index($id_proyek)
    {


        $proyek = Proyek::with('tags')->findOrFail($id_proyek);
        return view('detailProyek.index', compact('proyek'));
    }
    public function create($id_proyek)
    {
        $proyek = Proyek::findOrFail($id_proyek);
        return view('detailProyek.create', compact('proyek'));
    }

    

    // public function store(Request $request, $id_proyek)
    // {
    //     $request->validate([
    //         'nama_berkas' => 'required|string|max:255',
    //         'url_berkas' => 'required|string|max:255',
    //     ]);

    //     $path = $request->file('url_berkas')->store('dokumen', 'public');

    //     DetailProyek::create([
    //         'id_proyek' => $id_proyek,
    //         'nama_berkas' => $request->nama_berkas,
    //         'url_berkas' => $path,
    //     ]);

    //     return redirect()->route('detail_proyek.index', $id_proyek)->with('success', 'Dokumen berhasil diunggah.');
    // }

        public function store(Request $request, $id_proyek)
    {
        // Validasi input
        $request->validate([
            'nama_berkas' => 'required|string|max:255',
            'url_berkas' => 'required|url|max:255', // pastikan valid URL
        ]);

        // Simpan ke database tanpa menyimpan file
        DetailProyek::create([
            'id_proyek' => $id_proyek,
            'nama_berkas' => $request->nama_berkas,
            'url_berkas' => $request->url_berkas, // simpan langsung URL
        ]);

        return redirect()->route('detail_proyek.index', $id_proyek)
            ->with('success', 'Link dokumen berhasil ditambahkan.');
    
    }
    public function edit($id_detail)
    {
        $detail = DetailProyek::findOrFail($id_detail);
        return view('detailProyek.edit', compact('detail'));
    }

    public function update(Request $request, $id_detail)
    {
        $detail = DetailProyek::findOrFail($id_detail);
        $request->validate([
            'nama_berkas' => 'required|string|max:255',
            'url_berkas' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        if ($request->hasFile('url_berkas')) {
            if ($detail->url_berkas) {
                Storage::disk('public')->delete($detail->url_berkas);
            }
            $path = $request->file('url_berkas')->store('dokumen', 'public');
            $detail->url_berkas = $path;
        }

        $detail->nama_berkas = $request->nama_berkas;
        $detail->save();

        return redirect()->route('detail_proyek.index', $detail->id_proyek)->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy($id_detail)
    {
        $detail = DetailProyek::findOrFail($id_detail);
        if ($detail->url_berkas) {
            Storage::disk('public')->delete($detail->url_berkas);
        }
        $id_proyek = $detail->id_proyek;
        $detail->delete();

        return redirect()->route('detail_proyek.index', $id_proyek)->with('success', 'Dokumen berhasil dihapus.');
    }
}
