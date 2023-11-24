<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

       
        <link href="/css/style.css" rel="stylesheet">
        <script src="/js/script.js"></script>
        
    </head>

    <body class="antialiased">
        <h1>Hello World </h1>
        <img scr="/img/banner.jpg" alt="Banner">

        <br>
        @if (10 > 5)
            <p>a condicao é true</p>  
              
        @endif

        @if ($nomeView == "Rafael")
           <p>Nome é {{ $nomeView }}, sua idade é {{$idade}} anos </p> 
           
           @elseif ($nomeView == "José")
           <p> Nomé é {{ $nomeView }}</p>

           @else <p>Outro nome</p>
        @endif

        @if ($nomeView2 == "José")
           <p>Nome é {{ $nomeView2 }}</p>
           
           @elseif ($nomeView2 == "Rafael")
           <p> Nomé é {{ $nomeView2 }}</p>

           @else <p>Outro nome</p>
        @endif


        @for ($i=0; $i < count($arrayView); $i++) 
                <p> Indice {{$i}} - Valor {{$arrayView[$i]}}
                    @if ($i == 2)
                        Chave da posição {{$i}}
                    @endif
                </p>
        @endfor

        @php
            $nome ="joao";
            echo $nome;
        @endphp

        @foreach ($nomesView as $nome)
            <p>{{ $loop -> index}} </p> 
            <p>{{ $nome }} </p>

        @endforeach

       <!-- Comentario HTML, possivel ser viualizado se inspecionar a pagina-->
       {{-- COmentario que fica so na view do Blade , nao é possivel ser vizualizado em ispencao de tela--}}     

    </body>
</html>
