<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - Poliklinik</title>
    <style>
        body {
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat datang di Aplikasi Poliklinik</h1>
        <p>Silakan <a href="/login">Login</a> atau <a href="/register">Register</a> untuk melanjutkan.</p>
        <p>Jika Anda adalah admin/dokter/pasien, gunakan akun contoh yang sudah disediakan oleh seeder.</p>
    </div>
</body>
</html>
