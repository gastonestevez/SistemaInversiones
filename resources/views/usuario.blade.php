<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Thu Oct 15 2020 20:37:14 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f43d67a5b9a601566a11659" data-wf-site="5f43d6794f715d3ebe1c4707">
  <head>
    <meta charset="utf-8">
    <title>Usuario | {{$user->name}}</title>
    <meta content="preview" property="og:title">
    <meta content="preview" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="/css/webflow.css" rel="stylesheet" type="text/css">
    <link href="/css/undefineds-stunning-project-1f65bd.webflow.css" rel="stylesheet" type="text/css">
    <link href="/css/uikit.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
    <style>body,button,input,select,textarea{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;-webkit-text-size-adjust:100%;-moz-text-size-adjust:100%;-ms-text-size-adjust:100%;text-size-adjust:100%}body{overflow-x:hidden}.demo-btn,.browser-demo{-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0)}</style>
    <style>
      .gumroad-loading-indicator i {
        background: url(https://uploads-ssl.webflow.com/5ef66c40c73a1f23b6a72987/5ef6bed92a2bee63b0334828_webdev-for-you-loading.svg) !important;
      }
      .slide-horizontal {
        cursor: pointer;
      }
    </style>
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
    <style media="screen">
    .carga-de-proyectos {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      min-height: 90vh;
      padding: 0;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      -webkit-box-pack: start;
      -webkit-justify-content: flex-start;
      -ms-flex-pack: start;
      justify-content: flex-start;
      -webkit-box-align: center;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
    }
    </style>
  </head>

  <body class="body">
    <div class="page-wrapper">

      <!-- Incluye card destacados y etiqueta de usuario -->
      <div class="top-nav">

        <!-- Card destacados -->
        <div class="container-2 s">
          <div class="column-wrap">
            <div data-delay="4000" data-animation="cross" data-autoplay="1" data-duration="500" data-infinite="1" class="slider-horizontal arriba w-slider">
              <div class="mask-horizontal w-slider-mask">

                @foreach ($proyectosDestacados as $destacado)
                  <div class="slide-horizontal w-slide" onclick="handleSlideClick('{{$destacado->slug}}')">
                    <div class="testimonial-card">
                      <div class="testimonial-image-wrap">
                        {{-- No esta encontrando el archivo .svg --}}
                        {{-- <img src="https://uploads-ssl.webflow.com/5f45521257977e5aca6ac805/5f4552122f1ef144be71252b_angle.svg" alt="" class="horizontal-angle"> --}}
                        @if(tieneImagenes($destacado))
                          <img src="/storage/{{imagenesProyecto($destacado)[0]['path']}}" alt="Testimonial Image" sizes="(max-width: 479px) 437.20001220703125px, (max-width: 767px) 91vw, (max-width: 991px) 38vw, (max-width: 1919px) 39vw, 40vw" srcset="/storage/{{imagenesProyecto($destacado)[0]['path']}} 500w, /storage/{{imagenesProyecto($destacado)[0]['path']}} 1080w, /storage/{{imagenesProyecto($destacado)[0]['path']}} 1600w, /storage/{{imagenesProyecto($destacado)[0]['path']}}" class="testimonial-image">
                        @else
                          <img src="/storage/archivos/img/proyectoimagendefault.jpg" alt="Testimonial Image" sizes="(max-width: 479px) 437.20001220703125px, (max-width: 767px) 91vw, (max-width: 991px) 38vw, (max-width: 1919px) 39vw, 40vw" srcset="/storage/archivos/img/proyectoimagendefault.jpg 500w, /storage/archivos/img/proyectoimagendefault.jpg 1080w, /storage/archivos/img/proyectoimagendefault.jpg 1600w, /storage/archivos/img/proyectoimagendefault.jpg" class="testimonial-image">
                        @endif
                        <a href="#" class="play-button w-inline-block w-lightbox">
                          <img src="https://uploads-ssl.webflow.com/5f45521257977e5aca6ac805/5f4552122f1ef15892712517_play-button%20(1).svg" alt="" class="play-icon">
                          <script type="application/json" class="w-json">{
                            "items": [
                              {
                                "type": "video",
                                "originalUrl": "https://vimeo.com/130820761",
                                "url": "https://vimeo.com/130820761",
                                "html": "<iframe class=\"embedly-embed\" src=\"//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fplayer.vimeo.com%2Fvideo%2F130820761%3Fapp_id%3D122963&dntp=1&url=https%3A%2F%2Fvimeo.com%2F130820761&image=https%3A%2F%2Fi.vimeocdn.com%2Fvideo%2F522826368_1280.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=vimeo\" width=\"940\" height=\"529\" scrolling=\"no\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen=\"true\"></iframe>",
                                "thumbnailUrl": "https://i.vimeocdn.com/video/522826368_1280.jpg",
                                "width": 940,
                                "height": 529
                              }
                            ]
                            }
                          </script>
                        </a>
                      </div>
                      <div class="horizontal-content-block" style="align-items: center;">
                        <div class="horizontal-fixed-height">
                          <img src="https://uploads-ssl.webflow.com/5f45521257977e5aca6ac805/5f4552122f1ef1bacf71251d_4.svg" alt="" class="horizontal-logo">
                          <h4 class="horizontal-quote-h4">{{$destacado->titulo}}</h4>
                          <h4 class="text-block-83">{{$destacado->localidad ? $destacado->localidad->nombre : ''}}</h4>
                          <h4 class="text-block-83">{{$destacado->fecha}}</h4>
                        </div>

                        <!-- Autor div -->
                        <div class="author-block" style="margin-right: auto;">
                          @if ($destacado->asesor->foto)
                            <img src="/storage/{{$destacado->asesor->foto}}" alt="" class="author-image">
                          @else
                            <img src="/storage/archivos/img/avatarpredeterminado.svg" alt="" class="author-image">
                          @endif
                          <div>
                            <h4 class="author-name">{{$destacado->asesor->nombre}}</h4>
                            <div class="author-job">
                              <a href="https://api.whatsapp.com/send?phone={{$destacado->asesor->numero}}" target="_blank" style="color: rgba(21, 28, 52, 0.5);">Contactame</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>

              <!-- Flechas comando -->
              <div class="left-arrow w-slider-arrow-left">
                <div class="w-icon-slider-left"></div>
              </div>
              <div class="right-arrow w-slider-arrow-right">
                <div class="w-icon-slider-right"></div>
              </div>
              <div class="slide-nav w-slider-nav w-slider-nav-invert w-round"></div>
            </div>
          </div>
        </div>

        <!-- Etiqueta de Usuario (cambiar por un Iniciar Sesion cuando no este logueado) -->
        <div data-hover="1" data-delay="100" class="dropdown w-dropdown">
          <div class="navigation-item profile-nav w-dropdown-toggle">
            @if (Auth::user())
              @if (Auth::user()->avatar)
                <img src="/storage/{{Auth::user()->avatar}}" alt="" class="profile-pic">
              @else
                <img src="/storage/archivos/img/avatarpredeterminado.svg" alt="" class="profile-pic" style="background-color: white;">
              @endif
              <div class="text-block-303">Hola {{Auth::user()->name}}!</div>
            @else
              <div class="text-block-303"><a href="/login" style="color: white;">Ingresar </a> | <a href="/register" style="color: white;"> Registrarse</a></div>
            @endif
          </div>


          <!-- Navbar usuario logueado -->
          @if (Auth::user())
            <nav class="nav-dropdown-list w-dropdown-list">
              <div class="webflow-diamond"></div>
              <div class="nav-drop-list-padding">
                <a href="/perfil/{{Auth::user()->id}}" class="navigation-item dropdown-nav-item w-inline-block">
                  <div class="navigation-icon"></div>
                  <div>Perfil</div>
                </a>
                {{-- <a href="#" class="navigation-item dropdown-nav-item w-inline-block">
                  <div class="navigation-icon"></div>
                  <div>Soporte</div>
                </a> --}}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button class="navigation-item logout-link w-inline-block"><div class="navigation-icon"></div>Salir</button>
                  </form>
                  {{-- <div>Log out</div> --}}
                </a>
              </div>
            </nav>
          @endif
        </div>
        @if (Auth::user())
          <h3 class="heading sola">Bienvenido a tu billetera {{(Auth::user()->name)}}</h3>
        @endif
      </div>

      <!-- Mitad de la pagina -->
      <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">

          <!-- Menu de las tabs -->
        <div class="navigation-menu w-tab-menu">
            <a href="/" class="navigation-item">
              <div class="navigation-icon"><i class="far fa-arrow-alt-circle-left"></i></div>
              <div class="text-block-138">Atrás</div>
            </a>
            <a data-w-tab="Overview" class="navigation-item w-inline-block w-tab-link @if(isAdmin()) w--current @endif">
              <div class="navigation-icon"><i class="fas fa-dollar-sign"></i></div>
              <div class="text-block-138">Billetera de {{$user->name}}</div>
            </a>
          <a data-w-tab="Assets" class="navigation-item w-inline-block w-tab-link">
            <div class="navigation-icon"></div>
              <div class="text-block-134">Proyectos de {{$user->name}}</div>
          </a>
          <a href="/perfil/{{$user->id}}" class="navigation-item">
            <div class="navigation-icon"><i class="fas fa-user"></i></div>
            <div class="text-block-138">Perfil</div>
          </a>
          <a data-w-tab="acreditar-dinero" class="navigation-item w-inline-block w-tab-link">
            <div class="navigation-icon"><i class="fas fa-file-invoice-dollar"></i></div>
              <div class="text-block-134">Acreditar dinero</div>
          </a>
          <a data-w-tab="invertir" class="navigation-item w-inline-block w-tab-link">
            <div class="navigation-icon"><i class="fas fa-hand-holding-usd"></i></div>
            <div class="text-block-138">Invertir</div>
          </a>
        </div>

        <!-- Espacio donde va el contenido de las tabs -->
        <div class="dash-tab-wrapper w-tab-content" style="padding-bottom:0;">

          <!-- Billetera -->
          <div data-w-tab="Overview" class="dashboard-section w-tab-pane w--tab-active">
            <div class="container">

              {{-- Editar billetera --}}
              <div class="div-block-1796">
                <a href="/billetera/{{$user->id}}" data-w-id="3cf435c6-4f9c-827e-7d89-365c786d1f5a" class="button-39 w-button">Editar Billetera</a>
              </div>

                <h3 class="heading-6">Billetera y estadísticas de <span>{{$user->name}}</span></h3>

              <div class="dash-row">
                <div class="white-box third">
                  <div class="box-padding">
                    <div class="colorful-icon green"></div>
                    <h3 class="large-number">$<span>{{precio($user->billetera->total)}}</span></h3>
                    <div class="text-block-316">Dinero en billetera</div>
                  </div>
                </div>
                <div class="white-box third">
                  <div class="box-padding">
                    <div class="colorful-icon green"></div>
                    <h3 class="large-number">$<span ms-data="spend">{{precio($user->billetera->invertido)}}</span></h3>
                    <div class="text-block-318">Dinero invertido</div>
                  </div>
                </div>
                <div class="white-box third">
                  <div class="box-padding _3">
                    <div class="colorful-icon green"></div>
                    <h3 class="large-number _2">$<span ms-data="spend" class="text-span-2">{{$user->billetera->rentabilidad}}%</span></h3>
                    <div class="text-block-145">Rentabilidad esperada</div>
                  </div>
                </div>
                <div class="white-box third mobile-full-box">
                  <div class="box-padding">
                    <div class="colorful-icon purple"></div>
                    <h3 class="large-number" style="text-transform: capitalize;">{{fecha($user->created_at)}}</h3>
                    <div class="text-block-317">Fecha de inicio</div>
                  </div>
                </div>
                <div class="white-box two-third">
                  <div class="box-padding">
                    <div class="w-embed w-script">
                      <canvas id="lineChart"></canvas>
                      <script>
                      var ctx = document.getElementById('lineChart').getContext('2d');
                      var chart = new Chart(ctx, {
                          // The type of chart we want to create
                          type: 'line',
                          // The data for our dataset
                          data: {
                              labels: ['January - 1', 'February', 'March', 'April', 'May', 'June', 'July'],
                              datasets: [{
                                  label: 'Random Chart',
                                  backgroundColor: 'rgb(255, 99, 132, 0.5)',
                                  borderColor: 'rgb(255, 99, 132, 0.5)',
                                  data: [0, 10, 5, 2, 20, 10, 50]
                              }, {
                                  label: 'Super Chart',
                                  backgroundColor: 'rgb(255, 127, 80, 0.5)',
                                  borderColor: 'rgb(255, 127, 80, 0.5)',
                                  data: [0, 23, 6, 38, 20, 50, 10]
                              }]
                          },
                          // Configuration options go here
                          options: {}
                      });
                      </script>
                    </div>
                  </div>
                </div>

                <div style="width: 100%; text-align: center;">
                  {{-- Si tiene proyectos asociados significa que invirtio --}}
                  @if (count($user->proyectos))
                    <h3 class="heading-6">Inversiones Realizadas</h3>
                  @endif
                </div>

                @foreach ($user->proyectos as $proyecto)
                  <div class="white-box third" style="position:relative;">
                    <div class="box-padding">
                      <div class="colorful-icon green"></div>
                      <h3 class="large-number">$<span ms-data="spend">{{precio($proyecto->inversiones->invertido)}}</span></h3>
                      <div class="text-block-318">{{$proyecto->titulo}}</div>
                      <div class="text-block-318">{{fecha($proyecto->inversiones->created_at)}}</div>
                      <form action="/deleteinversion/{{$proyecto->id}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="user" value="{{$user->id}}">
                        <button style="position:absolute; top: 2%; right: 6%; background-color: white;" type="submit" name="button">X</button>
                      </form>
                    </div>
                  </div>
                @endforeach




              </div>
            </div>
          </div>

          <!-- Proyectos -->
          <div data-w-tab="Assets" class="dashboard-section w-tab-pane">
            <div class="container">

              <div class="dash-row masonry">

                @forelse ($proyectos as $proyecto)
                  @php
                  $contador = 1
                  @endphp
                  <div class="div-block-1768">
                    <div class="div-block-345 proyect-card-header fondo-blanco">
                      <div id="w-node-b493d5813210-66a11659" class="link-block-42" onclick="handleSlideClick('{{$proyecto->slug}}')">
                        <div class="div-block-346">
                          <div class="div-block-1802">
                            <div class="div-block-1803"
                            @if ($proyecto->asesor->foto)
                              style="background-image: url('/storage/{{$proyecto->asesor->foto}}'); background-repeat: no-repeat; background-position: center;"
                            @else
                              style="background-image: url('/storage/archivos/img/avatarpredeterminado.svg'); background-size: contain; background-repeat: no-repeat; background-position: center;"
                            @endif
                            ><div class="div-block-1771">
                              <div class="text-block-325-copy">Asesor asignado
                                @if (isset($proyecto->asesor->nombre))
                                  {{$proyecto->asesor->nombre}}
                                @endif
                              </div>
                            </div>
                            <div class="div-block-1798">
                              <a href="https://api.whatsapp.com/send?phone={{$proyecto->asesor->numero}}" target="_blank" class="button-38 w-button">Chat</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <a href="/proyecto/{{$proyecto->slug}}" class="div-block-397 w-inline-block">
                        <div class="text-block-83">{{$proyecto->fecha}}</div>
                        <h2 class="heading-5">{{$proyecto->titulo}}</h2>

                        <div class="div-block-79" style="box-shadow: -7px -7px 20px -5px rgba(0, 0, 0, 0.19)">
                          <div class="box-padding" style="display:flex; flex-direction: row; justify-content: space-around;">
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
                      </a>
                      <div class="div-block-396">
                        <div class="div-block-1797">
                          <div class="div-block-1770"

                          {{-- Consulto si el proyecto tiene imagenes --}}
                          @if (tieneImagenes($proyecto))
                            @foreach (imagenesProyecto($proyecto) as $imagen)
                              style="background-image: url('/storage/{{$imagen['path']}}'); background-repeat: no-repeat; background-position: center;"
                            @endforeach
                          @else
                            {{-- Si no tiene archivos de imagen muestro una predeterminada --}}
                            style="background-image: url('/storage/archivos/img/proyectoimagendefault.jpg'); background-repeat: no-repeat; background-position: center;"
                          @endif

                          ></div>
                        </div>
                        <div class="div-block-1796">
                        <a onclick='handleDocuments(this)' id='doc{{$proyecto->id}}' href="#" class="button-35 w-button">Documentación</a>
                        </div>
                        <div class="div-block-1805">

                          {{-- Editar Proyecto --}}
                          <a href="/editproyecto/{{$proyecto->slug}}" class="button-35 w-button">Editar</a>

                          {{-- Eliminar Proyecto --}}
                          <form id="deleteProjectForm{{$proyecto->id}}" action="/deleteproyecto/{{$proyecto->id}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="button-35 w-button" onclick="handleDeleteProject(event,{{$proyecto->id}})" type="submit">Eliminar</button>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- Al cliquear el boton Documentos en la card de cada proyecto se despliega este popup. Popup documentos -->
                  <div id='pop{{$proyecto->id}}' class="container pop-up">
                    <div class="div-block-1765">
                      <a data-w-id="8bfbcf97-6193-03e4-2120-65b63bde84d1" href="#" class="link">X</a>
                    </div>

                    <h3 class="heading-8">{{count($proyecto->archivos) ? 'Documentos' : 'Sin documentos'}}</h3>
                    <div class="dash-row">
                      @php
                        $icon = '/images/doc.svg';
                      @endphp
                      @foreach (documentosProyecto($proyecto) as $archivo)
                        @php
                          $format = 'docx';
                          if(isset($archivo)){
                            $icon = '/images/doc.svg';
                            $regexs = [
                              'pdf' => '/^.*\.(pdf)$/i',
                              'doc' => '/^.*\.(doc|docx)$/i',
                              'sheet' => '/^.*\.(xls|xlsx)$/i',
                            ];
                            foreach ($regexs as $ext => $reg) {
                              if(preg_match($reg, $archivo['path'])){
                                $icon = '/images/'.$ext.'.svg';
                              }
                            }
                          }
                          $link = $archivo['path'] ?: '#';
                          $created_at = $archivo['created_at'] ? (new DateTime($archivo['created_at']))->format('d-m-Y') : 'Sin fecha';

                        @endphp
                        <a href="/storage/{{$link}}" class="white-box-2 link-box paper-box w-inline-block">
                          <div class="box-padding paper-padding">
                            <img src="{{$icon ?: '/images/doc.svg'}}" alt="" class="doc-image">
                            <h3 class="doc-heading">{{ $archivo['nombre_archivo'] }}</h3>
                            <div class="doc-date">{{$created_at}}</div>
                          </div>
                          <img src="/images/paper.svg" alt="" class="paper">
                        </a>
                      @endforeach
                    </div>
                  </div>
                @empty
                  <p style="text-align:center;">{{$user->name}} {{$user->last_name}} no ha invertido en ningún proyecto</p>
                @endforelse
              </div>
            </div>
          </div>

          <div data-w-tab="acreditar-dinero" class="dashboard-section w-tab-pane">
            <div class="container">

              <div id="fichar-cargar-proyecto" class="carga-de-proyectos">
                <div class="div-block-405"></div>
                <div class="form-block-copy w-form">
                  <form id="acreditar-dinero" class="form-5" action="/acreditar-dinero/{{$user->id}}" method="post">
                    @method('put')
                    @csrf
                    <div>
                      <label for="monto" class="field-label-32">Monto de Acreditación</label>
                      <input type="text" maxlength="256" name="monto" id="monto" class="text-field-16 w-input" required autofocus>
                      <input type="hidden" name="name" value="{{$user->name}}">
                      <input type="hidden" name="email" value="{{$user->email}}">
                    </div>
                    <br>
                    <div id="w-node-c3e6f25a03c1-ac976307" class="div-block-1808">
                      <input type="submit" value="Acreditar" data-wait="Please wait..." class="submit-button-17 w-button">
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>

          <div data-w-tab="invertir" class="dashboard-section w-tab-pane">
            <div class="container">

              <div id="fichar-cargar-proyecto" class="carga-de-proyectos">
                <div class="div-block-405"></div>

                <div class="form-block-copy w-form">
                  {{session('error')}}
                  @if (count($todosLosProyectos))
                    <form id="invertir" class="form-5" action="/invertir/{{$user->id}}" method="post">
                      @method('put')
                      @csrf
                      <div>
                        <label for="invertido" class="field-label-32">Monto de inversión</label>
                        <small>Dinero disponible: ${{montoDisponible($user)}}</small>
                        <input type="number" max="{{$user->billetera->total}}" name="invertido" id="invertido" class="text-field-16 w-input" required autofocus>
                      </div>
                      <div>
                          <label for="proyecto_id" class="field-label-32">Proyecto</label>
                          <select id="proyecto_id" name="proyecto_id" class="w-select" required>
                            <option value="">Seleccione una opción...</option>
                            @foreach ($todosLosProyectos as $proyecto)
                              <option value="{{$proyecto->id}}">{{$proyecto->titulo}}</option>
                            @endforeach
                          </select>
                      </div>
                      <input type="hidden" name="proyecto_titulo" value="{{$proyecto->titulo}}">
                      <br>
                      <div id="w-node-c3e6f25a03c1-ac976307" class="div-block-1808">
                        <input type="submit" value="Invertir" data-wait="Please wait..." class="submit-button-17 w-button">
                      </div>
                    </form>
                  @endif

            </div>
          </div>

        </div>
      </div>

      <!-- Footer -->
      <div class="top-nav footer-nav">
        <div class="contain">
          <a href="#" class="logo-link w-nav-brand">
            <div class="text-block-140">BILLETERA DE INVERSORES</div>
          </a>
          <div class="copyright">Copyright 2020 Livv Evolution</div>
        </div>
        <div class="footer-menu">
          <a href="https://www.livv.digital/" target="_blank" class="navigation-item footer-nav-item w-inline-block">
            <div class="text-block-141">Livv</div>
          </a>
          <a href="https://www.urbban.digital/" target="_blank" class="navigation-item footer-nav-item w-inline-block">
            <img src="/images/slack-new-logo.svg" alt="" class="navigation-icon">
            <div class="text-block-142">Urbban</div>
          </a>
          <a href="https://www.urbban.digital/hub-de-innovacion" target="_blank" class="navigation-item footer-nav-item w-inline-block">
              <img src="/images/Logo.svg" alt="" class="navigation-icon memberstack-logo">
              <div class="text-block-143">Sitty</div>
            </a>
          </div>
        <div class="social-row">
          <a href="#" class="social-link w-inline-block">
            <img src="https://uploads-ssl.webflow.com/5cd9dbe554fe38a1c05e6a9b/5cda1f38c90d43d1dc53de2e_Facebook.svg" alt="">
          </a>
          <a href="#" class="social-link w-inline-block">
            <img src="https://uploads-ssl.webflow.com/5cd9dbe554fe38a1c05e6a9b/5cda1f38c6b14fc86a26b25f_Twitter.svg" alt="">
          </a>
          <a href="#" class="social-link w-inline-block">
            <img src="https://uploads-ssl.webflow.com/5cd9dbe554fe38a1c05e6a9b/5cda1f47ec31a1854e1cf128_Youtube.svg" alt="">
          </a>
          <a href="#" class="social-link w-inline-block"><img src="https://uploads-ssl.webflow.com/5cd9dbe554fe38a1c05e6a9b/5cda1fe7b775662acf936ca5_Dribbble.svg" alt="">
          </a>
          <a href="#" class="social-link w-inline-block">
            <img src="https://uploads-ssl.webflow.com/5cd9dbe554fe38a1c05e6a9b/5cda21dec6b14f2e4826b7e3_Spotify.svg" alt="">
          </a>
          <a href="#" class="social-link w-inline-block">
            <img src="https://uploads-ssl.webflow.com/5cd9dbe554fe38a1c05e6a9b/5cda1f4ac90d43b98853de4c_Behance.svg" alt="">
          </a>
        </div>
      </div>
    </div>

    <!-- Panel de usuario (se despliega al cliquear en el perfil del usuario logueado) -->
    <div class="div-block-1764">
      <div class="form-block w-form">
        <form id="email-form" name="email-form" data-name="Email Form">
          <label for="name" class="field-label-16">Nombre</label>
          <input type="text" class="text-field-13 w-input" maxlength="256" name="name" data-name="Name" placeholder="" id="name">
          <label for="email" class="field-label-17">Apellido</label>
          <input type="email" class="text-field-14 w-input" maxlength="256" name="email" data-name="Email" placeholder="" id="email" required="">
          <label for="email-2" class="field-label-17">Dinero invertido</label>
          <input type="email" class="text-field-14 w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder="" id="email-2" required="">
          <label for="email-3" class="field-label-17">Moneda</label>
          <label class="w-checkbox">
            <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" class="w-checkbox-input">
            <span class="checkbox-label w-form-label">U$D</span>
          </label>
          <label for="email-3" class="field-label-17">Email</label>
          <input type="email" class="text-field-14 w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder="" id="email-2" required="">
          <label for="email-3" class="field-label-17">Contraseña nueva</label>
          <input type="email" class="text-field-14 w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder="" id="email-2" required="">
          <label for="email-3" class="field-label-17">Foto de perfil </label>
          <div class="div-block-1772"></div>
        </form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div>
      </div>
      <a data-w-id="fd82e383-5e08-d5f8-0390-ea56e4d92787" href="#" class="text-block-304 w-inline-block">X</a>
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
    <script>
      var Webflow = Webflow || [];
      Webflow.push(function() {
      var newl= '.slider-arrow-left';
      var l = '#slider2 .w-slider-arrow-left';
      var newr= '.slider-arrow-right';
      var r = '#slider2 .w-slider-arrow-right';
      $(newl).click(function(e) {
        e.preventDefault();
        $(l).trigger('tap');
      });
      $(newr).click(function(e) {
        e.preventDefault();
        $(r).trigger('tap');
      });
      });
      </script>
      <!-- UIkit JS -->
      <script src="/js/uikit.js" type="text/javascript"></script>

    <script>
      const handleDocuments = (obj) => {
        const id = obj.id
        const popId = `pop${id.split('doc')[1]}`
        const popup = document.getElementById(popId)
        popup.style.display = 'block'
      }

      const handleSlideClick = (slug) => {
        window.location.pathname = `/proyecto/${slug}`
      }

      const handleDeleteProject = (e,id) => {
        e.preventDefault()
        const confirmDelete = confirm('¿Está seguro que quiere eliminar el proyecto?')
        if(confirmDelete){
          document.getElementById(`deleteProjectForm${id}`).submit()
        }
      }

    </script>
  </body>
</html>
