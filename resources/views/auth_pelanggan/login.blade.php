<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login Pelanggan - Web Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(to right, #d0e9ff, #f1faff);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border border-blue-100">
        <div class="text-center mb-6">
            <div class="text-green-600 text-5xl mb-3">
                <i class="fas fa-leaf"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Login Pelanggan</h2>
            <p class="text-sm text-gray-500">Masuk untuk menikmati layanan desa</p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login_proses') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                       placeholder="contoh@email.com" required>
                @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                       class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                       placeholder="••••••••" required>
                @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2"> Ingat saya
                </label>
                <a href="#" class="text-green-600 hover:underline">Lupa password?</a>
            </div>

            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition duration-300">
                Masuk
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-600">
            {{-- Belum punya akun? <a href="{{ route('register') }}" class="text-green-600 hover:underline">Daftar sekarang</a> --}}
        </div>

        <div class="text-center mt-4 text-xs text-gray-400">
            © 2025 Web Desa Harmoni Alam
        </div>
    </div>

</body>
</html>
