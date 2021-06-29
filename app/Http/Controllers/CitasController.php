<?php

namespace ClinicaMedica\Http\Controllers;


use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use ClinicaMedica\Citas; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; 
use ClinicaMedica\Http\Requests\CitasFormRequest;
use DB;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class CitasController extends Controller
{
   public function _construct()
    {
         
        $this->middleware('permission:citas.create')->only(['create','store']);
        $this->middleware('permission:citas.index')->only('index');
        $this->middleware('permission:citas.edit')->only(['edit','update']);
        $this->middleware('permission:citas.show')->only('show');
        $this->middleware('permission:citas.destroy')->only('destroy');
                    

 
    }

   
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $paci=DB::table('paciente')->where('estado_p','=','ACTIVO')->get();
            $medi=DB::table('medico')->where('estado','=','ACTIVO')->get();
            $consul=DB::table('consultorio')->where('estado','=','ACTIVO')->get();
            $espe=DB::table('especialidad')->where('estado','=','ACTIVO')->get();

            $cits=DB::table('citas as c')
            ->join('paciente as p', 'p.idpaciente','=','c.idpaciente')
            ->select('c.idcitas','c.fecha','c.hora','c.observacion','c.idpaciente','c.idmedico','c.idconsultorio','c.idespecialidad','c.estado')
            ->where('fecha','LIKE','%'.$query.'%')

            ->orderBy('idcitas','desc')
            ->paginate(10);

            
           
            return view('citas.index',["cits"=>$cits,"paci"=>$paci,"medi"=>$medi,"consul"=>$consul,"espe"=>$espe,"searchText"=>$query]);



        }

    }
    

    public function create(){
        return view("citas.create");
    }

    public function store(CitasFormRequest $request){
        $citas=new Citas; 
        $citas->fecha=$request->get('fecha');
        $citas->hora=$request->get('hora');
        $citas->observacion=$request->get('observacion');
        $citas->idpaciente=$request->get('idpaciente');
        $citas->idmedico=$request->get('idmedico');
        $citas->idconsultorio=$request->get('idconsultorio');
        $citas->idespecialidad=$request->get('idespecialidad');

        $citas->estado='ACTIVO';

        
        $citas->save();

            //return Redirect::to('registro/paciente');

        Alert::success('Guardado con exito!!','Citas');
        return redirect()->back();

    }

    public function show($id){

        return view("citas.show", ["citas"=>Citas::findOrFail($id)]);
    }

    public function edit($id){
        return view("citas.edit", ["citas"=>Citas::findOrFail($id)]);
    }
    public function update(CitasFormRequest $request,$id){
        
        $citas=Citas::findOrFail($id);
        $citas->fecha=$request->get('fecha');
        $citas->hora=$request->get('hora');
        $citas->observacion=$request->get('observacion');
        $citas->idpaciente=$request->get('idpaciente');
        $citas->idmedico=$request->get('idmedico');
        $citas->idconsultorio=$request->get('idconsultorio');
        $citas->idespecialidad=$request->get('idespecialidad');

        $citas->update();
        
        Alert::warning('Actualizado con exito!!','Citas');
        //return Redirect::to('especialidad');
        return Redirect::to('citas');

    }

  


   /* public function destroy(Consultorio $consultorio){
        $consultorio->delete();
         Alert::success('Eliminado con exito!!','Consultorio');
        return Redirect::to('consultorio');
      
    }*/


    public function destroy($id){

      $citas=Citas::findOrFail($id);

    if ($citas->estado=='ACTIVO'){
        
        $citas->estado='INACTIVO';
    }
    else{
          if($citas->estado=='INACTIVO'){
            $citas->estado='ACTIVO';
          }
    }
       $citas->update();
        
         Alert::warning('Actualizado con exito!!','Citas');
        return Redirect::to('citas');
    }
   

    



     
   

    }

