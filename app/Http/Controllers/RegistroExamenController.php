<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\RegistroExamenformRequest;  
use ClinicaMedica\RegistroExamen;
use DB;
use Carbon\Carbon;

class RegistroExamenController extends Controller
{
    public function __construct(){
    }
    public function index (Request $request){
    	if($request){

    		$query= trim($request->get('searchText'));
    		$registroexamen=DB::table('registro_examen as reg')
        ->select('reg.idregistro_examen','reg.tipo_examen','reg.precio','reg.nombre_examen','reg.fecha_examen')
            ->where('idregistro_examen','LIKE','%'.$query.'%')
    		->orderBy('idregistro_examen','asc')
    		->paginate(10);
    	   return view('laboratorio.RegistroExamen.index',["registroexamen"=>$registroexamen,"searchText"=>$query]);
        }
    }
    public function create (){
        $registroexamen=DB::table('registro_examen')->get();
    	return view ("laboratorio.RegistroExamen.create",["registroexamen"=>$registroexamen]);
    	
    }
    public function store (RegistroExamenformRequest $request){

	    $registroexamen= new RegistroExamen;
		$registroexamen->idregistro_examen=$request->get('idregistro_examen');
		$registroexamen->tipo_examen=$request->get('tipo_examen');
        $registroexamen->precio=$request ->get('precio');
        $registroexamen->nombre_examen=$request ->get('nombre_examen');
        $mytime = Carbon::now('America/El_Salvador');
        $registroexamen->fecha_examen=$mytime->toDateTimeString();
		$registroexamen->save();
		return Redirect::to('laboratorio/RegistroExamen');
    }

    public function show ($id){
        $registroexamen=DB::table('registro_examen as reg')
        ->select('reg.idregistro_examen','reg.tipo_examen','reg.precio','reg.nombre_examen','reg.fecha_examen')
            ->where('reg.idregistro_examen','=',$id)
            ->first();
    	return view("laboratorio.RegistroExamen.show",["registroexamen"=>registroexamen::findOrFail($id)]);
    }

    public function edit($id){
       $registroexamen=RegistroExamen::findOrFail($id);
        return view("laboratorio.RegistroExamen.edit",["registroexamen"=>$registroexamen]);
    }

    public function update(RegistroExamenformRequest $request,$id){

    	$registroexamen=RegistroExamen::findOrFail($id);
    	$registroexamen->tipo_examen=$request->get('tipo_examen');
    	$registroexamen->precio=$request->get('precio');
        $registroexamen->nombre_examen=$request->get('nombre_examen');
        $mytime = Carbon::now('America/El_Salvador');
        $registroexamen->fecha_examen=$mytime->toDateTimeString();
        $registroexamen->update();
    	return Redirect::to('laboratorio/RegistroExamen');
    }
     public function destroy($id){
        $registroexamen=RegistroExamen::findOrFail($id);
        $registroexamen->delete($id);
        return Redirect::to('laboratorio/RegistroExamen');
    }
}
