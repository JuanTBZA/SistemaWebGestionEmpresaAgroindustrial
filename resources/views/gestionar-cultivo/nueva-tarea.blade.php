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
                <span class="text-gray-700">Programar Labores > </span>
                <span class="text-gray-700">Nueva Tarea</span>
            </nav>
                

            <h1 class="text-2xl lg:text-3xl font-semibold mb-6">Nueva Tarea</h1>


            <div class="flex-1 flex flex-col lg:flex-row mb-6">
        
                <!-- Formulario de registro de labores -->
                <form action="{{ route('grabarTarea')}}" method="POST" class="max-w-md mb-6 lg:mr-6">
                @csrf
                 
                    <!-- ID del Cultivo -->
                 
                    <div class="mb-6">
                        <label for="idCultivo" class="block text-sm font-medium text-gray-700">ID Parcela</label>
                        <input type="hidden" name="IDCultivo" id="idCultivo" value="{{ $idCultivo }}">
                        <input type="text" class="mt-1 p-2 w-full border-gray-300 border rounded-md" value="{{ $idCultivo }}" disabled>
                    </div>

                    <!-- Fecha de Inicio -->
                    <div class="mb-4">
                        <label for="FechaInicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
                        <input type="date" name="FechaInicio" id="FechaInicio" class="mt-1 p-2 w-full border-gray-300 border rounded-md" required>
                    </div>

                    <!-- Fecha de Fin -->
                    <div class="mb-4">
                        <label for="FechaFin" class="block text-sm font-medium text-gray-700">Fecha de Fin</label>
                        <input type="date" name="FechaFin" id="FechaFin" class="mt-1 p-2 w-full border-gray-300 border rounded-md" required>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label for="Descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea name="Descripcion" id="Descripcion" rows="4" class="mt-1 p-2 w-full border-gray-300 border rounded-md" required></textarea>
                    </div>

                    <!-- Completada -->
                    <div class="mb-6">
                    
                        <label for="Completada" class="inline-flex items-center">
                            <input type="checkbox" name="Completada" id="Completada" value="1" class="h-4 w-4 text-indigo-600" required>
                            <span class="ml-2 text-gray-700">Completada</span>
                        </label>
                    </div>

                    




                    <!-- Botón de enviar -->
                    <div class="mb-4">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-400 transition-colors duration-300">Registrar Tarea</button>
                    </div>
                </form>

              
            </div>


             
        </div>
    </div>

</body>

</html>
