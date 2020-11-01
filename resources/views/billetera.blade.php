<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f63a0b387fe6ed69b2e8b6e" data-wf-site="5f43d6794f715d3ebe1c4707">
<head>
  <meta charset="utf-8">
  <title>Editar Billetera</title>
  <meta content="perfil" property="og:title">
  <meta content="perfil" property="twitter:title">
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
<body>

  <div class="login-page-wrapper">
    <div class="div-block-1807" style="margin-top:30px;">
      <a href="{{ url()->previous() }}" class="button-52 w-button">Volver</a>
    </div>
    <div class="login-container w-form">

      @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
      @endif

      <h1 class="login-head">Editar la billetera de {{$user->name}}</h1>
      <form id="editbilletera" class="memberstack-form" method="post" action="/billetera/{{$user->id}}">

        @method('put')
        @csrf
        <div class="field-row">
          <div class="field-wrapper first-name-wrapper">
            <label for="total" class="signup-label">Total</label>
            <input id="total" value="{{$billetera->total}}" type="number" name="total" class="signup-field w-input" required autofocus>
          </div>
          <div class="field-wrapper">
            <label for="invertido" class="signup-label">Invertido</label>
            <input id="invertido" value="{{$billetera->invertido}}" type="number" name="invertido" class="signup-field w-input" required>
          </div>
        </div>
        <div class="field-row">
          <div class="field-wrapper first-name-wrapper">
            <label for="rentabilidad" class="signup-label">Rentabilidad</label>
            <input id="rentabilidad" value="{{$billetera->rentabilidad}}" type="number" name="rentabilidad" class="signup-field w-input">
          </div>
        </div>

        <div class="field-row">
          <button id="editbilletera" type="submit" value="Editar" data-wait="Please wait..." class="submit-button-17 w-button">Editar</button>
        </div>

      </form>

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
