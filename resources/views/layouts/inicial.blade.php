<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @yield('title')
    </title>
</head>
<body>
@section('sidebar')
    <nav>
    <a href="http://" target="_blank" rel="noopener noreferrer">Home</a>
    <a href="http://" target="_blank" rel="noopener noreferrer">Produto</a>
    <a href="http://" target="_blank" rel="noopener noreferrer">Link</a>
    </nav>

@if($aviso == true)
    <p>{{$mostrar1}}</p>
    <img src="{{asset('imagens/cachorro.png')}}" alt="">

@else
   <p>{{$mostrar2}}</p>
   <img src="{{asset('imagens/gato1.png')}}" alt="">

@endif
</body>
</html>