<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f43d67a5b9a608378a1164e" data-wf-site="5f43d6794f715d3ebe1c4707">
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
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
      <a href="/login" class="login-nav-link">Ingresar</a>
      <div class="div-block-1807" style="margin-top:30px;">
        <a href="/" class="button-52 w-button">Volver</a>
      </div>
      <div class="login-container w-form">

        @if($errors->any())
          {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <h1 class="login-head">@if(isAdmin()) Agregar nuevo usuario @else Registrarme a la billetera! @endif</h1>
        <form id="sign-up" class="memberstack-form" method="post" action="@if(isAdmin()) /usuario/agregarUsuario @else {{ route('register') }} @endif" enctype="multipart/form-data">
          @csrf
          <div class="field-row">
            <div class="field-wrapper first-name-wrapper">
              <label for="name" class="signup-label">Nombre *</label>
              <input id="name" type="text" name="name" class="signup-field w-input" required autofocus>
            </div>
            <div class="field-wrapper">
              <label for="last_name" class="signup-label">Apellido *</label>
              <input id="last_name" type="text" name="last_name" class="signup-field w-input" required>
            </div>
          </div>
          <div class="field-row">
            <div class="field-wrapper first-name-wrapper">
              <label for="number" class="signup-label">Numero de contacto</label>
              <input id="number" name="number" type="tel" pattern="^[0-9]+" class="signup-field w-input">
            </div>
            <div class="field-wrapper">
              <label for="email" class="signup-label">Email *</label>
              <input id="email" name="email" type="text" class="signup-field w-input" required>
            </div>
          </div>
          <div class="div-block-404">
            <label for="avatar" class="field-label-18">Foto de perfil</label>
            <input id="avatar" type="file" name="avatar" value="">
            {{-- <div class="div-block-402">
              <div class="div-block-1767">
                <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
                <a href="#" class="link-31">x</a>
              </div>
            </div>
            <input type="submit" value="cargar" data-wait="Please wait..." class="submit-button-15 w-button"> --}}
          </div>
          <br>
          @if(!isAdmin())
            <div class="field-wrapper">
              <label for="password" class="signup-label">Contraseña</label>
              <input type="password" class="signup-field w-input" name="password" data-name="Password 2" id="password" required>
            </div>
            <div class="field-wrapper">
              <label for="password_confirmation" class="signup-label">Repetir Contraseña</label>
              <input type="password" class="signup-field w-input" name="password_confirmation" data-name="Password 2" id="password_confirmation" required>
            </div>
          @endif
          {{-- <label class="w-checkbox gdpr-checkbox">
            <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" required="" class="w-checkbox-input">
            <span for="checkbox" class="terms-text w-form-label"> I agree to the <a href="#" class="login-page-link">Terms</a> and <a href="#" class="login-page-link">Privacy Policy</a></span>
          </label> --}}
          <button type="submit" data-wait="Please wait..." class="login-button w-button">
            @if(Auth::user() && Auth::user()->is_admin)
              Crear usuario
            @else
              Registrarme
            @endif

          </button>
        </form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="error-message w-form-fail">
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
