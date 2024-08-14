<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;



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
use App\Models\Proveedor;
use App\Models\Producto;


class PeticionesController extends BaseController
{

    public function login()
    {
        $credentials = request()->only('email','password');
        
        if(Auth::attempt($credentials)){
            request()->session()->regenerate();

            return redirect('dashboard');
        }
        return view('login')->with('error', 'Credenciales incorrectas. Por favor, inténtelo de nuevo.');
    }

    public function logout()
    {
       Auth::logout();   
       request()->session()->invalidate();
       request()->session()->regenerateToken();

       return redirect('/');
    }


    //------------GRABACIONES DEL SISTEMA

    public function grabarParcela(Request $datos)
   {
    $parcela= Parcela::create($datos->all());

     return redirect()->route('registrarParcela');
   }
   

   public function grabarCultivo(Request $datos)
   {
    $cultivo= Cultivo::create($datos->all());

     return redirect()->route('registrarCultivo');
   }

   public function grabarTarea(Request $datos)
   {
    $tareaGestionCultivo= TareaGestionCultivo::create($datos->all());

     return redirect()->route('programarLabores');
   }

   public function grabarRiego(Request $datos)
   {
    $riego= Riego::create($datos->all());

     return redirect()->route('programarRiego');
   }

   public function grabarRecurso(Request $datos)
   {
    $recurso= Recurso::create($datos->all());

     return redirect()->route('registrarRecurso');
   }

   public function grabarNuevaAsignacion(Request $datos)
   {
    $recursoAsignadoCultivo= RecursoAsignadoCultivo::create($datos->all());

     return redirect()->route('asignarRecursos');
   }

   public function grabarPlaga(Request $datos)
   {
    $plaga= Plaga::create($datos->all());

     return redirect()->route('registrarPlaga');
   }

   public function grabarNuevoControlPlaga(Request $datos)
   {
    $registroPlaga= RegistroPlaga::create($datos->all());

     return redirect()->route('controlarPlagas');
   }


   public function grabarCosecha(Request $request)
   {
       // Obtener la configuración con id igual a 1
       $config = Config::find(1);
   
       // Buscar un proveedor con el mismo RUC que la configuración
       $proveedor = Proveedor::where('ruc', $config->ruc)->first();
   
       // Si no se encuentra un proveedor con el mismo RUC, crear uno
       if (!$proveedor) {
           $proveedor = new Proveedor();
           $proveedor->ruc = $config->ruc;
           $proveedor->nombre = $config->nombre;
           $proveedor->telefono = $config->telefono;
           $proveedor->direccion = $config->direccion;
           $proveedor->save();
       }
   
       // Registrar la cosecha
       $cosecha = new Cosecha();
       $cosecha->IDCultivo = $request->input('IDCultivo');
       $cosecha->FechaCosecha = $request->input('FechaCosecha');
       $cosecha->CantidadCosechada = $request->input('CantidadCosechada');
       $cosecha->save();
   
       // Registrar el producto
       $producto = new Producto();
       $producto->codigo = $request->input('codigo');
       $producto->nombre = $request->input('nombre');
       $producto->proveedor = $proveedor->id; // Asignar el ID del proveedor
       $producto->stock = $request->input('CantidadCosechada');
       $producto->precio = $request->input('precio');
       $producto->save();
   
       // Puedes agregar más lógica según sea necesario
   
       return redirect()->route('registrarCosecha');
   }



   //eliminar

   
   public function eliminarParcela($id)
   {
       $parcela = Parcela::find($id);
   
       if ($parcela) {
           // Verificar si la parcela está siendo utilizada en la tabla Cultivos
           $cultivosAsociados = Cultivo::where('IDParcela', $id)->count();
   
           if ($cultivosAsociados > 0) {
               return redirect()->back()->with('error', 'No se puede eliminar la parcela porque está siendo utilizada en Cultivos.');
           }
   
           $parcela->delete();
           return redirect()->back()->with('success', 'Parcela eliminada correctamente.');
       } else {
           return redirect()->back()->with('error', 'No se pudo encontrar la parcela.');
       }
   }


