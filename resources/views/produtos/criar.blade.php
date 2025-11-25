<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
</head>
<body>
    <h1>Novo Produto</h1>

        @if ($errors->any())
        <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
            @endforeach
        </ul>
        </div>
        @endif

    <form action="{{ route('produtos.salvar') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome"><br><br>

        <label>Preço:</label>
        <input type="number" step="0.01" name="preco"><br><br>

        <label>Marca:</label>
        <input type="text" name="marca"><br><br>

        <label>Descrição:</label>
        <textarea name="descricao"></textarea><br><br>

        <label>Imagem:</label>
        <input type="file" name="imagem"><br><br>

        <button type="submit">Salvar</button>
    </form>



    <br>

    <a href="{{ route('produtos.index') }}">Voltar</a>

</body>
</html>