<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Probando</title>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- UIkit CSS -->
    <link href="/css/uikit.css" rel="stylesheet" type="text/css">
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
  <body>
    <div class="">
      <div class="d-flex justify-content-around">
        <span style="font-size: 30px;">Etapa 1</span>
        <span style="font-size: 30px;">Etapa 2</span>
        <span style="font-size: 30px;">Etapa 3</span>
        <span style="font-size: 30px;">Etapa 4</span>
      </div>
      <div class="">
        <progress class="uk-progress progress-green" value="80" max="100" style="border:2px solid;"></progress>
      </div>
    </div>

    {{-- Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
    <script src="/js/uikit.js" type="text/javascript"></script>
  </body>
</html>
