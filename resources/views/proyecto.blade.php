<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f6396bf3620cbeef57eb7d9" data-wf-site="5f43d6794f715d3ebe1c4707">
<head>
  <meta charset="utf-8">
  <title>landing proyecto</title>
  <meta content="landing proyecto" property="og:title">
  <meta content="landing proyecto" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="/css/webflow.css" rel="stylesheet" type="text/css">
  <link href="/css/undefineds-stunning-project-1f65bd.webflow.css" rel="stylesheet" type="text/css">
  <link href="/css/uikit.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Varela:400","Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Oswald:200,300,400,500,600,700","Karla:regular,700"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>

  <link href="/images/webclip.png" rel="apple-touch-icon">
  <!-- REPLACE ↓↓ -->
  <!--  Temporary Memberstack Code  -->
  <script src="https://api.memberstack.io/static/memberstack.js" data-memberstack-id="492fe7dc98e13f13d8933202d4c9b994"></script>
  <!-- REPLACE ↑↑ -->
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
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

{{-- @if (tieneImagenes($proyecto))
  @foreach (imagenesProyecto($proyecto) as $imagen)
    {{dd($imagen)}};
  @endforeach
@endif --}}



<body class="body-3">
  <div class="div-block-1783">
    <div class="div-block-1784">
      <div data-animation="slide" data-duration="500" data-infinite="1" class="slider-16 w-slider">
        <div class="w-slider-mask">
          {{-- Si el proyecto tiene imagenes --}}
          @if (tieneImagenes($proyecto))
          {{-- Las recorro y creo un slide por cada una --}}
            @foreach (imagenesProyecto($proyecto) as $imagen)
              <div class="w-slide">
                <div class="div-block-1785"
                  style="background-image: url('/storage/{{$imagen['path']}}'); background-repeat: no-repeat; background-position: center;"
                ></div>
              </div>
            @endforeach
          @else
            <div class="w-slide">
              <div class="div-block-1785"
                style="background-image: url('/storage/archivos/img/proyectoimagendefault.jpg'); background-size: contain; background-repeat: no-repeat; background-position: center;"
              ></div>
            </div>
          @endif
        </div>
        <div class="w-slider-arrow-left">
          <div class="w-icon-slider-left"></div>
        </div>
        <div class="w-slider-arrow-right">
          <div class="w-icon-slider-right"></div>
        </div>
        <div class="w-slider-nav w-round"></div>
      </div>
    </div>
    <div class="div-block-1793">
      <a href="/" class="button-37 w-button">volver a mi billetera</a>
    </div>
  </div>
  <div class="div-block-1786">
    <h1 class="heading-34">{{$proyecto->titulo}}</h1>

    {{-- Estados --}}
    <div class="div-block-1804">
      <div class="progress-wrapper-copy">
        <div class="box-padding" style="display:flex; flex-direction: row; justify-content: space-around;">
          @php
          $contador = 1
          @endphp
          {{-- Agarro el array de estados y lo recorro --}}
          @foreach (estados($proyecto->estados) as $estado)
            <div style="display:flex; flex-direction: column;">
              {{-- Enumero los estados con la ayuda de una variable contador definida en la linea 393 --}}
              <span class="contador" style="display:flex; flex-direction: column; align-items: center; color: #707070;">{{$contador}}</span>
              {{-- Escribo los estados --}}
              <span style="font-size: 12px; text-align: center; color: #707070;">{{$estado}}</span>
            </div>
            @php
            $contador++
            @endphp
          @endforeach
        </div>
          <div style="margin: 0 auto; text-align: -webkit-center; width: 90%;">
            {{-- Coloco la barra de porcentaje --}}
            <progress class="uk-progress progress-green" value="{{$proyecto->porcentaje}}" max="100" style="border:2px solid #333; text-align: left;"></progress>
          </div>
      </div>
    </div>

    @if ($proyecto->imagen_360)
      <div class="div-block-1821" style="text-align-last: center; padding-top:40px;">
        <div class="html-embed-5 w-embed w-iframe">
          <iframe style=" border: 3px solid #dfeffc; box-shadow: -7px -7px 20px -5px rgba(0, 0, 0, 0.38), 7px 7px 20px 0 #fff;" width="560" height="315" src="{{$proyecto->imagen_360}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    @endif


    <div data-duration-in="300" data-duration-out="100" class="tabs-9 w-tabs">

      {{-- Tabs referentes --}}
      <div class="tabs-menu-17 w-tab-menu">
        @php
          $tab = 1
        @endphp
        @foreach ($tipo_de_referentes as $tipo_de_referente)
        <a data-w-tab="Tab {{$tab}}" class="tab-link-tab-1-16 w-inline-block w-tab-link w--current">
          <div>{{$tipo_de_referente->tipo}}</div>
        </a>
        @php
          $tab++
        @endphp
      @endforeach
      </div>

      {{-- Referentes --}}
      <div class="tabs-content-11 w-tab-content">
        {{-- Creo un contador para que se generes tantas tabs como tipos de referentes existan --}}
          @php
          $tab = 1
          @endphp

          {{-- Recorro los tipos de referentes que existen --}}
        @foreach ($tipo_de_referentes as $tipo_de_referente)
          <div data-w-tab="Tab {{$tab}}" class="w-tab-pane {{ $tab == 1 ? 'w--tab-active' : '' }}">
            <div class="div-block-1787">
              {{-- Pido que traigan los referentes que pertenecen al proyecto y que correspondan al tipo de referente que se esta foreacheando --}}
            @foreach (referentes($proyecto, $tipo_de_referente->id) as $referente)
              <div class="div-block-1789">
                <div class="div-block-1788">
                  <div class="div-block-1790"
                  @if ($referente->foto)
                    style="background-image: url('/storage/{{$referente->foto}}'); background-repeat: no-repeat; background-position: center;"
                  @else
                    style="background-image: url('/storage/archivos/img/avatarpredeterminado.svg'); background-size: contain; background-repeat: no-repeat; background-position: center;"
                  @endif
                  ></div>
                  <h1 class="heading-35">{{$referente->nombre}}</h1>
                </div>
              </div>
            @endforeach
            </div>
          </div>
          @php
            $tab++
          @endphp
        @endforeach

      </div>
    </div>
  </div>
  <div class="div-block-1791">
    <h1 class="heading-36">Actualizaciones</h1>
    <div class="div-block-1794">
      <div data-animation="slide" data-duration="500" data-infinite="1" class="slider-17 w-slider">
        <div class="mask-3 w-slider-mask">
          @foreach ($proyecto->actualizaciones as $actualizacion)
          <div class="w-slide">
            <div class="div-block-1792">
              <div class="text-block-322">{{$actualizacion->fecha}}</div>
              <div class="text-block-323">{{$actualizacion->descripcion}}</div>
              <div class="text-block-324">{{$actualizacion->nombre_empresa}}</div>
            </div>
          </div>
        @endforeach
        </div>
        <div class="w-slider-arrow-left">
          <div class="icon-19 w-icon-slider-left"></div>
        </div>
        <div class="w-slider-arrow-right">
          <div class="icon-18 w-icon-slider-right"></div>
        </div>
        <div class="w-slider-nav w-round"></div>
      </div>
    </div>
  </div>

  <div class="div-block-1796" style="margin: 0 auto;">
    <a href="{{$proyecto->link_web}}"target="_blank" class="button-39 w-button">Ver landing del proyecto</a>
  </div>

  <div style="position: fixed; bottom: 40%; left: -3%">
    <h1 class="h4-asesores h1">{{$proyecto->titulo}}</h1>
  </div>

  <div class="html-embed-2 w-embed">
    <style>
.h1 {
  color: black;
  -webkit-text-fill-color: rgba(0,0,0,0); /* Will override color (regardless of order) */
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: #707070;
}
</style>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5f43d6794f715d3ebe1c4707" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="/js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div memberstack-template="Client Dashboard Template"></div>
  <!-- Crisp + MemberStack -->
  <script>
    MemberStack.onReady.then(function(member) {
    var email = member["email"]
    var name = member["first-name"]
    if (member.loggedIn) {
        try{
            $crisp.push(["set", "user:email", [email] ])
            $crisp.push(["set", "user:nickname", [name] ])
          } catch(e) {}
    }
})
</script>
<!-- UIkit JS -->
<script src="/js/uikit.js" type="text/javascript"></script>
</body>
</html>
