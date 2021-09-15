<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\ExamenformRequest;  
use ClinicaMedica\Examen;
use DB;

class ExamenController extends Controller
{
    public function _construct()
    {
         
        $this->middleware('permission:examen.create')->only(['create','store']);
        $this->middleware('permission:examen.index')->only('index');
        $this->middleware('permission:examen.edit')->only(['edit','update']);
        $this->middleware('permission:examen.show')->only('show');
        $this->middleware('permission:examen.destroy')->only('destroy');
     }          

    public function index (Request $request){
        if($request){

            $query= trim($request->get('searchText'));
              $registro_examen=DB::table('registro_examen')->get();
              $paciente=DB::table('paciente')->get();
              $usuario=DB::table('usuario')->get();
              $examen=DB::table('examen as exa')
            ->join('registro_examen as reg','exa.idregistro_examen','=','reg.idregistro_examen')
            ->join('paciente as p','exa.idpaciente','=','p.idpaciente')
            ->join('usuario as us','exa.idusuario','=','us.idusuario')
        ->select('exa.idexamen', 'reg.nombre_examen', 'exa.idregistro_examen','p.nombre_p','us.nombre')
            ->where('idexamen','LIKE','%'.$query.'%')
            ->orderBy('idexamen','asc')
            ->paginate(10);
           return view('laboratorio.Examen.index',["examen"=>$examen,"registro_examen"=>$registro_examen,"paciente"=>$paciente, "usuario"=>$usuario, "searchText"=>$query]);
        }
    }
    public function create (){
        $examen=DB::table('examen')->get();
        $registro_examen=DB::table('registro_examen')->get();
        $paciente=DB::table('paciente')->get();
         $usuario=DB::table('usuario')->get();
        return view ("laboratorio.Examen.create",["examen"=>$examen,"registro_examen"=>$registro_examen, "paciente"=>$paciente, "usuario"=>$usuario]);
        
    }
    public function store (ExamenformRequest $request){

        $examen= new Examen;
        $examen->idexamen=$request->get('idexamen');
        $examen->idregistro_examen=$request->get('idregistro_examen');
        $examen->idpaciente=$request->get('idpaciente');
        $examen->idusuario=$request ->get('idusuario');
        $examen->save();
        return Redirect::to('laboratorio/Examen');
    }

    public function show ($id){
        $Examen=DB::table('examen as ex');
        return view("laboratorio.Examen.show",["Examen"=>Examen::findOrFail($id)]);
    
    }
    public function edit($id){
       $examen=Examen::findOrFail($id);
        return view("laboratorio.Examen.edit",["examen"=>$examen]);
    }

    public function update(ExamenformRequest $request,$id){

        $examen=Examen::findOrFail($id);
        $examen->idexamen=$request->get('idexamen');
        $examen->idregistro_examen=$request->get('idregistro_examen');
        $examen->idpaciente=$request->get('idpaciente');
        $examen->idusuario=$request->get('idusuario');
        $examen->update();
        return Redirect::to('laboratorio/Examen');
    }
     public function destroy($id){
        $examen=Examen::findOrFail($id);
        $examen->update();
        return Redirect::to('laboratorio/Examen');
    }
}