<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
</head>
<body>
    <h1>Editar Produto</h1>

<form action="/produtos/{{ $produto->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ $produto->nome }}"><br><br>

    <label>Preço:</label>
    <input type="number" step="0.01" name="preco" value="{{ $produto->preco }}"><br><br>

    <label>Marca:</label>
    <input type="text" name="marca" value="{{ $produto->marca }}"><br><br>

    <label>Descrição:</label>
    <textarea name="descricao">{{ $produto->descricao }}</textarea><br><br>

    <label>Imagem:</label>
    <input type="file" name="imagem"><br><br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>