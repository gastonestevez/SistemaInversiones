<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f43d67a5b9a603b9ea11649" data-wf-site="5f43d6794f715d3ebe1c4707">
<head>
  <meta charset="utf-8">
  <title>Inicio de Sesión</title>
  <meta content="Login" property="og:title">
  <meta content="Login" property="twitter:title">
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

<body class="body-4">

  <div class="login-page-wrapper">

    <div class="div-block-1807" style="margin-top:30px;">
      <a href="/" class="button-52 w-button">Volver</a>
    </div>

    <div class="login-container w-form">
      <div class="login-container"></div>

      <h1 class="login-head">Inicia Sesión</h1>

      @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
      @endif

      <form method="POST" action="{{ route('login') }}" class="memberstack-form">
        @csrf
        <div class="field-wrapper">
          <label for="email" class="signup-label">Email</label>
          <input id="email" value="{{old('email')}}" type="email" name="email" class="signup-field w-input" required autofocus>
        </div>
        <div class="field-wrapper">
          <label for="password" class="signup-label">Contraseña</label>
          <input type="password" class="signup-field w-input" name="password" id="password" required>
        </div>
        <div class="field-wrapper">
          <label style="display: inline;" for="remember" class="signup-label">Recordarme</label>
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        </div>
        <br>
        <div style="text-align:center;" class="secondary-action forgot-password">
          <a href="/password/reset" class="login-link">Olvidaste tu contraseña?</a>
        </div>
        <div style="text-align:center;" class="secondary-action forgot-password">
          No tienes cuenta? <a href="/register" class="login-link">Registrate</a>
        </div>
        <button type="submit" data-wait="Please wait..." class="login-button w-button">Ingresar</button>
      </form>


      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="error-message w-form-fail">
        <div>Oops! Something went wrong while submitting the form.</div>
      </div>
    </div>

    <div memberstack-template="Client Dashboard Template" class="template-tag">
      <a href="http://memberstack.io" target="_blank" class="w-inline-block"></a>
    </div>
  </div>

  <div style="display:none" class="delete-me-welcome">
    <div class="ms-iframe"></div>
    <div class="help-tooltip tour-tooltip">
      <div class="help-tooltip-content">
        <div class="help-title inline-block">Setup To-do</div>
        <div class="relative">1. Publish this site<br>2. Create a <a href="https://app.memberstack.io/all-websites" target="_blank">MemberStack account</a><br>3. Activate your membership site  🎉🎉🎉<br></div>
        <div class="tour-dot"></div>
        <div class="w-embed">

          <style>
          @keyframes tourDot {
          0%   {box-shadow: 0 0 0 0px rgba(42, 168, 255, 0.8);}
          100% {box-shadow: 0 0 0 80px rgba(42, 168, 255, 0);}
          }
          .tour-dot {
          animation: tourDot 1.5s ease-out infinite;
          }
          </style>
        </div>
      </div>

      <div class="tour-bottom-row">
        <div>You can delete this to-do list anytime.</div>
      </div>
      <div class="tour-diamond top-right"></div>
    </div>

    <div class="ms-iframe">
      <div class="ms-iframe-embed w-embed w-iframe">
        <iframe src="https://memberstack-embeds.webflow.io/branding" sandbox="allow-same-origin allow-scripts allow-forms allow-top-navigation allow-popups"></iframe>
          <style>
            iframe {
            height: 100%;
            width: 100%;
            border-width: 0px;
            border-style: inset;
            border-color: initial;
            border-image: initial;
            border: 0;
            border: none;
            min-height: 0px;
            min-width: 0px;
            background: transparent;
            }
            * {
            box-sizing: border-box;
            }
            /* width */
            ::-webkit-scrollbar {
            height: 0px;
            width: 0px;
            background-color:;
            }
            /* Track */
            ::-webkit-scrollbar-track {
            background: transparent;
            }
            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: transparent;
            }
            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: transparent;
            }
          </style>
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
