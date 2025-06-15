<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        Tag::create($request->all());
        return redirect()->route('tags.index')->with('success', 'Tag berhasil ditambahkan.');
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success', 'Tag berhasil diperbarui.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag berhasil dihapus.');
    }
}

