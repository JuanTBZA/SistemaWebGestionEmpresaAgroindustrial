<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danper - Agregar Parcela</title>
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
                <span class="text-gray-700">Registrar Cultivos > </span>
                <span class="text-gray-700">Registrar Parcela > </span>
                <span class="text-gray-700">Nueva Parcela</span>
            </nav>

            <h1 class="text-2xl lg:text-3xl font-semibold mb-6">Nueva Parcela</h1>

            <div class="flex-1 flex flex-col lg:flex-row mb-6">

                <!-- Formulario de agregar parcela -->
                <form action="{{ route('grabarParcela')}}" method="POST" class="max-w-md mb-6 lg:mr-6">
                @csrf  
                <!-- Nombre de la parcela -->
                    <div class="mb-4">
                        <label for="nombreParcela" class="block text-sm font-medium text-gray-700">Nombre de la Parcela</label>
                        <input type="text" name="NombreParcela" id="" class="mt-1 p-2 w-full border-gray-300 border rounded-md" required>
                    </div>

                    <!-- Ubicación de la parcela -->
                    <div class="mb-4">
                        <label for="ubicacionParcela" class="block text-sm font-medium text-gray-700">Ubicación de la Parcela</label>
                        <input type="text" name="Ubicacion" id="" class="mt-1 p-2 w-full border-gray-300 border rounded-md" required>
                    </div>

                    <!-- Tamaño de la parcela -->
                    <div class="mb-4">
                        <label for="tamanoParcela" class="block text-sm font-medium text-gray-700">Tamaño de la Parcela (m²)</label>
                        <input type="number" name="Tamano" id="" class="mt-1 p-2 w-full border-gray-300 border rounded-md" required>
                    </div>

                    <!-- Botón de enviar -->
                    <div class="mb-4">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-400 transition-colors duration-300">Agregar Parcela</button>
                    </div>
                </form>

                <!-- Contenedor para el buscador y la tabla de parcelas -->
                <!-- Puedes reutilizar el código de la tabla de parcelas desde la página de registro de cultivos -->

            </div>
        </div>
    </div>

</body>

</html>
