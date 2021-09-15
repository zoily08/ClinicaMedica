<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use ClinicaMedica\Sintomas;
use ClinicaMedica\Enfermedad;
use ClinicaMedica\Sint_enf;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\SintomasFormRequest; 
use ClinicaMedica\Http\Requests\EnfermedadFormRequest;  
use ClinicaMedica\Http\Requests\Sint_enfFormRequest;  
use DB;
use Alert;

use Dark\Dummy\Html\JSONHtmlElement;
use Dark\Dummy\Html\HTMLBuilder;  
 
use Carbon\Carbon;    
use Response;   
use Illuminate\Support\Collection;

 
class SintomasController extends Controller
{  
    public function _construct()
    { 
         
        $this->middleware('permission:sintomas.registro.create')->only(['create','store']);
        $this->middleware('permission:sintomas.index')->only('index');
        $this->middleware('permission:sintomas.edit')->only(['edit','update']);
        $this->middleware('permission:sintomas.show')->only('show');
        $this->middleware('permission:sintomas.destroy')->only('destroy');
     }
  
  

     public function index(Request $request)
    { 
        $searchText = $request->get('searchText');

        $enfermedad=DB::table('enfermedad')->get();
 
        return view('sintomas.index',["enfermedad"=>$enfermedad]) 
        ->with('searchText',$searchText) 
        ->with('sintomas',Sintomas::orderBy('idsintomas','ASC')->search($searchText)->get());

    }

    public function getEnfermedad(Request $request, $id){
        if($request->ajax()){
            $enfermedad= Enfermedad::enfermedad($id);
            return response()->json($enfermedad);
        }
    }

    public function create(){  

    } 

    public function store(Request $request)
    {
        $sintomas = new Sintomas;
        $sintomas->fill($request->all());
        $sintomas->save(); 
        Alert::success('El nuevo síntoma ha sido guardada con exito!!','Sintomas');
        return redirect()->back();
    }

    public function show($id){ 
        $sintomas=DB::table('sintomas as sint')
        ->select('sint.idsintomas','sint.nombre_sintomas')
        ->where('sint.idsintomas','=',$id) 
        ->get();
        return view("sintomas.show", ["sintomas"=>$sintomas]);
    }

 
    public function edit(Sintomas $sintomas){
       
    }

    public function update(SintomasFormRequest $request,$id)
    {
        $sintomas=Sintomas::findOrFail($id); 
        $sintomas->nombre_sintomas=$request->get('nombre_sintomas');
        $sintomas->update();
        Alert::success('El Síntoma '. $sintomas->nombre_sintomas.' ha sido actualizada con exito!!','Sintomas');
        return redirect()->back();
    }

     public function sint_enf(Request $request)
    {
        $sint_enf = new Sint_enf;
        $sint_enf->fill($request->all());
        $sint_enf->save(); 
        Alert::success('Guardado con exito!!'); 
        return redirect()->back();
    }


  
   

}