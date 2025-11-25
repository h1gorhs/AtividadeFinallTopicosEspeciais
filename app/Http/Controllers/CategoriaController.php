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
            'nome' => 'required|max:255',
            'descricao' => 'nullable'
        ]);

        Categoria::create($request->all());
        return redirect('/categorias')->with('success', 'Categoria cadastrada!');
    }

}
