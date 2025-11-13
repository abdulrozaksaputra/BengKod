<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Minimal controller so resource routes won't break
    public function index()
    {
        return view('pasien.index');
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        // stub: validate/store logic goes here
        return redirect()->route('pasien.index');
    }

    public function show($id)
    {
        return view('pasien.show', ['id' => $id]);
    }

    public function edit($id)
    {
        return view('pasien.edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        // stub: update logic
        return redirect()->route('pasien.index');
    }

    public function destroy($id)
    {
        // stub: delete logic
        return redirect()->route('pasien.index');
    }
}
