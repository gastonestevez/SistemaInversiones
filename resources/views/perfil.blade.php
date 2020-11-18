<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f63a0b387fe6ed69b2e8b6e" data-wf-site="5f43d6794f715d3ebe1c4707">
<head>
  <meta charset="utf-8">
  <title>Perfil de usuario</title>
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

      <h1 class="login-head">Perfil de Usuario</h1>
      <form id="perfil" class="memberstack-form" method="post" action="/perfil/{{$user->id}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="field-row">
          <div class="field-wrapper first-name-wrapper">
            <label for="name" class="signup-label">Nombre *</label>
            <input id="name" value="{{$user->name}}" type="text" name="name" class="signup-field w-input" required autofocus>
          </div>
          <div class="field-wrapper">
            <label for="apellido" class="signup-label">Apellido *</label>
            <input id="apellido" value="{{$user->last_name}}" type="text" name="apellido" class="signup-field w-input" required>
          </div>
        </div>
        <div class="field-row">
          <div class="field-wrapper first-name-wrapper">
            <label for="number" class="signup-label">Numero de contacto</label>
            <input id="number" value="{{$user->number}}" type="tel" name="number" pattern="^[0-9]+" class="signup-field w-input">
          </div>
          <div class="field-wrapper">
            <label for="email" class="signup-label">Email *</label>
            <input id="email" value="{{$user->email}}" type="text" name="email" class="signup-field w-input" required>
          </div>
        </div>
        <div class="field-wrapper">
          <label for="new_password" class="signup-label">Contraseña nueva</label>
          <input type="password" class="signup-field w-input" name="new_password" data-name="Password 2" id="new_password">
        </div>
        <div class="field-wrapper">
          <label for="new_password_confirmation" class="signup-label">Repetir Contraseña</label>
          <input type="password" class="signup-field w-input" name="new_password_confirmation" data-name="Password 2" id="new_password_confirmation">
        </div>
        <div class="field-wrapper">
          <label for="avatar" class="field-label-18">Foto de perfil</label>
          <input id="avatar" type="file" name="avatar" class="submit-button-15 w-button">
        </div>
        @if(Auth::User()->is_admin)
          <div class="field-wrapper">
            <label for="is_admin" class="field-label-18">Rol de administrador</label>
            <input type="checkbox" value="1" class="text-field w-input" name="is_admin" id="is_admin" @if($user->is_admin) checked @endif>
          </div>
        @endif
        <button id="editperfil" type="submit" value="Cargar" data-wait="Please wait..." class="submit-button-17 w-button" style="display:none">Editar</button>
      </form>

        <div class="div-block-404">
          <div class="div-block-402">

            {{-- Avatar del usuario --}}
            <div class="div-block-1767">
              {{-- Si el usuario tiene avatar --}}
              @if ($user->avatar)
                <img src="/storage/{{$user->avatar}}" alt="{{$user->name}}" style="max-width: 300px; max-height: 150px;">
                {{-- Borrar el Avatar --}}
                <form class="" action="/user/deleteimage/{{$user->id}}" method="post">
                  @method('delete')
                  @csrf
                  <input type="submit" class="link-32" value="x" style="cursor:pointer; border:none; color: black;">
                </form>
              @else
                <img src="/storage/archivos/img/avatarpredeterminado.svg" alt="{{$user->name}}" style="max-width: 300px;">
              @endif
            </div>
          </div>

        <br>

      <label for="editperfil" class="submit-button-17 w-button" style="text-align:center; font-weight: 500;">Editar</label>

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
