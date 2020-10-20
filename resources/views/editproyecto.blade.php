<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f887778f7aee372dab82f42" data-wf-site="5f43d6794f715d3ebe1c4707">
  <head>
    <meta charset="utf-8">
    <title>Agregar Proyecto</title>
    <meta content="Agregar proyecto" property="og:title">
    <meta content="Agregar proyecto" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="/css/webflow.css" rel="stylesheet" type="text/css">
    <link href="/css/undefineds-stunning-project-1f65bd.webflow.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Varela:400","Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Oswald:200,300,400,500,600,700","Karla:regular,700"]  }});</script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="/images/webclip.png" rel="apple-touch-icon">
    <!-- REPLACE ↓↓ -->
    <!--  Temporary Memberstack Code  -->
    <script src="https://api.memberstack.io/static/memberstack.js" data-memberstack-id="492fe7dc98e13f13d8933202d4c9b994"></script>
    <!-- REPLACE ↑↑ -->
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  </head>


  <body class="body-5">
    <div id="fichar-cargar-proyecto" class="carga-de-proyectos">
      <div class="div-block-405"></div>
      <div class="div-block-1807">
        <a href="/" class="button-52 w-button">Volver</a>
      </div>
      <div class="form-block-copy w-form">

        @if($errors->any())
          {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif

        <form id="addproyecto-form" name="addproyecto-form" data-name="Email Form" class="form-5" action="/addproyecto" method="post" enctype="multipart/form-data">
          <div>
            <label for="titulo" class="field-label-29">Título</label>
            <input type="text" class="text-field-15 w-input" maxlength="256" name="titulo" data-name="Name" placeholder="" id="titulo" required autofocus>
          </div>
          <div>
            <label for="fecha" class="field-label-30">Fecha de entrega</label>
            <input type="number" class="text-field-15 w-input" maxlength="256" name="fecha" data-name="Fecha De Entrega" placeholder="" id="fecha">
          </div>
          <div>
            <label for="imagen_360" class="field-label-30">Imagen 360º (Embed)</label>
            <input type="text" maxlength="256" name="imagen_360"data-name="" id="imagen_360" class="text-field-15 w-input">
          </div>
          <div>
            <label for="estados" class="field-label-30">Estados (separados por coma)</label>
            <input type="text" maxlength="256" data-name="" name="estados" id="estados" class="text-field-15 w-input" required>
          </div>
          <div>
            <label for="porcentaje" class="field-label-30">Porcentaje</label>
            <input type="text" class="text-field-15 w-input" maxlength="256" name="porcentaje" data-name="porcentaje" placeholder="" id="porcentaje" required>
          </div>
          <div>
            <label for="localidad_id" class="field-label-17">Localidad</label>
            <select id="localidad_id" name="localidad_id" class="w-select">
              <option value="">Seleccione una...</option>
              @foreach ($localidades as $localidad)
                <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div style="display: flex; flex-direction: column; justify-self: left;">
            <label for="destacado" class="field-label-30">Destacar</label>
            <input type="checkbox" class="text-field-15 w-input" maxlength="256" name="destacado" data-name="porcentaje" placeholder="" id="destacado" required>
          </div>
          <div id="w-node-6b61b68d485b-dab82f42" class="div-block-404">
            <label for="email" class="field-label-30">Cargar imagenes</label>
            <div class="div-block-1806">
              <div class="div-block-1767">
                <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
                <a href="#" class="link-32">x</a></div>
              <div class="div-block-1767">
                <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
                <a href="#" class="link-32">x</a></div>
              <div class="div-block-1767">
                <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
                <a href="#" class="link-32">x</a></div>
            </div>
            <div class="div-block-1809">
              <input type="submit" value="cargar" data-wait="Please wait..." class="submit-button-15 w-button">
            </div>
          </div>
          <div id="w-node-548f5d9e0338-dab82f42" class="div-block-404">
            <label for="email" class="field-label-30">Logo</label>
            <div class="div-block-1806">
              <div class="div-block-1767">
                <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
                <a href="#" class="link-32">x</a></div>
              <div class="div-block-1767">
                <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
                <a href="#" class="link-32">x</a></div>
            </div>
            <div class="div-block-1809">
              <input type="submit" value="cargar" data-wait="Please wait..." class="submit-button-15 w-button">
            </div>
          </div>
          <div id="w-node-b420ab1b7a67-dab82f42" class="div-block-404">
            <label for="email" class="field-label-30">Documento</label>
            <div class="div-block-1806">
              <div class="div-block-1767">
                <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
                <a href="#" class="link-32">x</a></div>
              <div class="div-block-1767">
                <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
                <a href="#" class="link-32">x</a></div>
              <div class="div-block-1767">
                <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
                <a href="#" class="link-32">x</a></div>
            </div>
            <div class="div-block-1809">
              <input type="submit" value="cargar" data-wait="Please wait..." class="submit-button-15 w-button">
            </div>
          </div>
          <div id="w-node-9b4e0133bb7d-dab82f42" class="div-block-1814">
            <label for="email" class="field-label-30">Referente</label>
            <div>
              <label for="node-2" class="field-label-30">Nombre</label>
              <input type="text" maxlength="256" data-name="" required="" id="node" class="text-field-15 w-input">
            </div>
            <div>
              <label for="email" class="field-label-30">Tipo</label>
              <select id="field-2" name="field-2" class="w-select">
                <option value="">Select one...</option>
                <option value="First">First Choice</option>
                <option value="Second">Second Choice</option>
                <option value="Third">Third Choice</option>
              </select>
            </div>
            <div class="div-block-1767">
              <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="">
              <a href="#" class="link-32">x</a>
            </div>
          </div>
          <div id="w-node-3a3f3b505af0-dab82f42" class="div-block-1808">
            <input type="submit" value="Cargar" data-wait="Please wait..." class="submit-button-14 w-button">
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

    <h1 class="h4-asesores-2 h1 carga-de-proyecto">Cargar Proyecto</h1>
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
