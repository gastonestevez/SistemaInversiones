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
  </head>
  <body>

    <h1>Perfil</h1>
    <span>Hola {{$user->name}}</span>

    <div class="container">

      @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
      @endif

      <form class="w-50" action="/perfil/{{$user->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input value="{{$user->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input value="{{$user->last_name}}" name="last_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input value="{{$user->email}}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Number</label>
          <input value="{{$user->number}}" name="number" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Actual Password</label>
          <input type="password" name="current_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nueva Password</label>
          <input type="password" name="new_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Confirmar Nueva Password</label>
          <input type="password" name="new_password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="avatar" class="field-label-17">Avatar (jpg hasta 2mb)</label>
          <input type="file" name="avatar" maxlength="256" data-name="" id="avatar" class="text-field-15 w-input">
        </div>
        <img width="150px" src="/storage/{{$user->avatar}}" alt="">
        <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>

    {{-- Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- UIkit JS -->
    <script src="/js/uikit.js" type="text/javascript"></script>
  </body>
</html>
