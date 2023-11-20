<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerAction(Request $request)
    {
        if (empty($request->username)) {
            session()->flash('error', 'Field "Username" harus diisi.');
            return redirect('/register')->withInput();
        } elseif (empty($request->email)) {
            session()->flash('error', 'Field "Email" harus diisi.');
            return redirect('/register')->withInput();
        } elseif (empty($request->password)) {
            session()->flash('error', 'Field "Password" harus diisi.');
            return redirect('/register')->withInput();
        } elseif (empty($request->name)) {
            session()->flash('error', 'Field "Name" harus diisi.');
            return redirect('/register')->withInput();
        }

        if ($request->password == $request->confirm_password) {
            $usernameExist = User::where('username', $request->username)->first();
            $emailExist = User::where('email', $request->email)->first();
            if ($usernameExist) {
                session()->flash('error', 'Username sudah digunakan!');
                return redirect('/register');
            }
            if ($emailExist) {
                session()->flash('error', 'Email sudah digunakan!');
                return redirect('/register');
            }
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => 'user',
                'password' => Hash::make($request->password),
            ]);

            session()->flash('success', 'Akun berhasil dibuat!');
            return redirect('/register');
        } else {
            session()->flash('error', 'Konfirmasi password anda salah!');
            return redirect('/register')->withInput();
        }
    }
    public function userloginAction(Request $request) {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $username = $request->username;
        $user = User::where('username', $username)->first();

        if ($user->role === 'admin') {
            session()->flash('error', 'Anda adalah admin, coba gunakan halaman Login Admin.');
            return redirect('/user/login');
        }

        if (Auth::attempt($data)) {
            if ($user->role === 'user') {
                $userId = Auth::id();
                session(['user_id' => $userId]);
                return redirect('/');
            } else {
                session()->flash('error', 'Anda adalah admin, coba gunakan halaman Login Admin.');
                return redirect('/user/login');
            }
        } else {
            // Jika login gagal, tampilkan pesan kesalahan
            session()->flash('error', 'Username atau Password anda salah!');
            return redirect('/user/login');
        }
    }

    public function loginAction(Request $request) {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $username = $request->username;
        $user = User::where('username', $username)->first();

        if ($user->role === 'user') {
            session()->flash('error', 'Anda menggunakan akun user biasa, coba gunakan halaman Login User.');
            return redirect('/login');
        }

        if (Auth::attempt($data)) {
            if ($user->role === 'admin') {
                $userId = Auth::id();
                session(['user_id' => $userId]);
                return redirect('/admin/dashboard');
            } else {
                session()->flash('error', 'Anda menggunakan akun user biasa, coba gunakan halaman Login User.');
                return redirect('/login');
            }
        } else {
            // Jika login gagal, tampilkan pesan kesalahan
            session()->flash('error', 'Username atau Password anda salah!');
            return redirect('/login');
        }
    }


    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
