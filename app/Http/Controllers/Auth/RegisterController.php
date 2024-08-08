<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tutee;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/index';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'mobileNumber' => ['required', 'string'],
            'role' => ['required', 'in:tutee,tutor'],
            'qualification' => ['nullable', 'string'],
            'experience' => ['nullable', 'string'],
            'expertise' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric'],
            'bankaccountNumber' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'],
            'mobileNumber' => $data['mobileNumber'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        // Check role and create related model
        if ($data['role'] === 'tutee') {
            Tutee::create([
                'user_id' => $user->id,
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'mobileNumber' => $data['mobileNumber'],
                // Add Tutee-specific fields if any
            ]);
        } elseif ($data['role'] === 'tutor') {
            Tutor::create([
                'user_id' => $user->id,
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'mobileNumber' => $data['mobileNumber'],
                'qualification' => $data['qualification'],
                'experience' => $data['experience'],
                'expertise' => $data['expertise'],
                'price' => $data['price'],
                'bankaccountNumber' => $data['bankaccountNumber'],
            ]);
        }

        return $user;
    }
}
