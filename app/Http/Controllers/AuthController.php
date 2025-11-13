<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException; // Tambahkan ini

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
            // ✅ PERBAIKAN: Regenerasi Session untuk keamanan (Session Fixation)
            $request->session()->regenerate();
            
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('status', 'Selamat datang kembali, Admin!');
            } elseif ($user->role == 'dokter') {
                return redirect()->route('dokter.dashboard')->with('status', 'Selamat datang, Dokter!');
            } else {
                return redirect()->route('pasien.dashboard')->with('status', 'Selamat datang!');
            }
        }
        
        // Menggunakan ValidationException agar error ditangani dengan baik oleh Laravel
        throw ValidationException::withMessages([
            'email' => ['Email atau password yang Anda masukkan salah!'],
        ]);
        
        // Alternatif jika Anda tetap ingin menggunakan return back():
        // return back()->withErrors(['email' => 'Email atau Password Salah!']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Pastikan Anda sudah menambahkan use Illuminate\Validation\ValidationException di bagian atas
        
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:pasien,admin,dokter'],
            // Validasi email dan password hanya jika bukan role pasien
            'email' => ['required_if:role,admin,dokter', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required_if:role,admin,dokter', 'confirmed'],
            // Validasi khusus pasien
            'nik' => ['required_if:role,pasien', 'string', 'max:30', 'unique:users,nik'], // Tambah unique NIK
            'no_hp' => ['required_if:role,pasien', 'string', 'max:20'],
            'umur' => ['required_if:role,pasien', 'integer'],
        ]);


        $data = [
            'nama' => $request->nama,
            'role' => $request->role,
            // Jika role pasien, email mungkin null, sesuaikan dengan database
            'email' => $request->role !== 'pasien' ? $request->email : null,
            // Password hanya di-hash jika bukan pasien (asumsi pasien login pakai NIK/HP)
            'password' => $request->role !== 'pasien' && $request->password ? Hash::make($request->password) : null,
            'no_hp' => $request->role === 'pasien' ? $request->no_hp : null,
            'nik' => $request->role === 'pasien' ? $request->nik : null,
            'umur' => $request->role === 'pasien' ? $request->umur : null,
        ];
        
        // Pastikan field di model User sudah diisi di $fillable
        User::create($data);

        // ✅ BARIS KUNCI: Redirect ke halaman login dengan notifikasi sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout()
    {
        Auth::logout();
        
        // ✅ Regenerasi session setelah logout dan menginvalidasi token CSRF (keamanan)
        request()->session()->invalidate();
        request()->session()->regenerateToken(); 
        
        return redirect()->route('login');
    }
}