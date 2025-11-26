<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Index Produtos</title>
</head>
<body>
    <h1>Produtos cadastrados</h1>
    <a href="{{ route('produtos.criar') }}">Novo Produto</a>

    <ul>
    @foreach($produtos as $produto)
    <li>
        <strong>{{ $produto->nome }}</strong><br>
        R$ {{ number_format($produto->preco,2,',','.') }}<br>

        @if($produto->imagem)
            <img src="{{ asset('storage/'.$produto->imagem) }}" width="150">
        @endif

        <br>
        <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>

        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </li>
    @endforeach
    </ul>

    @if(isset($mensagem))
        <p style="background:#e0f7fa;padding:10px;border-radius:5px">
            {{ $mensagem }}
        </p>
    @endif


</body>
</html>
