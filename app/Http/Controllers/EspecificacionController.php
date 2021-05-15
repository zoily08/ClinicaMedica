<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use ClinicaMedica\EspecificacionFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\EspecialidadFormRequest;  
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
            
            return view('consulta.especificacion.index',["tipoconsulta"=>$tipoconsulta,"medico"=>$medico,"searchText"=>$query]); 

        }

    }

    public function create(){ 
        
    }

    public function store(ProductoFormRequest $request){
        $especificacion=new especificacion;
        $especificacion->nombre=$request->get('nombre');
        
    }

    public function show($id){
    
    }

    public function edit($id){
        
    }
    public function update(ProductoFormRequest $request,$id){
       
    }

    public function destroy($id){
    }
        
}