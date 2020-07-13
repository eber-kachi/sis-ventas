<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Exception;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * @param array $data
     * @param bool $has_Password
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $has_Password = true)
    {
        $is_required = $has_Password ? 'required' : 'nullable';
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'ci' => ['required', 'numeric', 'min:7'],
            'phone' => ['required', 'numeric', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [$is_required, 'string', 'min:8', 'confirmed'],
            'google_id' => ['nullable']
        ], [
            'password.confirmed' => 'Las contraseñas no coinciden.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    public function registerData(Request $request)
    {
        $request['password'] = null;
        $this->validator($request->all(), false)->validate();

        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        $google_id = isset($data['google_id']) ? $data['google_id'] : null;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'google_id' => $google_id,
            'ci' => $data['ci'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
