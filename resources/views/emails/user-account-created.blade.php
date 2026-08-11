<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun LD Indonesia Anda</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #1f2937;">
    <div style="max-width: 600px; margin: 0 auto; padding: 24px;">
        <h2 style="color: #1e40af;">Akun LD Indonesia Anda telah dibuat</h2>
        <p>Halo {{ $name }},</p>
        <p>Akun Anda telah dibuat di LD Indonesia sebagai <strong>{{ $role }}</strong>.</p>
        <p>Gunakan kredensial berikut untuk masuk:</p>
        <div style="background: #f3f4f6; padding: 16px; border-radius: 8px; margin: 16px 0;">
            <p style="margin: 0;"><strong>Email:</strong> {{ $email }}</p>
            <p style="margin: 4px 0 0;"><strong>Password sementara:</strong> {{ $password }}</p>
        </div>
        <p>Silakan masuk melalui halaman <a href="{{ url('/masuk') }}">{{ url('/masuk') }}</a>.</p>
        <p>Setelah login, Anda dapat mengubah password Anda.</p>
    </div>
</body>
</html>
