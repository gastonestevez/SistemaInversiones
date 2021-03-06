<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f720e830677092462981594" data-wf-site="5f43d6794f715d3ebe1c4707">
<head>
  <meta charset="utf-8">
  <title>landing asesores</title>
  <meta content="landing asesores" property="og:title">
  <meta content="landing asesores" property="twitter:title">
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
  </style>
</head>
<body class="body-2">
  <div class="div-block-1773">
    <div class="div-block-1776">
      <div class="div-block-1774">
        <div class="div-block-1775"
        @if ($asesor->foto)
          style="background-image: url('/storage/{{$asesor->foto}}'); background-repeat: no-repeat; background-position: center;"
        @else
          style="background-image: url('/storage/archivos/img/avatarpredeterminado.svg'); background-size: contain; background-repeat: no-repeat; background-position: center;"
        @endif
        ></div>
        <div class="div-block-1777">
          <h1 class="heading-31">{{$asesor->nombre}}</h1>
          <div class="div-block-1771-copy">
            <div class="ses">{{$asesor->rentabilidad}}%</div>
            <div class="se"> De rentabilidad aprox.</div>
          </div>
          <div class="div-block-1800">
            <div class="box-padding-copy">
              <div class="progress-wrapper">
                <div class="progress-text-row">
                  <div class="progress-text-column">
                    <div class="progress-icon-2">
                      <div class="text-block-314">{{count($asesor->proyectos)}}</div>
                    </div>
                    <div class="text-block-321">Proyectos</div>
                  </div>
                  <div class="progress-text-column">
                    <div class="progress-icon-2">
                      <div class="text-block-314">{{cantidadInversores($asesor)}}</div>
                    </div>
                    <div class="text-block-321">Inversores</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="div-block-1801">
            <a href="https://api.whatsapp.com/send?phone={{$asesor->numero}}" target="_blank" class="button-36-copy w-button">Chat</a>
          </div>

          @if (isAdmin())
            <div class="div-block-1805">
              <a href="/editasesor/{{$asesor->id}}" class="button-39 w-button">Editar</a>
              <form class="" action="/deleteasesor/{{$asesor->id}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="button-39 w-button" value="Eliminar">
              </form>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
  <h1 class="h4-asesores">Asesores</h1>
  <div class="div-block-1778">
    <h1 class="heading-32">Cartera de proyectos</h1>

    <div class="div-block-1779">

      @foreach ($asesor->proyectos as $proyecto)
        <div class="div-block-1782">
          <a href="/proyecto/{{$proyecto->slug}}">
            <div class="div-block-1780">
              <div class="div-block-1781"
              {{-- Consulto si el proyecto tiene imagenes --}}
              @if (tieneImagenes($proyecto))
                @foreach (imagenesProyecto($proyecto) as $imagen)
                  style="background-image: url('/storage/{{$imagen['path']}}'); background-position: center; background-repeat: no-repeat;"
                @endforeach
              @else
                {{-- Si no tiene archivos de imagen muestro una predeterminada --}}
                style="background-image: url('/storage/archivos/img/proyectoimagendefault.jpg'); background-repeat: no-repeat; background-position: center;"
              @endif
             ></div>
              <h1 class="heading-33">{{$proyecto->titulo}}</h1>
              <div class="div-block-1771">
                <div class="text-block-319">15%</div>
                <div class="text-block-320">De rentabilidad aprox.</div>
              </div>
                <progress class="uk-progress progress-green" value="{{$proyecto->porcentaje}}" max="100" style="border:2px solid #333; text-align: left;"></progress>
            </div>
          </a>
        </div>
      @endforeach

    </div>
  </div>
  <div class="div-block-1793">
    <a href="/" class="button-37 w-button">volver a mi billetera</a>
  </div>
  <div class="w-embed">
    <style>
      .h4-asesores {
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
  <!-- UIkit JS -->
  <script src="/js/uikit.js" type="text/javascript"></script>
</body>
</html>
