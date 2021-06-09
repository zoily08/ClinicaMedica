<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use ClinicaMedica\Tipoconsulta;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\TipoconsultaFormRequest;  
use DB;
Use Alert;

use Carbon\Carbon; 
use Response;
use Illuminate\Support\Collection; 



class TipoconsultaController extends Controller
{
     public function _construct()
    { 
         
        $this->middleware('permission:consulta.create')->only(['create','store']);
        $this->middleware('permission:consulta.index')->only('index');
        $this->middleware('permission:consulta.edit')->only(['edit','update']);
        $this->middleware('permission:consulta.show')->only('show');
        $this->middleware('permission:consulta.destroy')->only('destroy');
     }



     public function index(Request $request)
    {
        $searchText = $request->get('searchText');
 
        return view('consulta.Tipoconsulta.index') 
        ->with('searchText',$searchText) 
        ->with('tipoconsulta',Tipoconsulta::orderBy('idtipoconsulta','ASC')->search($searchText)->paginate(10));
    }

    public function store(TipoconsultaFormRequest $request){
        $tipoconsulta=new Tipoconsulta;
        $tipoconsulta->nombre=$request->get('nombre');
        $tipoconsulta->estado='ACTIVO';
        $tipoconsulta->save();

        Alert::success('El nuevo tipo de consulta ha sido guardada con exito!!','Tipoconsulta');
        return redirect()->back(); 
    }

    public function show($id){ 
        return view("consulta.Tipoconsulta.show", ["tipoconsulta"=>Tipoconsulta::findOrFail($id)]);
    }
    

    public function update(TipoconsultaFormRequest $request,$id){
        $tipoconsulta=Tipoconsulta::findOrFail($id);
        $tipoconsulta->nombre=$request->get('nombre');
        $tipoconsulta->update(); 
        Alert::success('El Tipo de Consulta '. $tipoconsulta->nombre.' ha sido actualizado con exito!!','Tipoconsulta');
        return redirect()->back();

    }

     public function destroy($id){
        $tipoconsulta=Tipoconsulta::findOrFail($id);
        if ($tipoconsulta->estado=='ACTIVO'){
            $tipoconsulta->estado='INACTIVO';
        }
        else{ 
            if($tipoconsulta->estado=='INACTIVO'){
                $tipoconsulta->estado='ACTIVO'; 
            }
        }
        $tipoconsulta->update();
        Alert::success('Actualizado con exito!!','Tipoconsulta');
        return redirect()->back(); 
    }
}
