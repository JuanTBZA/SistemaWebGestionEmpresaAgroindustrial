<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danper - Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                
                <form method="POST" action="/logout">
                    @csrf
                    <a href="#" onclick="this.closest('form').submit()" class="block py-2 px-4 text-sm lg:text-base bg-red-900 hover:bg-red-700">Cerrar Sesión</a>
                </form>
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 overflow-x-hidden overflow-y-auto p-6">
            <!-- Menú jerárquico -->
            <nav class="text-sm mb-4">
                <span class="text-gray-500">Dashboard > </span>
                <span class="text-gray-700">Gestionar Cultivos</span>
            </nav>
            
            <h1 class="text-2xl lg:text-3xl font-semibold mb-6">Gestionar Cultivos</h1>

            <!-- Opciones de Gestionar Cultivos en una línea con imágenes al comienzo -->
            <div class="flex mt-4 space-x-4 mb-6">
                <a href="{{ route('registrarCultivo')}}" class="flex flex-col items-center py-4 px-4 text-sm lg:text-base bg-green-500 hover:bg-green-400 text-white rounded">
                    <img src="{{asset('/img/gestionar-cultivo/cultivo.png')}}" alt="Imagen 1" class="w-10 h-10 mb-2" />
                    Registrar Cultivo
                </a>
                <a href="{{ route('programarLabores')}}" class="flex flex-col items-center py-4 px-4 text-sm lg:text-base bg-blue-500 hover:bg-blue-400 text-white rounded">
                    <img src="{{asset('/img/gestionar-cultivo/tarea.png')}}" alt="Imagen 1" class="w-10 h-10 mb-2" />
                    Programar Labores
                </a>
                <a href="{{ route('asignarRecursos')}}" class="flex flex-col items-center py-4 px-4 text-sm lg:text-base bg-yellow-500 hover:bg-yellow-400 text-white rounded">
                    <img src="{{asset('/img/gestionar-cultivo/recursos.png')}}" alt="Imagen 2" class="w-10 h-10 mb-2" />
                    Asignar Recursos
                </a>
                <a href="{{ route('programarRiego')}}" class="flex flex-col items-center py-4 px-4 text-sm lg:text-base bg-purple-500 hover:bg-purple-400 text-white rounded">
                    <img src="{{asset('/img/gestionar-cultivo/riego.png')}}" alt="Imagen 3" class="w-10 h-10 mb-2" />
                    Programar Riegos
                </a>
                <a href="{{ route('controlarPlagas')}}" class="flex flex-col items-center py-4 px-4 text-sm lg:text-base bg-gray-500 hover:bg-gray-400 text-white rounded">
                    <img src="{{asset('/img/gestionar-cultivo/plagacontrolada.png')}}" alt="Imagen 3" class="w-10 h-10 mb-2" />
                    Controlar Plagas
                </a>
                <a href="{{ route('registrarCosecha')}}" class="flex flex-col items-center py-4 px-4 text-sm lg:text-base bg-pink-500 hover:bg-pink-400 text-white rounded">
                    <img src="{{asset('/img/gestionar-cultivo/cosechar.png')}}" alt="Imagen 3" class="w-10 h-10 mb-2" />
                    Cosechar Cultivos
                </a>
                <a href="{{ route('buscarCultivo', ['redirect' => 'generarPDF']) }}" class="flex flex-col items-center py-4 px-4 text-sm lg:text-base bg-red-500 hover:bg-red-400 text-white rounded">
                    <img src="{{asset('/img/gestionar-cultivo/reporte.png')}}" alt="Imagen 3" class="w-10 h-10 mb-2" />
                    Generar Informe
                </a>
            </div>

            <!-- Tarjetas de estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-bold">Cultivos Registrados</h2>
                    <p class="text-3xl mt-2">120</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-bold">Labores Programadas</h2>
                    <p class="text-3xl mt-2">85</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-bold">Recursos Asignados</h2>
                    <p class="text-3xl mt-2">200</p>
                </div>
            </div>

            <!-- Gráficos -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-bold mb-4">Producción Mensual</h2>
                    <canvas id="monthlyProductionChart"></canvas>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-bold mb-4">Distribución de Recursos</h2>
                    <canvas id="resourceDistributionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Gráfico de Producción Mensual
        var ctx1 = document.getElementById('monthlyProductionChart').getContext('2d');
        var monthlyProductionChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
                datasets: [{
                    label: 'Producción',
                    data: [30, 50, 40, 60, 70, 80, 90],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de Distribución de Recursos
        var ctx2 = document.getElementById('resourceDistributionChart').getContext('2d');
        var resourceDistributionChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Semillas', 'Fertilizantes', 'Pesticidas', 'Herramientas'],
                datasets: [{
                    data: [300, 50, 100, 200],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

</body>

</html>
