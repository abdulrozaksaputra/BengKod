@extends('layouts.app')

@section('content')
<div style="max-width:640px;margin:20px auto;">
  <div style="background:#ffffff;padding:20px;border-radius:8px;box-shadow:0 6px 18px rgba(16,24,40,0.06);">
    <h2 style="margin-top:0">Register</h2>
    <form method="POST" action="/register">
      @csrf
      <div style="margin-bottom:8px;"><input name="nama" placeholder="Nama" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      <div style="margin-bottom:8px;"><input name="alamat" placeholder="Alamat" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      <div style="margin-bottom:8px;"><input name="no_ktp" placeholder="No KTP" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      <div style="margin-bottom:8px;"><input name="no_hp" placeholder="No HP" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      <div style="margin-bottom:8px;"><input type="email" name="email" placeholder="Email" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      <div style="margin-bottom:8px;"><input type="password" name="password" placeholder="Password" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      <div style="margin-bottom:8px;"><input type="password" name="password_confirmation" placeholder="Confirm Password" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      <div><button type="submit" style="background:#10b981;color:#fff;padding:10px 16px;border-radius:8px;border:none;font-weight:600">Register</button></div>
    </form>
    <p style="margin-top:12px;font-size:13px;">Sudah punya akun? <a href="/login">Login</a></p>
  </div>
</div>
@endsection
