<?php

namespace ClinicaMedica\Http\Controllers;


use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use ClinicaMedica\Proveedor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\ProveedorFormRequest;  
use DB;
use Alert;
 
use Carbon\Carbon;    
use Response;
use Illuminate\Support\Collection; 
 
use Barryvdh\DomPDF\Facade as PDF;

use Maatwebsite\Excel\Facades\Excel;
use ClinicaMedica\Exports\ProveedorExport;

 
class ProveedorController extends Controller  
{
     public function _construct()
    {
         
        $this->middleware('permission:proveedor.registro.create')->only(['create','store']);
        $this->middleware('permission:proveedor.registro.index')->only('index');
        $this->middleware('permission:proveedor.registro.edit')->only(['edit','update']);
        $this->middleware('permission:proveedor.registro.show')->only('show');
        $this->middleware('permission:proveedor.registro.destroy')->only('destroy');
     }

     public function exportPdf()
    {
        $proveedors = Proveedor::get();
        $pdf   = PDF::loadView('pdf.proveedor', compact('proveedors'));

        return $pdf->download('proveedor-list.pdf');
    }


     public function index(Request $request)
    {
        $searchText = $request->get('searchText');
 
        return view('proveedor.registro.index') 
        ->with('searchText',$searchText) 
        ->with('proveedors',Proveedor::orderBy('idproveedor','ASC')->search($searchText)->paginate(10));
    }
 
    public function create(){

    }

    public function store(ProveedorFormRequest $request){
        $proveedor=new Proveedor;
        $proveedor->nombre_empresa=$request->get('nombre_empresa');
        $proveedor->registro_sanitario=$request->get('registro_sanitario');
        $proveedor->nombre_p=$request->get('nombre_p');
        $proveedor->direccion_p=$request->get('direccion_p');
        $proveedor->telefono_p=$request->get('telefono_p');
        $proveedor->fecha_registro_p=$request->get('fecha_registro_p');
        $proveedor->estado_p='ACTIVO';
        $proveedor->save();


        Alert::success('Registro guardado con exito!!','Proveedor');
        return redirect()->back();
    }

    public function show($id){

        return view("proveedor.registro.show", ["proveedor"=>Proveedor::findOrFail($id)]);
    }
    

    
 
    public function update(ProveedorFormRequest $request,$id){
        $proveedor=Proveedor::findOrFail($id); 
        $proveedor->nombre_empresa=$request->get('nombre_empresa');
        $proveedor->registro_sanitario=$request->get('registro_sanitario');
        $proveedor->nombre_p=$request->get('nombre_p');
        $proveedor->direccion_p=$request->get('direccion_p');
        $proveedor->telefono_p=$request->get('telefono_p');
        $proveedor->fecha_registro_p=$request->get('fecha_registro_p');
        $proveedor->update();    
 

        Alert::warning('El Proveedor '. $proveedor->nombre_p.' ha sido actualizado con exito!!','Proveedor');
        //return redirect()->back();

        return Redirect::to('proveedor/registro');
    }
    
    public function destroy($id){
    $proveedor=Proveedor::findOrFail($id);
    if ($proveedor->estado_p=='ACTIVO'){
        $proveedor->estado_p='INACTIVO';
    }
    else{
          if($proveedor->estado_p=='INACTIVO'){
            $proveedor->estado_p='ACTIVO';
          }
    }
       $proveedor->update();
        
        return Redirect::to('proveedor/registro');
    }
}
