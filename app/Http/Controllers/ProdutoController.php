<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Cookie;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $mensagem = request()->cookie('mensagem_visitante');
        return view('produtos.index', compact('produtos', 'mensagem'));
    }

    public function criar()
    {
        return view('produtos.criar');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:255',
            'preco' => 'required|numeric',
            'marca' => 'required|string',
            'descricao' => 'nullable|string',
            'imagem' => 'required|mimes:jpg,png|max:2048'
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem')->store('produtos', 'public');
            $dados['imagem'] = $imagem;
        }

        Produto::create($dados);

        return redirect()->route('produtos.index')
            ->withCookie(cookie(
                'mensagem_visitante',
                'Obrigado por cadastrar um produto!',
                60
    ));

    }


    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'marca' => 'required|string',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120'


        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem')->store('produtos', 'public');
            $dados['imagem'] = $imagem;
        }

        $produto->update($dados);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado!');
    }

    public function destroy($id)
    {
        Produto::destroy($id);
        return redirect()->route('produtos.index')
            ->with('success', 'Produto excluído!');
    }
}
