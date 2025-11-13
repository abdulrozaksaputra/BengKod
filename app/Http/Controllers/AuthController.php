<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'dokter') {
                return redirect()->route('dokter.dashboard');
            } else {
                return redirect()->route('pasien.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Email atau Password Salah!']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:pasien,admin,dokter'],
            'email' => ['required_if:role,admin,dokter', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required_if:role,admin,dokter', 'confirmed'],
            'nik' => ['required_if:role,pasien', 'string', 'max:30'],
            'no_hp' => ['required_if:role,pasien', 'string', 'max:20'],
            'umur' => ['required_if:role,pasien', 'integer'],
        ]);


        $data = [
            'nama' => $request->nama,
            'role' => $request->role,
            'email' => $request->email,
            'password' => $request->role !== 'pasien' ? Hash::make($request->password) : null,
            'no_hp' => $request->role === 'pasien' ? $request->no_hp : null,
            'nik' => $request->role === 'pasien' ? $request->nik : null,
            'umur' => $request->role === 'pasien' ? $request->umur : null,
        ];

        User::create($data);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
