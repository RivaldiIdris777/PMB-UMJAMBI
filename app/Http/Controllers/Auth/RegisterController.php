<?php

namespace App\Http\Controllers\Auth;

use App\Mail\VerifyEmail;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'name' => [
                'required' => 'Nama harus terisi'
            ],
            'email' => [
                'required' => 'Email harus diisi',
                'unique' => 'Email sudah pernah digunakan'
            ],
            'password' => [
                'required' => 'Password harus diisi'
            ],
            'nik' => [
                'required' => 'NIK harus diisi',
                'unique' => 'NIK sudah pernah digunakan'
            ]
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nik' => ['required', 'numeric','min:15', 'unique:users'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nik' => $data['nik'],
        ]);
        return $user;
    }

    public function register2(Request $request)
    {
        $messages = [
            'name' => [
                'required' => 'Nama harus terisi'
            ],
            'email' => [
                'required' => 'Email harus diisi',
                'unique' => 'Email sudah pernah digunakan'
            ],
            'password' => [
                'required' => 'Password harus diisi'
            ],
            'nik' => [
                'required' => 'NIK harus diisi',
                'unique' => 'NIK sudah pernah digunakan'
            ]
        ];

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nik' => ['required', 'numeric','min:15', 'unique:users'],
        ], $messages);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'nik' => $request->nik
        ]);
        Mail::to($user->email)->send(new VerifyEmail($user));

        return view('auth.verify');
    }

    public function verifyEmail($email) {
        $verifiedUser = User::where('email', $email)->first();
        // dd($verifiedUser->name);
        if(is_null($verifiedUser->email_verified_at)) {
            $verifiedUser->email_verified_at = Carbon::now();
            $verifiedUser->save();
            return redirect()->route('login')->with(['Success' => 'Verifikasi Berhasil Silahkan Login Untuk Masuk Halaman']);
        }else {
            redirect(route('login'));
        }

    }
}
