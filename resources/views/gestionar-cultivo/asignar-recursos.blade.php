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
            <!-- Menú jerárquico -->
            <nav class="text-sm mb-4">
                <span class="text-gray-500">Dashboard > </span>
                <span class="text-gray-700">Gestionar Cultivos ></span>
                <span class="text-gray-700">Asignar Recursos</span>
            </nav>
            
            <h1 class="text-2xl lg:text-3xl font-semibold mb-6">Asignar Recursos</h1>
          

            <!-- Opciones de Gestionar Cultivos en una línea con imágenes al comienzo -->
            <div class="flex mt-4 space-x-4">
                <a href="{{ route('registrarRecurso')}}" class="flex flex-col items-center py-4 px-4 text-sm lg:text-base bg-yellow-500 hover:bg-yellow-400 text-white rounded">
                    <img src="{{asset('/img/gestionar-cultivo/semilla.png')}}" alt="Imagen 1" class="w-10 h-10 mb-2" />
                    Registrar Recurso
                </a>
                
                <a href="{{ route('buscarCultivo', ['redirect' => 'buscarRecurso']) }}" class="flex flex-col items-center py-4 px-4 text-sm lg:text-base bg-yellow-500 hover:bg-yellow-400 text-white rounded">
                    <img src="{{asset('/img/mantenedores/asignar.png')}}" alt="Imagen 2" class="w-10 h-10 mb-2" />
                    Asignar Recursos
                </a>
            
            </div>

            <!-- Tabla de Cultivos -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Recursos Asignados</h2>

                <!-- Buscador -->
                <div class="mb-4">
                    <form action="#" method="GET" class="w-full">
                        <div class="flex items-center space-x-4">
                            <input type="text" name="search" class="w-full border-gray-300 border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" placeholder="Buscar por nombre..." value="{{ request('search') }}">
                            <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-400 transition-colors duration-300">Buscar</button>
                        </div>
                    </form>
                </div>

                @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">ID Recurso Asignado</th>
                            <th class="py-2 px-4 border-b text-left">ID Cultivo</th>
                            <th class="py-2 px-4 border-b text-left">ID Recurso</th>
                            <th class="py-2 px-4 border-b text-left">Cantidad Utilizada</th>
                            <th class="py-2 px-4 border-b text-left">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recursosAsignadosCultivos as $recursosAsignado)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $recursosAsignado->IDRecursoAsignado }}</td>
                                <td class="py-2 px-4 border-b">{{ $recursosAsignado->IDCultivo }}</td>
                                <td class="py-2 px-4 border-b">{{ $recursosAsignado->IDRecurso }}</td>
                                <td class="py-2 px-4 border-b">{{ $recursosAsignado->CantidadUtilizada }}</td>
                                <td class="py-2 px-4 border-b flex items-center space-x-2">
                                <form action="{{ route('eliminarRecursoAsignado', ['id' => $recursosAsignado->IDRecursoAsignado]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-6 h-6 cursor-pointer ml-2" onclick="return confirm('¿Estás seguro de eliminar este recurso asignado?')">
                                        <img src="{{ asset('/img/mantenedores/borrar.png') }}" alt="Eliminar">
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
