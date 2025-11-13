<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:0;padding:0;background:#f3f4f6}
    .nav{background:#111827;color:#fff;padding:12px}
    .nav a{color:#fff;margin-right:14px;text-decoration:none}
    .container{max-width:1000px;margin:24px auto;background:#fff;padding:20px;min-height:60vh}
    .btn{display:inline-block;padding:8px 14px;background:#2563eb;color:#fff;border-radius:6px;text-decoration:none}
    .btn-ghost{background:transparent;border:1px solid #ccc;color:#111}
  </style>
</head>
<body>
  <div class="nav">
    <div style="max-width:1000px;margin:0 auto;display:flex;align-items:center;justify-content:space-between">
      <div>
        <a href="/">Home</a>
      </div>
      <div>
        @auth
            @php $role = Auth::user()->role ?? '' @endphp
            @if($role === 'admin')
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            @elseif($role === 'dokter')
                <a href="{{ route('dokter.dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('pasien.dashboard') }}">Dashboard</a>
            @endif
            <form method="POST" action="{{ url('/logout') }}" style="display:inline">@csrf <button type="submit" class="btn-ghost" style="margin-left:10px;padding:6px 10px;border-radius:6px;background:transparent;color:#fff;border:1px solid rgba(255,255,255,0.15)">Logout</button></form>
        @endauth
        @guest
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endguest
      </div>
    </div>
  </div>

  <div class="container">
    @yield('content')
  </div>

  <footer style="text-align:center;padding:16px;color:#666">
    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
  </footer>
</body>
</html>
