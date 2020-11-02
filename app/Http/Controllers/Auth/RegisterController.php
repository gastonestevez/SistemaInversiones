<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Billetera;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'password' => 'min:6|confirmed', // o bien 'new__password_confirmation' => ['same:new_password'],
          'name' =>'alpha|string|min:2|max:40|',
          'email' => 'string|email|max:255|unique:users',
          "avatar" => 'image|mimes:png,jpg,jpeg|max:2048|nullable',
        ],
        [
          "required" => "Completar campos obligatorios",
          "alpha" => "El campo nombre debe ser un texto",
          "name.min" => "El nombre debe tener un minimo de :min caracteres",
          "password.min" => "La clave debe tener un minimo de :min caracteres",
          "max" => "El nombre debe tener un maximo de :max caracteres",
          "confirmed" => "Las contraseñas no coinciden"
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


      // // Si adjuntan un avatar
      if (isset($data['avatar'])) {

        $file = $data['avatar']->store('public'); // Esta ruta guarda al archivo con la ruta entera.
        $path = basename($file); // basename recorta la ruta y nos deja solo el nombre del archivo.
      } else {
        $path = null; // le asigna la nueva ruta a la base de datos
      }



        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'password' => Hash::make($data['password']),
            'avatar' => $path,
            'is_admin' => false
        ],
      );

    }

    // Para crear un objeto billetera luego de crear un usuario tuvimos que sobreescribir esta funcion https://stackoverflow.com/questions/53214074/laravel-action-after-registration-of-user
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

          $billetera = New Billetera();
          $billetera->total = 0;
          $billetera->invertido = 0;
          $billetera->rentabilidad = 0;

          $billetera->save();


        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

}
