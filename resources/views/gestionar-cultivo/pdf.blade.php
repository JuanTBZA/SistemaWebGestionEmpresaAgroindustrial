<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Cultivo</title>
    <style>
        /* Estilos CSS para el PDF */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>

    <h1>Informe de Cultivo</h1>

    <!-- Información del Cultivo -->
    <h2>Información del Cultivo</h2>
    <p>ID del Cultivo: {{ $cultivo->IDCultivo }}</p>
    <p>Nombre del Cultivo: {{ $cultivo->NombreCultivo }}</p>
    <p>Fecha de Plantación: {{ $cultivo->FechaPlantacion }}</p>

    <!-- Tareas de Gestión del Cultivo -->
    <h2>Tareas de Gestión del Cultivo</h2>
    @if(count($tareas) > 0)
        <table>
            <!-- Encabezados de la tabla -->
            <tr>
                <th>ID Tarea</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Descripción</th>
            </tr>
            <!-- Filas de la tabla -->
            @foreach ($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->IDTarea }}</td>
                    <td>{{ $tarea->FechaInicio }}</td>
                    <td>{{ $tarea->FechaFin }}</td>
                    <td>{{ $tarea->Descripcion }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No hay tareas de gestión registradas para este cultivo.</p>
    @endif

    <!-- Recursos Asignados al Cultivo -->
    <h2>Recursos Asignados al Cultivo</h2>
    @if(count($recursosUsados) > 0)
        <table>
            <!-- Encabezados de la tabla -->
            <tr>
                <th>ID Recurso Asignado</th>
                <th>ID Recurso</th>
              
                <th>Cantidad Utilizada</th>
            </tr>
            <!-- Filas de la tabla -->
            @foreach ($recursosUsados as $recurso)
                <tr>
                    <td>{{ $recurso->IDRecursoAsignado }}</td>
                    <td>{{ $recurso->IDRecurso }}</td>
                    
                   
                    <td>{{ $recurso->CantidadUtilizada }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No hay recursos asignados para este cultivo.</p>
    @endif

    <!-- Plagas Registradas en el Cultivo -->
    <h2>Plagas Registradas en el Cultivo</h2>
    @if(count($plagasRegistradas) > 0)
        <table>
            <!-- Encabezados de la tabla -->
            <tr>
                <th>ID Plaga</th>
                
                <th>Fecha Detección</th>
                <th>Severidad</th>
          
            </tr>
            <!-- Filas de la tabla -->
            @foreach ($plagasRegistradas as $plaga)
                <tr>
                    <td>{{ $plaga->IDPlaga }}</td>
                   
                    <td>{{ $plaga->FechaDeteccion }}</td>
                    <td>{{ $plaga->Severidad }}</td>
                 
                </tr>
            @endforeach
        </table>
    @else
        <p>No hay plagas registradas para este cultivo.</p>
    @endif

    <!-- Riegos Realizados en el Cultivo -->
    <h2>Riegos Realizados en el Cultivo</h2>
    @if(count($riegos) > 0)
        <table>
            <!-- Encabezados de la tabla -->
            <tr>
                <th>ID Riego</th>
                <th>Fecha Riego</th>
                <th>Duración</th>
                <th>Cantidad de Agua Utilizada</th>
            </tr>
            <!-- Filas de la tabla -->
            @foreach ($riegos as $riego)
                <tr>
                    <td>{{ $riego->IDRiego }}</td>
                    <td>{{ $riego->FechaRiego }}</td>
                    <td>{{ $riego->Duracion }}</td>
                    <td>{{ $riego->CantidadAguaUtilizada }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No hay registros de riegos para este cultivo.</p>
    @endif

</body>
</html>

