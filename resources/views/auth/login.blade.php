<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Poliklinik</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { 
      font-family: 'Poppins', sans-serif; 
      background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%); 
      color: #1f2937; 
      display: flex; 
      justify-content: center; 
      align-items: center; 
      height: 100vh; 
    }
    .container { 
      max-width: 920px; 
      margin: 24px auto; 
      background: white; 
      border-radius: 12px; 
      overflow: hidden; 
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); 
    }
    .card { display: flex; }
    .left-panel { 
      width: 42%; 
      background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%); 
      color: white; 
      padding: 28px; 
      display: flex; 
      flex-direction: column; 
      justify-content: center; 
    }
    .left-panel h2 { 
      margin-bottom: 8px; 
      font-size: 24px; 
      font-weight: bold; 
    }
    .left-panel p { 
      margin-bottom: 16px; 
      opacity: 0.95; 
      max-width: 220px; 
      line-height: 1.6; 
    }
    .left-panel ul { margin: 0; padding-left: 18px; }
    .left-panel li { margin-bottom: 6px; }
    .right-panel { 
      flex: 1; 
      background: white; 
      padding: 40px; 
      display: flex; 
      flex-direction: column; 
      justify-content: center; 
    }
    .right-panel h3 { 
      margin-bottom: 20px; 
      color: #0f172a; 
      font-size: 20px; 
      font-weight: bold; 
    }
    .form-group { margin-bottom: 16px; }
    .form-group label { 
      display: block; 
      margin-bottom: 8px; 
      color: #374151; 
      font-size: 14px; 
      font-weight: 500; 
    }
    .form-group input { 
      width: 100%; 
      padding: 12px; 
      border-radius: 8px; 
      border: 1px solid #e5e7eb; 
      font-size: 14px; 
    }
    .form-group input:focus { 
      outline: none; 
      border-color: #2563eb; 
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.3); 
    }
    .form-actions { 
      display: flex; 
      justify-content: space-between; 
      align-items: center; 
      margin-top: 20px; 
    }
    .form-actions a { 
      color: #6b7280; 
      font-size: 14px; 
      text-decoration: none; 
    }
    .form-actions a:hover { 
      text-decoration: underline; 
    }
    .form-actions button { 
      background: #2563eb; 
      color: white; 
      padding: 12px 20px; 
      border-radius: 8px; 
      border: none; 
      font-weight: 600; 
      cursor: pointer; 
      transition: background 0.3s ease; 
    }
    .form-actions button:hover { 
      background: #1e40af; 
    }
    .error { 
      background: #fee2e2; 
      color: #b91c1c; 
      padding: 12px; 
      border-radius: 6px; 
      margin-bottom: 16px; 
      font-size: 14px; 
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="left-panel">
        <h2>Selamat Datang</h2>
        <p>Masuk untuk mengelola jadwal, pemeriksaan, dan data pasien sesuai peran Anda.</p>
        <ul>
          <li>Akses cepat dashboard</li>
          <li>Kelola data pasien & obat</li>
          <li>Notifikasi & jadwal</li>
        </ul>
      </div>

      <div class="right-panel">
        <h3>Masuk ke Akun Anda</h3>
        @if($errors->any())
          <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="/login">
          @csrf
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="you@example.com" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••••" required>
          </div>
          <div class="form-actions">
            <a href="/register">Belum punya akun?</a>
            <button type="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
