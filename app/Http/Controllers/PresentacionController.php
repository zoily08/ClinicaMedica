<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use ClinicaMedica\Presentacion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\PresentacionFormRequest;  
use DB;

class PresentacionController extends Controller
{
    public function __construct(){

    } 
 
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText')); 
    		$presentacion=DB::table('presentacion')->where('nombre','LIKE','%'.$query.'%')
    		->where('estado','=','1')
    		->orderBy('idpresentacion','asc')
    		->paginate(10);
    		return view('proveedor.presentacion.index',["presentacion"=>$presentacion,"searchText"=>$query]);
    	}

    }

    public function create(){
    	return view("proveedor.presentacion.create");
    }

    public function store(PresentacionFormRequest $request){
    	$presentacion=new Presentacion;
    	$presentacion->nombre=$request->get('nombre');
    	$presentacion->unidades=$request->get('unidades');
    	$presentacion->descripcion=$request->get('descripcion');
    	$presentacion->estado='1';
    	$presentacion->save();
    	return Redirect::to('proveedor/presentacion');  
    }

    public function show($id){
    	return view("proveedor.presentacion.show", ["presentacion"=>Presentacion::findOrFail($id)]);
    }

     public function edit($id){
        return view("proveedor.presentacion.edit", ["presentacion"=>Presentacion::findOrFail($id)]);
    }
    public function update(PresentacionFormRequest $request,$id){
    	$presentacion=Presentacion::findOrFail($id);
    	$presentacion->nombre=$request->get('nombre');
    	$presentacion->unidades=$request->get('unidades');
    	$presentacion->descripcion=$request->get('descripcion');
    	$presentacion->update();
    	return Redirect::to('proveedor/presentacion');
    }

    public function destroy($id){
    	$presentacion=Presentacion::findOrFail($id);
    	$presentacion->estado='0';
    	$presentacion->update();
    	return Redirect::to('proveedor/presentacion');
    }
}
