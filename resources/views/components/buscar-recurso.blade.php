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
                <a href="{{ route('gestionarCultivos')}}" class="block py-2 px-4 text-sm lg:text-base bg-gray-900 hover:bg-gray-700">Gestionar cultivos</a>
               
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 overflow-x-hidden overflow-y-auto p-6">
        
          

            <!-- Tabla de Cultivos -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Recursos Registrados</h2>

                <!-- Buscador -->
                <div class="mb-4">
                    <form action="#" method="GET" class="w-full">
                        <div class="flex items-center space-x-4">
                            <input type="text" name="search" class="w-full border-gray-300 border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" placeholder="Buscar por nombre..." value="{{ request('search') }}">
                            <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-400 transition-colors duration-300">Buscar</button>
                        </div>
                    </form>
                </div>

                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">ID Recurso</th>
                            <th class="py-2 px-4 border-b text-left">Nombre Recurso</th>
                            <th class="py-2 px-4 border-b text-left">Descripción</th>
                        
                            <th class="py-2 px-4 border-b text-left">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recursos as $recurso)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $recurso->IDRecurso }}</td>
                                <td class="py-2 px-4 border-b">{{ $recurso->NombreRecurso }}</td>
                                <td class="py-2 px-4 border-b">{{ $recurso->Descripcion }}</td>
                            
                                <td class="py-2 px-4 border-b flex items-center space-x-2">
                                    
                                    <form action="{{ route('seleccionarRecurso', ['idRecurso' => $recurso->IDRecurso, 'idCultivo' => request('idCultivo')]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="block py-2 px-4 text-sm lg:text-base bg-green-500 hover:bg-green-400 text-white rounded">
                                            <img src="{{ asset('/img/mantenedores/seleccionar.png') }}" alt="Seleccionar" class="w-6 h-6 cursor-pointer">
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>

        </div>
    </div>

</body>

</html>
