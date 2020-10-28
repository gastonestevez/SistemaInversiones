<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Oct 19 2020 20:11:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f887778f7aee372dab82f42" data-wf-site="5f43d6794f715d3ebe1c4707">
  <head>
    <meta charset="utf-8">
    <title>Editar Proyecto</title>
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
    <script src="/js/uikit.js" charset="utf-8"></script>
    <link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="/images/webclip.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="/css/uikit.css">
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

        <form id="editproyecto-form" name="editproyecto-form" class="form-5" action="/editproyecto/{{$proyecto->slug}}" method="post" enctype="multipart/form-data">
          @method('put')
          @csrf
          <input type="hidden" name="id" value="{{$proyecto->id}}">
          <div>
            <label for="titulo" class="field-label-29">Título *</label>
            <input type="text" value="{{ old('titulo', $proyecto->titulo) }}" class="text-field-15 w-input" maxlength="256" name="titulo" data-name="Name" placeholder="" id="titulo" required autofocus>
          </div>
          <div>
            <label for="fecha" class="field-label-30">Fecha de entrega</label>
            <input type="text" value="{{ old('fecha', $proyecto->fecha) }}" class="text-field-15 w-input" name="fecha" data-name="Fecha De Entrega" placeholder="" id="fecha">
          </div>
          <div>
            <label for="imagen_360" class="field-label-30">Imagen 360º (Embed)</label>
            <input type="text" value="{{ old('imagen_360', $proyecto->imagen_360) }}"name="imagen_360"did="imagen_360" class="text-field-15 w-input">
          </div>
          <div>
            <label for="link_web" class="field-label-30">Link sitio web</label>
            <input type="text" value="{{ old('link_web', $proyecto->link_web) }}" name="link_web" id="link_web" class="text-field-15 w-input">
          </div>
          <div>
            <label for="estados" class="field-label-30">Estados (separados por coma) *</label>
            <input type="text" value="{{ old('estados', $proyecto->estados) }}" name="estados" id="estados" class="text-field-15 w-input" required>
          </div>
          <div>
            <label for="porcentaje" class="field-label-30">Porcentaje *</label>
            <input type="number" value="{{ old('porcentaje', $proyecto->porcentaje) }}" class="text-field-15 w-input" max="100" name="porcentaje" data-name="porcentaje" placeholder="" id="porcentaje" required>
          </div>
          <div>
            <label for="localidad_id" class="field-label-17">Localidad</label>
            <select id="localidad_id" name="localidad_id" class="w-select">
              <option value="">Seleccione una...</option>
              @foreach ($localidades as $localidad)
                <option value="{{$localidad->id}}" {{($localidad->id == $proyecto->localidad_id)?'selected': '' }}>{{$localidad->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label for="asesor_id" class="field-label-17">Asignar un Asesor *</label>
            <select id="asesor_id" name="asesor_id" class="w-select" required>
              <option value="">Seleccione un asesor...</option>
              @foreach ($asesores as $asesor)
                <option value="{{$asesor->id}}" {{($asesor->id == $proyecto->asesor->id)?'selected': '' }}>{{$asesor->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label style="text-align:center;" for="destacado" class="field-label-30">Destacar</label>
            <input value="{{$proyecto->destacado}}" @if($proyecto->destacado) checked @endif type="checkbox" class="text-field-15 w-input" name="destacado" data-name="porcentaje" id="destacado" @if(old('destacado') == 1) checked='checked'@endif>
          </div>

          <br><br>

          <label style="text-align:center;" for="referente" class="field-label-30">Referentes</label>

          <div class="uk-overflow-auto">
            <table class="uk-table uk-table-small uk-table-divider">
              <thead>
                <tr id="labels" >
                  <th class="field-label-30">Nombre Completo</th>
                  <th class="field-label-30">Tipo de Referente</th>
                  <th class="field-label-30">Cargar Foto</th>
                </tr>
              </thead>

              <tbody id="table_unidad_body">

                @foreach ($referentes as $referente)


                <tr>
                  <th>
                    <input value="{{$referente->nombre}}" type="text" maxlength="256" data-name="" name="referente[{{$loop->index}}][nombre_referente]" id="nombre_referente" class="text-field-15 w-input nombre_referente">
                  </th>
                  <th>
                    <select id="tipo_de_referente" name="referente[{{$loop->index}}][tipo_de_referente]" class="w-select tipo_de_referente">
                      <option value="0">Seleccione un tipo</option>
                      @foreach ($tipo_de_referentes as $tipo_de_referente)
                        <option value="{{$tipo_de_referente->id}}" {{($tipo_de_referente->id == $referente->tipo_de_referente_id)?'selected': '' }}>{{$tipo_de_referente->tipo}}</option>
                      @endforeach
                    </select>
                  </th>
                  <th>
                  
                    <img src="/storage/{{$referente->foto}}" style="max-width: 50px; max-height: 50px" alt="">
                    <input id="foto_referente" type="file" name="referente[{{$loop->index}}][foto_referente]" data-wait="Please wait..." class="submit-button-15 w-button" style="transform: scale(0.60);">
                  
                  </th>
                  <th>
                    <button id="deleteRef" onclick="onDeleteRef(this)" style="margin: 0px 0px 11px;" hidden name="referente[{{$loop->index}}][deleteRef]">X</button>
                  </th>
                </tr>
                  <input type="hidden" name="referente[{{$loop->index}}][id]" value="{{$referente->id}}">
                  @endforeach

              </tbody>
            </table>

            <br>

            <div style="width:50%;"id="w-node-3a3f3b505af0-dab82f42" class="div-block-1808">
              <button id="agregar_referente" class="submit-button-14 w-button">Agregar Referente</button>
            </div>
          </div>

          <br> <br>

          <div id="w-node-3a3f3b505af0-dab82f42" class="div-block-1808">
            <button style="display:none;" id="editproyecto" type="submit" onclick="handleSubmit(event)" data-wait="Please wait..." class="submit-button-14 w-button">Editar Proyecto</button>
          </div>

          <div id="imagenes" class="div-block-404">
            <label for="imagenes" class="field-label-32">Cargar Imágenes</label>
            <div class="div-block-1806">
              <input id="imagenes" type="file" name="imagenes[]" data-wait="Please wait..." class="submit-button-15 w-button" multiple>
            </div>
          </div>
          <div id="logos" class="div-block-404">
            <label for="logos" class="field-label-32">Cargar Logos</label>
            <div class="div-block-1806">
              <input id="logos" type="file" name="logos[]" data-wait="Please wait..." class="submit-button-15 w-button" multiple>
            </div>
          </div>
          <div id="documentos" class="div-block-404">
            <label for="documentos" class="field-label-32">Cargar Documentos</label>
            <div class="div-block-1806">
              <input id="documentos" type="file" name="documentos[]" data-wait="Please wait..." class="submit-button-15 w-button" multiple>
            </div>
          </div>

        </form>


        @if(tieneImagenes($proyecto))
          <label style="text-align: center;" for="documentos" class="field-label-32">Imágenes</label>
        @endif
        {{-- Busco las imagenes del proyecto --}}
        @foreach (imagenesProyecto($proyecto) as $imagen)
          <div class="div-block-1767">
            {{-- Si el proyecto tiene foto --}}
              <img src="/storage/{{$imagen['path']}}" alt="" style="max-width: 300px; max-height: 150px;">
              {{-- Borrar la foto --}}
              <form action="/archivos/deleteimage/{{$imagen['id']}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="link-32" value="x" style="cursor:pointer; border:none; color: black;">
              </form>
          </div>
        @endforeach

        @if(tieneLogos($proyecto))
        <label style="text-align: center;" for="documentos" class="field-label-32">Logos</label>
        @endif
        {{-- Busco los logos del proyecto --}}
        @foreach(logosProyecto($proyecto) as $logo)
          <div class="div-block-1767">
            {{-- Si el proyecto tiene foto --}}
              <img src="/storage/{{$logo['path']}}" alt="" style="max-width: 300px; max-height: 150px;">
              {{-- Borrar el logo --}}
              <form action="/archivos/deletelogo/{{$logo['id']}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="link-32" value="x" style="cursor:pointer; border:none; color: black;">
              </form>
          </div>
        @endforeach

        @if(tieneDocumentos($proyecto))
          <label style="textalign: center;r" for="documentos" class="field-label-32">Documentos</label>
        @endif
        {{-- Busco los documentos del proyecto --}}
        @foreach(documentosProyecto($proyecto) as $documento)
          <div class="div-block-1767">
            {{-- Si el proyecto tiene documentos --}}
              <a href="/storage/{{$documento['path']}}" alt="" style="text-decoration: underline; max-width: 300px; max-height: 150px;" target="_blank">{{$documento['nombre_archivo']}}</a>
              {{-- Borrar el documento --}}
              <form action="/archivos/deletedocumento/{{$documento['id']}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="link-32" value="x" style="cursor:pointer; border:none; color: black;">
              </form>
          </div>
        @endforeach

        <br><br>

        <label for="editproyecto" class="submit-button-17 w-button" style="text-align:center; font-weight: 500;">Editar Proyecto</label>

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

    <div id="mockReferent" style="display: none;">
      <tr>
        <th>
          <input type="text" maxlength="256" data-name="" name="referente[0][nombre_referente]" id="nombre_referente" class="text-field-15 w-input nombre_referente">
        </th>
        <th>
          <select id="tipo_de_referente" name="referente[0][tipo_de_referente]" class="w-select tipo_de_referente">
            <option value="">Seleccione un tipo</option>
            @foreach ($tipo_de_referentes as $tipo_de_referente)
              <option value="{{$tipo_de_referente->id}}">{{$tipo_de_referente->tipo}}</option>
            @endforeach
          </select>
        </th>
        <th>
          <input id="foto_referente" type="file" name="referente[0][foto_referente]" data-wait="Please wait..." class="submit-button-15 w-button" style="transform: scale(0.60);">
        </th>
        <th>
          <button id="deleteRef" onclick="onDeleteRef(this)" style="margin: 0px 0px 11px;" hidden name="referente[0][deleteRef]">X</button>
        </th>
      </tr>
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

    <script type="text/javascript">
    const agregarReferenteBoton = document.getElementById('agregar_referente');
    const tableUnidadBody = document.getElementById('table_unidad_body');
    const labels = document.getElementById('labels');

    const handleSubmit = (e) => {
      const nombreReferentes = Array.from(document.querySelectorAll('th > input.nombre_referente'));
      const tipoReferentes = Array.from(document.querySelectorAll('th > select.tipo_de_referente'));
      const hayCampoVacio =  !!(nombreReferentes.find( ({ value }) => !value) || tipoReferentes.find( ({ value }) => !value))
      if(hayCampoVacio){
        e.preventDefault();
        const userResponse = confirm('Todos los referentes deben tener nombre y tipo obligatorio, caso contrario no se guardarán. ¿Desea continuar?')
        if(userResponse){
          document.getElementById('editproyecto-form').submit()
        }
      }



    }
    const setupTag = (htmlTag, label) => {
      const type = {
        ['deleteRef']: () => {htmlTag.removeAttribute('hidden')},
        ['nombre_referente']: () => {htmlTag.value = null},
        ['foto_referente']: () => {htmlTag.value = null},
        ['tipo_de_referente']: () => {htmlTag.value = null}
      }
      type[label] && type[label]();
    }

    const onDeleteRef = (event) => {
      event.parentNode.parentNode.parentNode.removeChild(event.parentNode.parentNode);
    }

    agregarReferenteBoton.onclick = (event) => {
      event.preventDefault();
      const labels = ['nombre_referente','tipo_de_referente','foto_referente','deleteRef'];
      const tableTr = document.createElement('tr');
      const tableLength = tableUnidadBody.children.length;
      labels.forEach( (label) => {
        const tableTh = document.createElement('th');
        const htmlTag = document.getElementById(label).cloneNode(true);
        htmlTag.setAttribute('name',`referente[${tableLength}][${label}]`);
        setupTag(htmlTag, label)
        tableTh.appendChild(htmlTag);
        tableTr.appendChild(tableTh);
      });
      tableUnidadBody.appendChild(tableTr);
    }

    </script>
  </body>
</html>
