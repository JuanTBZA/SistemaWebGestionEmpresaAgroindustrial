<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danper - Registrar Recursos</title>
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
                <span class="text-gray-700">Gestionar Cultivos ></span>
                <span class="text-gray-700">Asignar Recursos ></span>
                <span class="text-gray-700">Registrar Recursos ></span>
                <span class="text-gray-700">Nuevo Recurso</span>
            </nav>


            <h1 class="text-2xl lg:text-3xl font-semibold mb-6">Nuevo Recurso</h1>
                
            <div class="flex-1 flex flex-col lg:flex-row mb-6">
        
                <!-- Formulario de registro de recursos -->
                <form action="{{ route('grabarRecurso')}}" method="POST" class="max-w-md mb-6 lg:mr-6">
                @csrf  
                 
                    <!-- ID del Recurso (puede ser autogenerado por la base de datos) -->
                    <!-- No se incluye en el formulario ya que generalmente se autogenera -->

                    <!-- Nombre del Recurso -->
                    <div class="mb-4">
                        <label for="NombreRecurso" class="block text-sm font-medium text-gray-700">Nombre del Recurso</label>
                        <input type="text" name="NombreRecurso" id="NombreRecurso" class="mt-1 p-2 w-full border-gray-300 border rounded-md" required>
                    </div>

                    <!-- Descripción del Recurso -->
                    <div class="mb-4">
                        <label for="Descripcion" class="block text-sm font-medium text-gray-700">Descripción del Recurso</label>
                        <textarea name="Descripcion" id="Descripcion" rows="4" class="mt-1 p-2 w-full border-gray-300 border rounded-md" required></textarea>
                    </div>

    

                    <!-- Botón de enviar -->
                    <div class="mb-4">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-400 transition-colors duration-300">Registrar Recurso</button>
                    </div>
                </form>

                <!-- Contenedor para el buscador y la tabla (si es necesario agregar más funcionalidades) -->
                <div class="flex-1 flex flex-col">
                   <!-- Puedes agregar más contenido aquí según tus necesidades -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>
