<?php

namespace App\Http\Controllers\Auth;


use App\Mail\ResetP;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ResetPController extends Controller
{
    public function resetPage() {
        return view('auth.reset');
    }

    public function resetChange(Request $request) {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $email = $request->email;

        $user = User::where('email', $email)->first();

        $name = $user->name;

        if(!$user->email) {
            return redirect()->to('/resetPage')->with(['Warning' => 'Email Belum Terdaftar Silahkan Lakukan Registrasi']);
        }else{
            Mail::to($email)->send(new ResetP($user));
            return redirect()->to('/resetPage')->with(['Success' => 'Silahkan Cek Email Anda Untuk Melakukan Reset Password']);
        }
    }

    public function resetPasswordPage($email) {
        $data = User::where('email', $email)->first();
        return view ('auth.changePassword', compact('data'));
    }

    public function changePassword(Request $request, $data) {
        // $cekEmail = DB::table('users')->where('email', $data)->get();

        $messages = [
            'password' => [
                'required' => 'Password harus diisi',
                'confirmed' => 'Konfirmasi Password harus sama dengan password'
            ],
        ];

        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);

        $simpan = DB::table('users')->where('email', $data)->update([
            'password' => Hash::make($request['password']),
        ]);

        if($simpan) {
            return redirect()->route('login')->with(['Success' => 'Password Berhasil Diubah. Silahkan coba untuk login']);
        }
    }
}
