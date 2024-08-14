<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Proveedor;

use App\Models\Parcela;
use App\Models\Cultivo;
use App\Models\Plaga;
use App\Models\RegistroPlaga;
use App\Models\Cosecha;
use App\Models\Riego;
use App\Models\TareaControlPlaga;
use App\Models\TareaGestionCultivo;
use App\Models\TareaGestionCosecha;
use App\Models\Recurso;
use App\Models\RecursoAsignadoCultivo;
use App\Models\RecursoAsignadoCosecha;
use App\Models\Config;



use PDF;
use DB;

class ComponentesController extends BaseController
{

    //-----------------------CULTIVO-PARCELA--------------------------------------
    public function nuevoCultivo($idParcela)
    {
        return view('gestionar-cultivo.nuevo-cultivo', ['idParcela' => $idParcela]);
    }


    public function seleccionarParcela($idParcela)
    {
        return redirect()->route('nuevoCultivo', ['idParcela' => $idParcela]);
    }


    public function buscarParcela()
    {

        $search = request('search');
        $parcelas = Parcela::where('NombreParcela', 'LIKE', "%$search%")
            ->orWhere('Ubicacion', 'LIKE', "%$search%")
            ->get();

        return view('components.buscar-parcela', compact('parcelas'));

    }

    //-----------------------CULTIVO-TAREA--------------------------------------
    

    public function seleccionarCultivo($idCultivo)
    {
        $redirect = request('redirect', 'welcome');

        switch ($redirect) {
            case 'nuevaTarea':
                return redirect()->route('nuevaTarea', ['idCultivo' => $idCultivo]);

                case 'nuevoRiego':
                    return redirect()->route('nuevoRiego', ['idCultivo' => $idCultivo]);

                    case 'nuevaCosecha':  //acaaaaaaaa
                        $config = Config::find(1); // Obtener el config con id 1

                       return redirect()->route('nuevaCosecha', ['idCultivo' => $idCultivo]);
                       

                    case 'buscarRecurso':
                        return redirect()->route('buscarRecurso', ['idCultivo' => $idCultivo]);

                        case 'buscarPlaga':
                            return redirect()->route('buscarPlaga', ['idCultivo' => $idCultivo]);

                            case 'generarPDF':

                                // Obtener información del cultivo
                                    $cultivo = DB::table('Cultivos')
                                    ->where('IDCultivo', $idCultivo)
                                    ->first();

                                // Obtener tareas de gestión del cultivo
                                $tareas = DB::table('TareasGestionCultivos')
                                    ->where('IDCultivo', $idCultivo)
                                    ->get();

                                // Obtener recursos asignados al cultivo
                                $recursosUsados = DB::table('RecursosAsignadosCultivos')
                                    ->where('IDCultivo', $idCultivo)
                                    ->get();

                                // Obtener plagas registradas en el cultivo
                                $plagasRegistradas = DB::table('RegistroPlagas')
                                    ->where('IDCultivo', $idCultivo)
                                    ->get();

                                // Obtener riegos realizados en el cultivo
                                $riegos = DB::table('Riegos')
                                    ->where('IDCultivo', $idCultivo)
                                    ->get();

                                $pdf = PDF::loadView('gestionar-cultivo.pdf', compact('cultivo', 'tareas', 'recursosUsados', 'plagasRegistradas', 'riegos'));
                                return $pdf->download('informe_cultivo.pdf');

                                

                                /////////////////////
                        
                   
        
            default:
                return redirect()->route('welcome');
        }
    }

  

    public function buscarCultivo()
    {
        $search = request('search');
        $cultivos = Cultivo::where('NombreCultivo', 'LIKE', "%$search%")
            ->orWhere('FechaPlantacion', 'LIKE', "%$search%")
            ->get();
    
        return view('components.buscar-cultivo', compact('cultivos'));
    }


    public function nuevaTarea($idCultivo)
    {
        return view('gestionar-cultivo.nueva-tarea', ['idCultivo' => $idCultivo]);
    }


    public function nuevoRiego($idCultivo)
    {
        return view('gestionar-cultivo.nuevo-riego', ['idCultivo' => $idCultivo]);
    }

    public function nuevaCosecha($idCultivo)
    {
        return view('gestionar-cultivo.nueva-cosecha', ['idCultivo' => $idCultivo]);
    }


    //--------SELECCION DOBLE

    public function buscarRecurso()
    {
        $search = request('search');
        $recursos = Recurso::where('NombreRecurso', 'LIKE', "%$search%")
            ->orWhere('Descripcion', 'LIKE', "%$search%")
            ->get();

        return view('components.buscar-recurso', compact('recursos'));
    }

    public function seleccionarRecurso($idCultivo, $idRecurso)
    {
        return redirect()->route('nuevaAsignacionRecurso', ['idRecurso' => $idRecurso, 'idCultivo' => $idCultivo]);
    }

    public function nuevaAsignacionRecurso($idCultivo, $idRecurso)
    {
        return view('gestionar-cultivo.nuevo-asignar-recurso', ['idRecurso' => $idRecurso, 'idCultivo' => $idCultivo]);
    }



    
    //--------SELECCION DOBLE

    public function buscarPlaga()
    {
        $search = request('search');
        $plagas = Plaga::where('NombrePlaga', 'LIKE', "%$search%")
        ->orWhere('Descripcion', 'LIKE', "%$search%")
        ->get();

        return view('components.buscar-plaga', compact('plagas'));
    }

    public function seleccionarPlaga($idCultivo, $idPlaga)
    {
        return redirect()->route('nuevoControlPlaga', ['idPlaga' => $idPlaga, 'idCultivo' => $idCultivo]);
    }

    public function nuevoControlPlaga($idCultivo, $idPlaga)
    {
        return view('gestionar-cultivo.nuevo-control-plagas', ['idPlaga' => $idPlaga, 'idCultivo' => $idCultivo]);
    }

   

}
