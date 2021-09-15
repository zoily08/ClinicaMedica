<?php

namespace ClinicaMedica\Http\Controllers;


use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use ClinicaMedica\Especialidad; 
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
use ClinicaMedica\Exports\PacienteExport; 

class EspecialidadController extends Controller
{
   public function _construct()
    {
         
        $this->middleware('permission:especialidad.create')->only(['create','store']);
        $this->middleware('permission:especialidad.index')->only('index');
        $this->middleware('permission:especialidad.edit')->only(['edit','update']);
        $this->middleware('permission:especialidad.show')->only('show');
        $this->middleware('permission:especialidad.destroy')->only('destroy');
                    


    } 

    /*public function exportPdf()
    {
        $paciente = Paciente::get();
        $pdf   = PDF::loadView('pdf.paciente', compact('paciente'));

      


        return $pdf->download('paciente-list.pdf');


        
    }



    public function exportExcel()
    {
        return Excel::download(new PacienteExport, 'paciente-list.xlsx');
    }*/



    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $espe=DB::table('especialidad')
            ->where('nombre','LIKE','%'.$query.'%')
            //->where('estado_p','=','Activo')
            ->orderBy('idespecialidad','desc')
            ->paginate(10);
           
            return view('especialidad.index',["espe"=>$espe,"searchText"=>$query]);
        }

    }
    

    public function create(){
        return view("especialidad.create");
    }

    public function store(EspecialidadFormRequest $request){
        $especialidad=new Especialidad;
        $especialidad->nombre=$request->get('nombre');
        $especialidad->estado='ACTIVO';

        $especialidad->save();

            //return Redirect::to('registro/paciente');

        Alert::success('Guardado con exito!!','Especialidad');
        return redirect()->back();

    }

    public function show($id){

        return view("especialidad.show", ["especialidad"=>Especialidad::findOrFail($id)]);
    }


     


    public function edit($id){
        return view("especialidad.edit", ["especialidad"=>Especialidad::findOrFail($id)]); 
    }
    public function update(EspecialidadFormRequest $request,$id){
        
        $especialidad=Especialidad::findOrFail($id);
        $especialidad->nombre=$request->get('nombre');
        $especialidad->update();
        
        Alert::warning('Actualizado con exito!!','Especialidad');
        return Redirect::to('especialidad');

    }

  


   /* public function destroy(Consultorio $consultorio){
        $consultorio->delete();
         Alert::success('Eliminado con exito!!','Consultorio');
        return Redirect::to('consultorio');
      
    }*/

    



     public function destroy($id){

      $especialidad=Especialidad::findOrFail($id);

    if ($especialidad->estado=='ACTIVO'){
        
        $especialidad->estado='INACTIVO';
        
    }
    else{
          if($especialidad->estado=='INACTIVO'){
            $especialidad->estado='ACTIVO';
          }
    }
       $especialidad->update();
        
       // return Redirect::to('especialidad');

        Alert::success('Actualizado con exito!!','Especialidad');
        return redirect()->back();
    }
   

    }

