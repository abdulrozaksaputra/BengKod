@extends('layouts.app')

@section('content')
<div style="max-width:920px;margin:24px auto;display:flex;gap:20px;align-items:stretch">
  <div style="flex:1;display:flex;border-radius:12px;overflow:hidden;box-shadow:0 8px 30px rgba(2,6,23,0.08)">
    <div style="width:42%;background:linear-gradient(135deg,#2563eb 0%,#7c3aed 100%);color:#fff;padding:28px;display:flex;flex-direction:column;justify-content:center;align-items:flex-start">
      <h2 style="margin:0 0 8px;font-size:22px">Selamat Datang</h2>
      <p style="margin:0 0 16px;opacity:0.95;max-width:220px">Masuk untuk mengelola jadwal, pemeriksaan, dan data pasien sesuai peran Anda.</p>
      <ul style="margin:0;padding-left:18px;">
        <li style="margin-bottom:6px">Akses cepat dashboard</li>
        <li style="margin-bottom:6px">Kelola data pasien & obat</li>
        <li>Notifikasi & jadwal</li>
      </ul>
    </div>

    <div style="flex:1;background:#fff;padding:26px 28px;">
      <h3 style="margin-top:0;margin-bottom:12px;color:#0f172a">Masuk ke Akun Anda</h3>
      @if($errors->any())
        <div style="background:#fee2e2;color:#b91c1c;padding:10px;border-radius:6px;margin-bottom:12px">{{ $errors->first() }}</div>
      @endif
      <form method="POST" action="/login">
        @csrf
        <div style="margin-bottom:12px">
          <label style="display:block;margin-bottom:6px;color:#374151;font-size:13px">Email</label>
          <input type="email" name="email" placeholder="you@example.com" required style="width:100%;padding:10px;border-radius:8px;border:1px solid #e6e9ef;">
        </div>
        <div style="margin-bottom:14px">
          <label style="display:block;margin-bottom:6px;color:#374151;font-size:13px">Password</label>
          <input type="password" name="password" placeholder="••••••••" required style="width:100%;padding:10px;border-radius:8px;border:1px solid #e6e9ef;">
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center">
          <div>
            <a href="/register" style="color:#6b7280;font-size:13px">Belum punya akun?</a>
          </div>
          <div>
            <button type="submit" style="background:#2563eb;color:#fff;padding:10px 16px;border-radius:8px;border:none;font-weight:600">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
