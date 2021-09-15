<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use ClinicaMedica\ConsultaPsicologica;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\ConsultaPsicologicaformRequest;  
use DB;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ConsultaPsicologicaController extends Controller
{
     public function _construct()
    {
         
        $this->middleware('permission:consulta.consulta_psicologica.create')->only(['create','store']);
        $this->middleware('permission:consulta.consulta_psicologica.index')->only('index');
        $this->middleware('permission:consulta.consulta_psicologica.edit')->only(['edit','update']);
        $this->middleware('permission:consulta.consulta_psicologica.show')->only('show');
        $this->middleware('permission:consulta.consulta_psicologica.destroy')->only('destroy');
                    


    }
    
    public function index (Request $request){
        if($request){ 

            $query= trim($request->get('searchText'));
            $paciente=DB::select(DB::raw('SELECT * FROM paciente AS p LEFT JOIN (SELECT idpaciente AS id, estado FROM signos_vitales WHERE estado = "A CONSULTA") AS a ON idpaciente = id WHERE estado IS NULL AND estado_p = "ACTIVO"'));
            $consultap=DB::table('consulta_psicologica as conm') 
            ->join('paciente as p','conm.idpaciente','=','p.idpaciente')
            ->select('conm.idconsulta_psicologica','conm.detalle','conm.observacion','conm.fecha_consulta','conm.estado','p.idpaciente','p.nombre_p','p.apellido_p')
            ->where('nombre_p','LIKE','%'.$query.'%')
            ->where('estado','=','A CONSULTA')
            ->orderBy('idconsulta_psicologica','asc')  
            ->paginate(10);
           return view('consulta.consulta_psicologica.index',["consultap"=>$consultap,"paciente"=>$paciente,"searchText"=>$query]);

           
        }
    }
   
    public function store (ConsultaPsicologicaformRequest $request){
        $consultap= new ConsultaPsicologica;
        $consultap->detalle=$request->get('detalle');
        $consultap->observacion=$request->get('observacion');
        $consultap->fecha_consulta=$request->get('fecha_consulta');
        $consultap->estado='A RECETA';
        $consultap->idpaciente=$request->get('idpaciente');
        $consultap->save();
        Alert::success('La Consulta Psicológica ha sido guardado con exito!!','ConsultaPsicologica');
        return redirect()->back();  
    }


    public function show ($id){ 
        $paciente=DB::table('paciente')->where('estado_p','=','ACTIVO')->get();
        $consultap=DB::table('consulta_psicologica as conp')
        ->join('paciente as p','conp.idpaciente','=','p.idpaciente') 
        ->select('conp.idconsulta_psicologica','conp.detalle','conp.observacion','conp.fecha_consulta','conp.estado','p.nombre_p')
        ->where('conp.idconsulta_psicologica','=',$id)
        ->first();
        return view("consulta.consulta_psicologica.show", ["consultap"=>$consultap,"paciente"=>$paciente]);
     
    }
 
    public function edit($id){
        return view("consulta.consulta_psicologica.edit", ["consultap"=>ConsultaPsicologica::findOrFail($id)]);
    }

  
    public function update(ConsultaPsicologicaformRequest $request, $id){

        $consultap=ConsultaPsicologica::findOrFail($id);
        $consultap->detalle=$request->get('detalle');
        $consultap->observacion=$request->get('observacion');
        $consultap->fecha_consulta=$request->get('fecha_consulta'); 
        $consultap->update();
        Alert::warning('La Consulta se ha sido actualizado con exito!!','ConsultaPsicologica');
        return Redirect::to('consulta/consulta_psicologica'); 
    }
     public function destroy($id){
        $consultap=ConsultaPsicologica::findOrFail($id);
        $consultap->estado='0';
        $consultap->update();
        return Redirect::to('consulta/consulta_psicologica');
    }
}
