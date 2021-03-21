@extends('layouts.externo')
@section('title', 'Quadro de Avisos da Empresa')
@section('sidebar')
    @parent
    <p>^ ^ Barra superior adicionada do layout pai/mãe ^ ^ </p>
@endsection
@section('content')
    <p>Quadro de Avisos da Empresa</p>

    <p>{{$nome}} olha aqui</p>

    @if($mostrar)

    @foreach($avisos as $aviso)

    <p>aviso #{{$aviso['id']}}: {{$aviso['texto']}}</p>

    @endforeach

    @else
    o aviso não sera exibido!

    @endif


@endsection
