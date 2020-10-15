<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Probando</title>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- UIkit CSS -->
    <link href="/css/uikit.css" rel="stylesheet" type="text/css">
    <style media="screen">
    .uk-progress.progress-green::-webkit-progress-value
      {
        background: linear-gradient(96deg, #dfeffc, #707070);
      }
      .uk-progress.progress-green::-moz-progress-bar
      {
        background: linear-gradient(96deg, #dfeffc, #707070);
      }
      .uk-progress.progress-green::-ms-fill
      {
        background: linear-gradient(96deg, #dfeffc, #707070);
      }

      .contador
      {
        width: 40px;
        height: 40px;
        margin-right: auto;
        margin-bottom: 0.25em;
        margin-left: auto;
        padding: 7px;
        border-radius: 20px;
        background-color: #dfeffc;
        box-shadow: 4px 4px 5px -2px rgba(0, 0, 0, 0.1);
        font-size: 18px;
        font-weight: 700;
      }
    </style>
  </head>
  <body>
    {{-- <div class="">
      <div class="d-flex justify-content-around">
        @php
          $contador = 1
        @endphp
        @foreach ($array_estados as $estado)
          <div class="d-flex flex-column">
            <span class="text-center contador">{{$contador}}</span>
            <span style="font-size: 30px;">{{$estado}}</span>
          </div>
          @php
          $contador++
          @endphp
        @endforeach

      </div>
      <div class="">
        <progress class="uk-progress progress-green" value="80" max="100" style="border:2px solid;"></progress>
      </div>
    </div> --}}


    <div class="container">

      {{-- Notificaciones --}}
    @if (session('status'))
      <div class="alert">
        {{session('status')}}
      </div>
    @endif

      <h1>Probando Datos</h1>

      @foreach ($usuarios as $usuario)


        <span style="text-decoration: underline;"><a href="{{ route('perfil.show', ['id' => $usuario->id]) }}">{{$usuario->name}}</a></span><br>
        <img width="150px" src="/storage/{{$usuario->avatar}}" alt=""><br>
        <span>Total en billetera: ${{precio($usuario->billetera->total)}}</span><br>
        <span>Total invertido: ${{precio($usuario->billetera->inversion_inicial)}}</span><br>
        <span>Proyectos en los que invirtio:{{count($usuario->proyectos)}}</span><br>


        @foreach ($usuario->proyectos as $proyecto)
          @php
          $contador = 1
          @endphp
          <li class=""><span><a href="{{ route('proyecto.show', ['slug' => $proyecto->slug]) }}">{{$proyecto->titulo}}</a></span></li><br>
          <span>Invertido en este proyecto: ${{precio($proyecto->inversion->inversion)}}</span>
          <div style="width: 50%;">
            <div class="d-flex justify-content-around">
            @foreach (estados($proyecto->estados) as $estado)
              <div class="d-flex flex-column">
                <span class="text-center contador">{{$contador}}</span>
                <span class="text-center" style="font-size: 10px;">{{$estado}}</span>
              </div>
              @php
              $contador++
              @endphp
            @endforeach
            </div>
            <div class="">
              <progress class="uk-progress progress-green" value="{{$proyecto->porcentaje}}" max="100" style="border:2px solid;"></progress>
            </div>
          </div>

        @endforeach

        <br>
      @endforeach

    </div>

    {{-- Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
    <script src="/js/uikit.js" type="text/javascript"></script>
  </body>
</html>
