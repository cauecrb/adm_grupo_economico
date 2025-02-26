<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmGrupo;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = AdmGrupos::all();
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        return view('grupos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Grupo::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('grupos.index');
    }
}
