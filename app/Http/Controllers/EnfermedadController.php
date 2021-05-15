<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use ClinicaMedica\Enfermedad;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\EnfermedadFormRequest;  
use DB;
Use Alert;

use Carbon\Carbon; 
use Response;
use Illuminate\Support\Collection; 

class EnfermedadController extends Controller
{
     public function _construct()
    {
         
        $this->middleware('permission:enfermedad.create')->only(['create','store']);
        $this->middleware('permission:enfermedad.index')->only('index');
        $this->middleware('permission:enfermedad.edit')->only(['edit','update']);
        $this->middleware('permission:enfermedad.show')->only('show');
        $this->middleware('permission:enfermedad.destroy')->only('destroy');
                    


    }    

     public function index(Request $request)
    {
        $searchText = $request->get('searchText');
 
        return view('enfermedad.enfermedad.index') 
        ->with('searchText',$searchText) 
        ->with('enfermedad',Enfermedad::orderBy('idenfermedad','ASC')->search($searchText)->paginate(10));
    }
    
 
     
    public function store(EnfermedadFormRequest $request){
        $enfermedad=new Enfermedad;
        $enfermedad->enfermedad=$request->get('enfermedad');
        $enfermedad->save();
        Alert::success('La nueva enfermedad ha sido guardada con exito!!','Enfermedad');
        return redirect()->back(); 
    }

    public function show($id){  

        return view("enfermedad.enfermedad.show", ["enfermedad"=>Enfermedad::findOrFail($id)]);
    }


    public function edit(Sintomas $sintomas)
    {
        
    }

    public function update(EnfermedadFormRequest $request,$id)
    {
        $enfermedad=Enfermedad::findOrFail($id); 
        $enfermedad->enfermedad=$request->get('enfermedad');
        $enfermedad->update();
        Alert::success('La enfermedad '. $enfermedad->enfermedad.' ha sido actualizado con exito!!','Enfermedad');
        return redirect()->back();
    }



    
}