   public function eliminarCultivo($id)
   {
    $cultivo = Cultivo::find($id);

    if ($cultivo) {
        // Verificar si el cultivo está siendo utilizado en otras tablas
        $plagasAsociadas = RegistroPlaga::where('IDCultivo', $id)->count();
        $cosechasAsociadas = Cosecha::where('IDCultivo', $id)->count();
        $riegosAsociados = Riego::where('IDCultivo', $id)->count();
        $tareasGestionAsociadas = TareaGestionCultivo::where('IDCultivo', $id)->count();
        $recursosAsignados = RecursoAsignadoCultivo::where('IDCultivo', $id)->count();

        if ($plagasAsociadas > 0 || $cosechasAsociadas > 0 || $riegosAsociados > 0 || $tareasGestionAsociadas > 0 || $recursosAsignados > 0) {
            return redirect()->back()->with('error', 'No se puede eliminar el cultivo porque está siendo utilizado en otras tablas.');
        }

        $cultivo->delete();
        return redirect()->back()->with('success', 'Cultivo eliminado correctamente.');
    } else {
        return redirect()->back()->with('error', 'No se pudo encontrar el cultivo.');
    }
  }

  public function eliminarRecurso($id)
  {
      $recurso = Recurso::find($id);

      if ($recurso) {
          // Verificar si el recurso está siendo utilizado en otras tablas
          $recursosAsignados = RecursoAsignadoCultivo::where('IDRecurso', $id)->count();

          if ($recursosAsignados > 0) {
              return redirect()->back()->with('error', 'No se puede eliminar el recurso porque está siendo utilizado en otras tablas.');
          }

          $recurso->delete();
          return redirect()->back()->with('success', 'Recurso eliminado correctamente.');
      } else {
          return redirect()->back()->with('error', 'No se pudo encontrar el recurso.');
      }
  }

  public function eliminarRecursoAsignado($id)
  {
      $recursoAsignado = RecursoAsignadoCultivo::find($id);

      if ($recursoAsignado) {
          $recursoAsignado->delete();
          return redirect()->back()->with('success', 'Recurso asignado eliminado correctamente.');
      } else {
          return redirect()->back()->with('error', 'No se pudo encontrar el recurso asignado.');
      }
  }

  public function eliminarRiego($id)
  {
      $riego = Riego::find($id);

      if ($riego) {
          $riego->delete();
          return redirect()->back()->with('success', 'Riego eliminado correctamente.');
      } else {
          return redirect()->back()->with('error', 'No se pudo encontrar el riego.');
      }
  }


  public function eliminarPlaga($id)
  {
      $plaga = Plaga::find($id);

      if ($plaga) {
          // Verificar si la plaga está siendo utilizada en la tabla RegistroPlaga
          $registrosAsociados = RegistroPlaga::where('IDPlaga', $id)->count();

          if ($registrosAsociados > 0) {
              return redirect()->back()->with('error', 'No se puede eliminar la plaga porque está siendo utilizada en RegistroPlaga.');
          }

          $plaga->delete();
          return redirect()->back()->with('success', 'Plaga eliminada correctamente.');
      } else {
          return redirect()->back()->with('error', 'No se pudo encontrar la plaga.');
      }
  }

  public function eliminarRegistroPlaga($id)
  {
      $registroPlaga = RegistroPlaga::find($id);

      if ($registroPlaga) {
          $registroPlaga->delete();
          return redirect()->back()->with('success', 'Registro de plaga eliminado correctamente.');
      } else {
          return redirect()->back()->with('error', 'No se pudo encontrar el registro de plaga.');
      }
  }


  public function eliminarTarea($id)
  {
      $tarea = TareaGestionCultivo::find($id);

      if ($tarea) {
          $tarea->delete();
          return redirect()->back()->with('success', 'Tarea eliminado correctamente.');
      } else {
          return redirect()->back()->with('error', 'No se pudo encontrar la Tarea.');
      }
  }


  public function eliminarCosecha($id)
{
    $cosecha = Cosecha::find($id);

    if ($cosecha) {
        $cosecha->delete();
        return redirect()->back()->with('success', 'Cosecha eliminada correctamente.');
    } else {
        return redirect()->back()->with('error', 'No se pudo encontrar la cosecha.');
    }
}

   



   

}

//User::factory()->create([ 'name' => 'Juan', 'email' => 'juantiradoboza@gmail.com', 'Rol' => 'administrador', 'password' => bcrypt('admin123'), ])
