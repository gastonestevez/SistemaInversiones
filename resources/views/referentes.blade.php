<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f889e59a1722d5644d30790" data-wf-site="5f43d6794f715d3ebe1c4707">
<head>
  <meta charset="utf-8">
  <title>Referentes</title>
  <meta content="Agregar localidades" property="og:title">
  <meta content="Agregar localidades" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href=/"css/normalize.css" rel="stylesheet" type="text/css">
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
<body class="body-8">
  <h1 class="h4-asesores-2 h1 carga-localidades">Tipos de referente</h1>
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
      <a href="/" class="button-53 w-button">Volver</a>
    </div>
    <div class="form-block-copy w-form">
      <form id="agregar-tipo-de-referente" class="form-5" action="/addreferente" method="post">
        @csrf
        <div>
          <label for="tipo" class="field-label-31">Tipo de Referente</label>
          <input type="text" class="text-field-16 w-input" maxlength="256" name="tipo" data-name="tipo" placeholder="" id="tipo" required>
        </div>
        <div id="w-node-4dc8d18de874-44d30790" class="div-block-1808">
          <input type="submit" value="Cargar" data-wait="Please wait..." class="submit-button-17 w-button">
        </div>
      </form>

      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form.</div>
      </div>
    </div>

    <div class="div-block-1811">

      @foreach ($referentes as $referente)
        <div class="div-block-1812">
          <div class="div-block-1813">
            <form class="" action="/editreferente/{{$referente->id}}" method="post">
              @method('put')
              @csrf
              <input type="text" value="{{$referente->tipo}}" class="text-field-16 w-input" maxlength="256" name="tipo" data-name="tipo" placeholder="" id="tipo">
              <input type="submit" value="Editar" class="button-39 w-button">
            </form>
            <form class="" action="/deletereferente/{{$referente->id}}" method="post">
              @method('delete')
              @csrf
              <input type="submit" value="Eliminar" class="button-39 w-button">
            </form>
          </div>
        </div>
      @endforeach

    </div>
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
</body>
</html>
