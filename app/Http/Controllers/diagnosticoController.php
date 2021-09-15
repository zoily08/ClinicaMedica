<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\diagnosticoformRequest;  
use ClinicaMedica\diagnostico;
use DB;

class diagnosticoController extends Controller
{
    public function __construct(){
    }
    public function index (Request $request){
    	if($request){

    		$query= trim($request->get('searchText'));
             $paciente=DB::table('paciente')->get();
    		$diagnostico1=DB::table('diagnostico as dim')
        ->join('consulta_medica as conm','dim.idconsulta_medica','=','conm.idconsulta_medica')
        ->join('paciente as p','conm.idpaciente','=','p.idpaciente')
        ->select('dim.iddiagnostico','dim.detalle','dim.observacion','conm.idconsulta_medica','p.nombre_p')
            ->where('iddiagnostico','LIKE','%'.$query.'%')
            ->where('conm.estado','=','0')
    		->orderBy('iddiagnostico','asc')
    		->paginate(10);
    	   return view('consulta.diagnostico.index',["diagnostico1"=>$diagnostico1,"paciente"=>$paciente,"searchText"=>$query]);
        }
    }
    public function create (){
        $consulta=DB::table('consulta_medica')->get();
        $paciente=DB::table('paciente')->where('estado_p','=','Activo')->get();
        $diagnostico1=DB::table('diagnostico as dim');
    	return view ("consulta.diagnostico.create",["consulta"=>$consulta,"paciente"=>$paciente]);
    	
    }
    public function store (diagnosticoformRequest $request){

	    $diagnostico1= new diagnostico;
		$diagnostico1->detalle=$request->get('detalle');
		$diagnostico1->observacion=$request->get('observacion');
        $diagnostico1->idconsulta_medica=$request ->get('idconsulta_medica');
		$diagnostico1->save();
		return Redirect::to('consulta/diagnostico');
    }

    public function show ($id){
         $diagnostico=DB::table('diagnostico as di')
        ->join('consulta_medica as conm','di.idconsulta_medica','=','conm.idconsulta_medica')
        ->join('paciente as p','conm.idpaciente','=','p.idpaciente')
        ->select('p.nombre_p','di.detalle','di.observacion')
            ->where('di.iddiagnostico','=',$id)
            ->first();
        return view("consulta.diagnostico.show", ["diagnostico"=>$diagnostico]);
 	
    }
       public function edit($id){
        $diagnostico1=diagnostico::findOrFail($id);
        $paciente=DB::table('paciente')->where('estado_p','=','Activo')->get();
        $usuario=DB::table('usuario')->where('estadou','=','Activo')->get();
        return view("consulta.diagnostico.edit",["diagnostico"=>$diagnostico1,"paciente"=>$paciente,"usuario"=>$usuario]);
    }

    public function update(diagnosticoformRequest $request,$id){

    	$diagnostico1=diagnostico::findOrFail($id);
    	$diagnostico1->detalle=$request->get('detalle');
    	$diagnostico1->observacion=$request->get('observacion');
        $diagnostico1->update();
    	return Redirect::to('consulta/diagnostico');
    }
     public function destroy($id){
        $diagnostico1=diagnostico::findOrFail($id);
        $diagnostico1->update();
        return Redirect::to('consulta/diagnostico');
    }
}
