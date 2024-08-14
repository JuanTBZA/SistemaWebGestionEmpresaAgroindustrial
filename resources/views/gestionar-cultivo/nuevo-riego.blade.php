<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danper - Registrar Labores</title>
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
                <a href="{{ route('gestionarCultivos')}}" class="block py-2 px-4 text-sm lg:text-base bg-gray-900 hover:bg-gray-700">Gestionar cultivos</a>
                
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 flex flex-col overflow-x-hidden overflow-y-auto p-6">

            <!-- Menú jerárquico -->
            <nav class="text-sm mb-4">
                <span class="text-gray-500">Dashboard > </span>
                <span class="text-gray-700">Gestionar Cultivos > </span>
                <span class="text-gray-700">Programar Riegos > </span>
                <span class="text-gray-700">Nuevo Riego</span>
            </nav>
                

            <h1 class="text-2xl lg:text-3xl font-semibold mb-6">Nuevo Riego</h1>


            <div class="flex-1 flex flex-col lg:flex-row mb-6">
        
                <!-- Formulario de registro de labores -->
                <form action="{{ route('grabarRiego')}}" method="POST" class="max-w-md mb-6 lg:mr-6">
                @csrf
                 
                    <!-- ID del Cultivo -->
                    <div class="mb-6">
                        <label for="idCultivo" class="block text-sm font-medium text-gray-700">ID Cultivo</label>
                        <input type="hidden" name="IDCultivo" id="idCultivo" value="{{ $idCultivo }}">
                        <input type="text" class="mt-1 p-2 w-full border-gray-300 border rounded-md" value="{{ $idCultivo }}" disabled>
                    </div>

                    <!-- Fecha de Inicio -->
                    <div class="mb-4">
                        <label for="FechaRiego" class="block text-sm font-medium text-gray-700">Fecha de Riego</label>
                        <input type="date" name="FechaRiego" id="FechaRiego" class="mt-1 p-2 w-full border-gray-300 border rounded-md" required>
                    </div>

                    <!-- Stock del Recurso -->
                    <div class="mb-4">
                        <label for="Duracion" class="block text-sm font-medium text-gray-700">Duracion (minutos)</label>
                        <input type="number" name="Duracion" id="Duracion" class="mt-1 p-2 w-full border-gray-300 border rounded-md" step="1" required>
                    </div>

                    <!-- Stock del Recurso -->
                    <div class="mb-4">
                        <label for="CantidadAguaUtilizada" class="block text-sm font-medium text-gray-700">Cantidad agua utilizada (galones)</label>
                        <input type="number" name="CantidadAguaUtilizada" id="CantidadAguaUtilizada" class="mt-1 p-2 w-full border-gray-300 border rounded-md" step="0.5" required>
                    </div>

                    <!-- Botón de enviar -->
                    <div class="mb-4">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-400 transition-colors duration-300">Registrar Riego</button>
                    </div>
                </form>

              
            </div>


             
        </div>
    </div>

</body>

</html>
