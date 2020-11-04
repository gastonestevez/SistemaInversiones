<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f8898280ca06c85aa769d9a" data-wf-site="5f43d6794f715d3ebe1c4707">
<head>
  <meta charset="utf-8">
  <title>Cargar Asesor</title>
  <meta content="Cargar Asesores" property="og:title">
  <meta content="Cargar Asesores" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="/css/webflow.css" rel="stylesheet" type="text/css">
  <link href="/css/undefineds-stunning-project-1f65bd.webflow.css" rel="stylesheet" type="text/css">
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
</head>
<body class="body-6">
  <h1 class="h4-asesores-2 h1 carga-de-proyecto">Cargar Asesores</h1>
  <div class="w-embed">
    <style>
      .h1 {
        color: black;
        -webkit-text-fill-color: rgba(0,0,0,0); /* Will override color (regardless of order) */
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: #707070;
      }
    </style>
  </div>


  <div id="fichar-cargar-proyecto" class="carga-de-proyectos">
    <div class="div-block-405"></div>
    <div class="div-block-1807">
      <a href="{{url()->previous()}}" class="button-53 w-button">Volver</a>
    </div>
    <div class="form-block-copy w-form">

      @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
      @endif

      <form id="addasesor-form" name="addasesor-form" data-name="Email Form" class="form-5" action="/editasesor/{{$asesor->id}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div>
          <label for="nombre" class="field-label-31">Nombre</label>
          <input  value="{{ old('nombre', $asesor->nombre) }}" type="text" class="text-field-16 w-input" maxlength="256" name="nombre" data-name="Nombre" placeholder="" id="nombre" required autofocus>
        </div>
        <div>
          <label for="numero" class="field-label-31">Numero</label>
          <input value="{{ old('numero', $asesor->numero) }}" type="tel" pattern="^[0-9]+" maxlength="256" name="numero" data-name="" id="numero" class="text-field-16 w-input" required>
        </div>
        <div>
          <label for="rentabilidad" class="field-label-32">Rentabilidad</label>
          <input value="{{ old('rentabilidad', $asesor->rentabilidad) }}" type="number" maxlength="256" name="rentabilidad" data-name="" id="rentabilidad" class="text-field-16 w-input">
        </div>
        <div id="foto" class="div-block-404">
          <label for="foto" class="field-label-32">Cargar Foto</label>
          <div class="div-block-1806">
            <input id="foto" type="file" name="foto" data-wait="Please wait..." class="submit-button-15 w-button">
          </div>
        </div>

        <div id="w-node-3b6e0ffe3746-aa769d9a" class="div-block-1808">
          <button id="editasesor" type="submit" value="Cargar" data-wait="Please wait..." class="submit-button-17 w-button" style="display:none">Editar</button>
        </div>

      </form>

      {{-- Foto del asesor --}}
      <div class="div-block-1767">
        {{-- Si el asesor tiene foto --}}
        @if ($asesor->foto)
          <img src="/storage/{{$asesor->foto}}" alt="{{$asesor->nombre}}" style="max-width: 300px; max-height: 150px;">
          {{-- Borrar la foto --}}
          <form class="" action="/asesor/deleteimage/{{$asesor->id}}" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="link-32" value="x" style="cursor:pointer; border:none; color: black;">
          </form>
        @else
          <img src="/storage/archivos/img/avatarpredeterminado.svg" alt="{{$asesor->nombre}}" style="max-width: 300px;">
        @endif
      </div>

      <br>

      <br>

      <label for="editasesor" class="submit-button-17 w-button" style="text-align:center; font-weight: 500;">Editar Asesor</label>

      <br>
      <br>

      {{-- Eliminar Asesor --}}
      <form class="" action="/deleteasesor/{{$asesor->id}}" method="post">
        @method('delete')
        @csrf
        <div id="w-node-3b6e0ffe3746-aa769d9a" class="div-block-1808">
          <button type="submit" value="Cargar" data-wait="Please wait..." class="submit-button-17 w-button">Eliminar Asesor</button>
        </div>
      </form>

      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form.</div>
      </div>
    </div>
  </div>


  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5f43d6794f715d3ebe1c4707" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
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
</body>
</html>
