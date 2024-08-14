<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-gray-500 via-white-500 to-gray-500 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-3xl font-semibold text-center mb-6 text-gray-800">Iniciar Sesión</h1>
        
        <form method = "POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-purple-500" placeholder="tucorreo@example.com" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-purple-500" placeholder="********" required>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-gray-500 via-white-500 to-gray-500 text-white p-3 rounded hover:bg-gradient-to-r hover:from-gray-500 hover:via-white-500 hover:to-white-500 focus:outline-none focus:shadow-outline-purple">Iniciar Sesión</button>
            @if(isset($error))
                <p style="color: red; padding-top: 10px;">{{ $error }}</p>
            @endif
        </form>
    </div>

</body>
</html>
