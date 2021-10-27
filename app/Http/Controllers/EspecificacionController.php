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

use Barryvdh\DomPDF\Facade as PDF;

use Maatwebsite\Excel\Facades\Excel;
use ClinicaMedica\Exports\ProductoExport;
 
class EspecificacionController extends Controller 
{
   public function _construct() 
    {
         
        $this->middleware('permission:especificacion.create')->only(['create','store']);
        $this->middleware('permission:especificacion.index')->only('index');
        $this->middleware('permission:especificacion.edit')->only(['edit','update']);
        $this->middleware('permission:especificacion.show')->only('show');
        $this->middleware('permission:especificacion.destroy')->only('destroy');
     }          

    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText')); 
            $tipoconsulta=DB::table('tipoconsulta')->where('estado','=','ACTIVO')->get();
            $medico=DB::table('medico')->where('estado','=','ACTIVO')->get();



            $especificacion=DB::table('paciente')
            ->where('nombre_p','LIKE','%'.$query.'%')
            ->where('estado_p','=','ACTIVO')
            ->orderBy('idpaciente','des')  
            ->paginate(10);
 

            
            return view('consulta.especificacion.index',["tipoconsulta"=>$tipoconsulta,"medico"=>$medico,"especificacion"=>$especificacion,"searchText"=>$query]);  

        }  

    }

    public function store (EspecificacionFormRequest $request){
        $especificacion= new Especificacion; 
        $especificacion->idpaciente=$request->get('idpaciente');
        $especificacion->idtipoconsulta=$request->get('idtipoconsulta');
        $especificacion->idmedico=$request->get('idmedico');
        $especificacion->save();
        Alert::success('La Especificación ha sido guardado con exito!!','Especificación');
        return redirect()->back();  
    }


    public function show($id){
    
    }

    public function edit($id){
        
    }
    public function update(EspecificacionFormRequest $request,$id){
       
    }

    public function destroy($id){
    }
        
}