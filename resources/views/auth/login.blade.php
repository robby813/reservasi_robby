<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f4f7fc;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md">
        <div class="text-center mb-6">
            <div class="text-blue-600 text-5xl mb-4">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h2 class="text-3xl font-semibold text-gray-800">Admin Login</h2>
            <p class="text-gray-600 mt-1">Akses dashboard dan kelola konten</p>
        </div>

        <form action="{{ route('authenticate') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="admin@example.com" class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2"> Ingat saya
                </label>
                <a href="#" class="text-blue-600 hover:underline">Lupa password?</a>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-300">
                Masuk
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-500">
            © 2025 Admin Sedang Sibuk.
        </div>
    </div>

</body>
</html>
