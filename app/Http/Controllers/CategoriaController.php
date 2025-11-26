<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|min:3|max:255',
            'descricao' => 'nullable|string'
        ]);


        Categoria::create($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria cadastrada com sucesso!');
    }

}
