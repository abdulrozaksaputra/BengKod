<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        return view('obat.index');
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('obat.index');
    }

    public function show($id)
    {
        return view('obat.show', ['id' => $id]);
    }

    public function edit($id)
    {
        return view('obat.edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('obat.index');
    }

    public function destroy($id)
    {
        return redirect()->route('obat.index');
    }
}
