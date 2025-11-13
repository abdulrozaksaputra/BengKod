@extends('layouts.app')

@section('content')
<div style="max-width:640px;margin:20px auto;">
  <div style="background:#ffffff;padding:20px;border-radius:8px;box-shadow:0 6px 18px rgba(16,24,40,0.06);">
    <h2 style="margin-top:0">Register</h2>
    <form method="POST" action="/register">
      @csrf
      <div style="margin-bottom:8px;">
        <label for="role">Pilih Role</label>
        <select id="role" name="role" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;">
          <option value="">-- Pilih Role --</option>
          <option value="pasien">Pasien</option>
          <option value="admin">Admin</option>
          <option value="dokter">Dokter</option>
        </select>
      </div>

      <div id="common-fields">
        <div style="margin-bottom:8px;"><input name="nama" placeholder="Nama" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      </div>

      <div id="pasien-fields" style="display:none;">
        <div style="margin-bottom:8px;"><input name="nama" placeholder="Nama" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
        <div style="margin-bottom:8px;"><input name="nik" placeholder="NIK" style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
        <div style="margin-bottom:8px;"><input name="no_hp" placeholder="No HP" style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
        <div style="margin-bottom:8px;"><input name="umur" placeholder="Umur" style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      </div>

      <div id="admin-fields" style="display:none;">
        <div style="margin-bottom:8px;"><input name="nama" placeholder="Nama" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
        <div style="margin-bottom:8px;"><input type="email" name="email" placeholder="Email" style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
        <div style="margin-bottom:8px;"><input type="password" name="password" placeholder="Password" style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      </div>

      <div id="dokter-fields" style="display:none;">
        <div style="margin-bottom:8px;"><input name="nama" placeholder="Nama" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
        <div style="margin-bottom:8px;"><input type="email" name="email" placeholder="Email" style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
        <div style="margin-bottom:8px;"><input type="password" name="password" placeholder="Password" style="width:100%;padding:10px;border-radius:6px;border:1px solid #e5e7eb;"></div>
      </div>

      <div><button type="submit" style="background:#10b981;color:#fff;padding:10px 16px;border-radius:8px;border:none;font-weight:600">Register</button></div>
    </form>
    <p style="margin-top:12px;font-size:13px;">Sudah punya akun? <a href="/login">Login</a></p>
  </div>
</div>

<script>
  document.getElementById('role').addEventListener('change', function() {
    const role = this.value;
    document.getElementById('pasien-fields').style.display = role === 'pasien' ? 'block' : 'none';
    document.getElementById('admin-fields').style.display = role === 'admin' ? 'block' : 'none';
    document.getElementById('dokter-fields').style.display = role === 'dokter' ? 'block' : 'none';
  });
</script>
@endsection
