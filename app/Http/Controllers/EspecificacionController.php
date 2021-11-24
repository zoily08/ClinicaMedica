<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use ClinicaMedica\Especificacion;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\EspecificacionFormRequest;  
use DB;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
 
class EspecificacionController extends Controller
{
    public function index (Request $request){     
    	if($request){
    		$query= trim($request->get('searchText'));
    		$tipoconsulta=DB::table('tipoconsulta')->where('estado','=','ACTIVO')->get();
            $paciente=DB::table('paciente')->where('estado_p','=', 'ACTIVO')->get();
    		$especificacion=DB::table('especificacion as espe')
    		->join('paciente as p','espe.idpaciente','=','p.idpaciente')
        	->select('espe.idespecificacion','p.nombre_p','p.apellido_p','espe.estado_espe')
            ->where('nombre_p','LIKE','%'.$query.'%')
    		->orderBy('idespecificacion','asc')
    		->paginate(10);
    	   return view('consulta.especificacion.index',["especificacion"=>$especificacion,"paciente"=>$paciente,"tipoconsulta"=>$tipoconsulta,"searchText"=>$query]); 
        }
    } 


     public function store(Request $request)
    {
        $especificacion = new Especificacion;
        $especificacion->idpaciente=$request->get('idpaciente');
        $especificacion->estado_espe=$request->get('estado_espe');
        $especificacion->save(); 
        Alert::success('La nueva especificación ha sido guardada con exito!!','Especificación');
        return redirect()->back();
    }


     public function destroy($id){ 
        $especificacion=Especificacion::findOrFail($id);
        $especificacion->estado_espe='A SIGNOS VITALES';
        $especificacion->update();
         Alert::warning('El Paciente se ha enviado con exito!!','
         	Especificacion');
        return Redirect::to('consulta/especificacion'); 
    }
}
