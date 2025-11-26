<!DOCTYPE html>
<html>
<head>
    <title>Categorias</title>
</head>
<body>

<h1>Cadastrar Categoria</h1>

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('categorias.salvar') }}" method="POST">
    @csrf

    <label>Nome:</label>
    <input type="text" name="nome"><br><br>

    <label>Descrição:</label>
    <textarea name="descricao"></textarea><br><br>

    <button type="submit">Salvar</button>
</form>

<hr>

<h2>Categorias cadastradas</h2>

<ul>
@foreach($categorias as $categoria)
    <li>
        <strong>{{ $categoria->nome }}</strong><br>
        {{ $categoria->descricao }}
    </li>
@endforeach
</ul>

</body>
</html>
