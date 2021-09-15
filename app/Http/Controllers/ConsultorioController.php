<?php

namespace ClinicaMedica\Http\Controllers;


use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use ClinicaMedica\Consultorio; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; 
use ClinicaMedica\Http\Requests\ConsultorioFormRequest;
use DB;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Barryvdh\DomPDF\Facade as PDF;

use Maatwebsite\Excel\Facades\Excel;
use ClinicaMedica\Exports\PacienteExport;

class ConsultorioController extends Controller
{
    public function _construct()
    {
         
        $this->middleware('permission:consultorio.create')->only(['create','store']);
        $this->middleware('permission:consultorio.index')->only('index');
        $this->middleware('permission:consultorio.edit')->only(['edit','update']);
        $this->middleware('permission:consultorio.show')->only('show');
        $this->middleware('permission:consultorio.destroy')->only('destroy');
                    


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
            $consult=DB::table('consultorio')
            ->where('nombre','LIKE','%'.$query.'%')
            //->where('estado_p','=','Activo')
            ->orderBy('idconsultorio','desc')
            ->paginate(10);
           
            return view('consultorio.index',["consult"=>$consult,"searchText"=>$query]);
        }

    }
    

    public function create(){
        return view("consultorio.create");
    }

    public function store(ConsultorioFormRequest $request){
        $consultorio=new Consultorio;
        $consultorio->nombre=$request->get('nombre');
        $consultorio->estado='ACTIVO';

        $consultorio->save();

            //return Redirect::to('registro/paciente');

        Alert::success('Guardado con exito!!','Consultorio');
        return redirect()->back();

    }

    public function show($id){

        return view("consultorio.show", ["consultorio"=>Consultorio::findOrFail($id)]);
    }


     


    public function edit($id){
        return view("consultorio.edit", ["consultorio"=>Consultorio::findOrFail($id)]);
    }
    public function update(ConsultorioFormRequest $request,$id){
        
        $consultorio=Consultorio::findOrFail($id);
        $consultorio->nombre=$request->get('nombre');
        $consultorio->update();
        
        Alert::success('Actualizado con exito!!','Consultorio');
        return Redirect::to('consultorio');

    }

  


   /* public function destroy(Consultorio $consultorio){
        $consultorio->delete();
         Alert::success('Eliminado con exito!!','Consultorio');
        return Redirect::to('consultorio');
      
    }*/

    



     public function destroy($idconsultorio){

      $consultorio=Consultorio::findOrFail($idconsultorio);

    if ($consultorio->estado=='ACTIVO'){
        
        $consultorio->estado='INACTIVO';
        
    }
    else{
          if($consultorio->estado=='INACTIVO'){
            $consultorio->estado='ACTIVO';
          }
    }
       $consultorio->update();
        
        //return Redirect::to('consultorio');
       Alert::success('Actualizado con exito!!','Consultorio');
        return redirect()->back();
    }
   

    }

