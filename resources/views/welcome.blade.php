<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danper - Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex flex-col lg:flex-row min-h-screen bg-gray-200">
        <!-- Menú lateral -->
        <div class="flex-shrink-0 w-full lg:w-64 bg-gray-800 text-white">
            <div class="flex items-center justify-center mt-10">
                <span class="text-2xl font-semibold">Danper</span>
            </div>
            <nav class="mt-4 lg:mt-10">
            
                <a href="{{ route('welcome')}}" class="block py-2 px-4 text-sm lg:text-base bg-gray-900 hover:bg-gray-700">Inicio</a>
                @auth
                <a href="{{ route('dashboard')}}" class="block py-2 px-4 text-sm lg:text-base bg-gray-900 hover:bg-gray-700">Dashboard</a>
                
                <form method = "POST" action = "/logout">
                @csrf
                <a href="#" onclick = "this.closest('form').submit()" class="block py-2 px-4 text-sm lg:text-base bg-gray-900 hover:bg-gray-700">Cerrar Sesion</a>
                @else
                <a href="{{ route('login')}}" class="block py-2 px-4 text-sm lg:text-base bg-gray-900 hover:bg-gray-700">Iniciar Sesion</a>
                @endauth
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 overflow-x-hidden overflow-y-auto p-6">
            <h1 class="text-2xl lg:text-3xl font-semibold mb-6">Bienvenido a Danper</h1>
            <p class="text-sm lg:text-base">Nuestro modelo de gestión basado en la
            Creación de Valor Compartido conecta la eficiencia de nuestras inversiones y rentabilidad económica,
            con el progreso de nuestra gente y sus comunidades.</p>
        </div>
    </div>

</body>
</html>
