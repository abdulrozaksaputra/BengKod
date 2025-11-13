<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    {{-- Anda bisa menautkan CSS framework di sini, misalnya Bootstrap/Tailwind --}}
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Halaman Login</h2>

        {{-- 🔔 Notifikasi Sukses Setelah Registrasi --}}
        @if (session('success'))
            <div class="alert alert-success">
                **Berhasil!** {{ session('success') }}
            </div>
        @endif

        {{-- ❌ Notifikasi Error Login --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        ---

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>

            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>

        </form>
    </div>
</body>
</html>