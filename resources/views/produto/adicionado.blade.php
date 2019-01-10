@extends('layout.principal')

@section('conteudo')

<div class="alert alert-success">
    <strong>Sucesso!</strong> O produto {{$nome}} foi adicionado.
</div>
<br>
<a href="/produtos">Voltar  a listagem</a>
@stop