<?php

namespace App\Http\Controllers;

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



use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ConsultasController extends BaseController
{

    public function welcome()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function gestionarCultivos()
    {
        return view('gestionar-cultivo.index');
    }

    public function registrarCultivo()
    {
        $search = request('search');
        $cultivos = Cultivo::where('NombreCultivo', 'LIKE', "%$search%")
            ->orWhere('FechaPlantacion', 'LIKE', "%$search%")
            ->get();
    
        return view('gestionar-cultivo.registrar-cultivo', compact('cultivos'));
    }

    public function nuevaParcela()
    {
        return view('gestionar-cultivo.nueva-parcela');
    }

    public function modificarParcela()
    {
        return view('gestionar-cultivo.modificar-parcela');
    }

    public function registrarParcela()
    {
        $search = request('search');
        $parcelas = Parcela::where('NombreParcela', 'LIKE', "%$search%")
            ->orWhere('Ubicacion', 'LIKE', "%$search%")
            ->get();

        return view('gestionar-cultivo.registrar-parcela', compact('parcelas'));
    }

    public function programarLabores()
    {

   
        $search = request('search');
        $tareasGestionCultivo = TareaGestionCultivo::where('Descripcion', 'LIKE', "%$search%")
            ->orWhere('FechaInicio', 'LIKE', "%$search%")
            ->get();
    
        return view('gestionar-cultivo.programar-labores', compact('tareasGestionCultivo'));
    
    }

    public function asignarRecursos()
    {
        $search = request('search');
        $recursosAsignadosCultivos = RecursoAsignadoCultivo::where('IDCultivo', 'LIKE', "%$search%")
            ->orWhere('IDRecurso', 'LIKE', "%$search%")
            ->get();

        return view('gestionar-cultivo.asignar-recursos', compact('recursosAsignadosCultivos'));
    }

    public function nuevoCultivo()
    {
        return view('gestionar-cultivo.nuevo-cultivo');
    }

    public function nuevaTarea()
    {
        return view('gestionar-cultivo.nueva-tarea');
    }

    public function registrarRecurso()
    {
        
        $search = request('search');
        $recursos = Recurso::where('NombreRecurso', 'LIKE', "%$search%")
            ->orWhere('Descripcion', 'LIKE', "%$search%")
            ->get();

        return view('gestionar-cultivo.registrar-recurso', compact('recursos'));

    }

    public function nuevoRecurso()
    {
        return view('gestionar-cultivo.nuevo-recurso');
    }

    public function nuevoAsignarRecurso()
    {
        return view('gestionar-cultivo.nuevo-asignar-recurso');
    }

    public function programarRiego()
    {

        $search = request('search');
        $riegos = Riego::where('IDCultivo', 'LIKE', "%$search%")
            ->orWhere('FechaRiego', 'LIKE', "%$search%")
            ->get();
    
        return view('gestionar-cultivo.programar-riego', compact('riegos'));

    }
    public function controlarPlagas()
    {
        $search = request('search');
        $registrosPlagas = RegistroPlaga::where('IDCultivo', 'LIKE', "%$search%")
            ->orWhere('FechaDeteccion', 'LIKE', "%$search%")
            ->get();
    
        return view('gestionar-cultivo.controlar-plagas', compact('registrosPlagas'));
    }
    public function registrarPlaga()
    {
        $search = request('search');
        $plagas = Plaga::where('NombrePlaga', 'LIKE', "%$search%")
        ->orWhere('Descripcion', 'LIKE', "%$search%")
        ->get();

        return view('gestionar-cultivo.registrar-plaga', compact('plagas'));
 
    }

    public function registrarCosecha()
    {
        $search = request('search');
        $cosechas = Cosecha::where('IDCultivo', 'LIKE', "%$search%")
            ->orWhere('FechaCosecha', 'LIKE', "%$search%")
            ->orWhere('CantidadCosechada', 'LIKE', "%$search%")
            ->get();
    
        return view('gestionar-cultivo.registrar-cosecha', compact('cosechas'));
    }
    


    public function nuevaPlaga()
    {
        return view('gestionar-cultivo.nueva-plaga');
    }
    public function nuevoControlPlagas()
    {
        return view('gestionar-cultivo.nuevo-control-plagas');
    }

    public function nuevoRiego()
    {
        return view('gestionar-cultivo.nuevo-riego');
    }

}
