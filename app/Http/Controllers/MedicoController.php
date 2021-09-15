<?php

namespace ClinicaMedica\Http\Controllers;


use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use ClinicaMedica\Medico; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; 
use ClinicaMedica\Http\Requests\MedicoFormRequest;
use DB;
use Alert;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class MedicoController extends Controller
{ 
    public function _construct()
    {
         
     $this->middleware('permission:medicos.create')->only(['create','store']);
     $this->middleware('permission:medicos.index')->only('index');
     $this->middleware('permission:medicos.edit')->only(['edit','update']);
     $this->middleware('permission:medicos.show')->only('show');
     $this->middleware('permission:medicos.destroy')->only('destroy');
                    


    }

   
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $medi=DB::table('medico')
            
            ->where('nombre','LIKE','%'.$query.'%')
            //->where('estado_p','=','Activo')
            ->orderBy('idmedico','desc')
            ->paginate(10);

            $espe=DB::table('especialidad')->where('estado','=','ACTIVO')->get();
           
            return view('medico.index',["medi"=>$medi,"espe"=>$espe,"searchText"=>$query]);



        }

    }
    

    public function create(){
        return view("medico.create");
    }

    public function store(MedicoFormRequest $request){
        $medico=new Medico;
        $medico->nombre=$request->get('nombre');
        $medico->apellido=$request->get('apellido');
        $medico->telefono=$request->get('telefono');
        $medico->direccion=$request->get('direccion');
        
        $medico->estado='ACTIVO';
        $medico->idespecialidad=$request->get('idespecialidad');

        $medico->save();

            //return Redirect::to('registro/paciente');

        Alert::success('Guardado con exito!!','Medico');
        return redirect()->back();

    }

    public function show($id){

        return view("medico.show", ["medico"=>Medico::findOrFail($id)]);
    }


     


    public function edit($id){
        return view("medico.edit", ["medico"=>Medico::findOrFail($id)]);
    }
    public function update(MedicoFormRequest $request,$id){
        
        $medico=Medico::findOrFail($id);
        $medico->nombre=$request->get('nombre');
        $medico->apellido=$request->get('apellido');
        $medico->telefono=$request->get('telefono');
        $medico->direccion=$request->get('direccion');

        $medico->update();
        
        Alert::warning('Actualizado con exito!!','Medico');
        //return Redirect::to('especialidad');
        return Redirect::to('medico');

    }
    public function destroy($id){
        $medico=Medico::findOrFail($id);

        if ($medico->estado=='ACTIVO'){
            $medico->estado='INACTIVO';
        }
        else{
            if($medico->estado=='INACTIVO'){
            $medico->estado='ACTIVO';
        }
         }
       $medico->update();
        
        //return Redirect::to('medico');

        Alert::success('Actualizado con exito!!','Medico');
        return redirect()->back();
    }
   

    }

