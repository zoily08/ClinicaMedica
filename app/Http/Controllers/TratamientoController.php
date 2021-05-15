<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\TratamientoFormRequest; 
use ClinicaMedica\Tratamiento;
use ClinicaMedica\DetalleTratamiento;   
use DB; 
 
use Carbon\Carbon;  
use Response; 
use Illuminate\Support\Collection;

class TratamientoController extends Controller
{
    public function __construct(){  
    } 
    public function index(Request $request){ 
    	if($request){ 
    		$query=trim($request->get('searchText'));
    		$tratamientos=DB::table('tratamiento as tr')
            ->join('diagnostico as diag','tr.iddiagnostico','=','diag.iddiagnostico')
            ->join('paciente as p', 'tr.idpaciente','=','p.idpaciente')
    		->select('tr.idtratamiento','tr.nombre_tratamiento','tr.tipo_tratamiento','tr.fecharegistro','tr.otros','diag.iddiagnostico','p.nombre_p')
    		->where('nombre_tratamiento','LIKE','%'.$query.'%')
    		->orwhere('tr.idtratamiento','LIKE','%'.$query.'%')
    		->orderBy('idtratamiento','asc')
            ->groupBy('tr.idtratamiento','tr.nombre_tratamiento','tr.tipo_tratamiento','tr.fecharegistro','tr.otros','tr.estado','diag.iddiagnostico','p.nombre_p')
    		->paginate(10);
    		return view('tratamientos.tratamiento.index',["tratamientos"=>$tratamientos,"searchText"=>$query]); 
    	}
    }
    public function create(){  
        $pacientes=DB::table('paciente')->where('estado_p','=','Activo')->get();
        $diagnostico=DB::table('diagnostico')->where('estado','=','Consulta')->get();
        $productos=DB::table('producto as pro')
        ->join('detalle_compra as dc','pro.idproducto','=','dc.idproducto')
        ->select(DB::raw('CONCAT(pro.codigo_barra," ",pro.nombre_producto) AS producto'),'pro.idproducto',DB::raw('(dc.cantidad) as exist'))
        ->where('pro.estado','=','ACTIVO')
        ->where('dc.cantidad','>','0') 
        ->groupBY('producto','pro.idproducto','exist')
        ->get();
    	return view("tratamientos.tratamiento.create",["pacientes"=>$pacientes,"diagnostico"=>$diagnostico,"productos"=>$productos]); 
    }
    public function store(TratamientoFormRequest $request){ 
        try{
            DB::beginTransaction();
            $tratamiento=new Tratamiento();
            $tratamiento->idpaciente=$request->get('idpaciente');
            $tratamiento->nombre_tratamiento=$request->get('nombre_tratamiento');
            $tratamiento->tipo_tratamiento=$request->get('tipo_tratamiento');
            $tratamiento->fecharegistro=$request->get('fecharegistro');
            $tratamiento->iddiagnostico=$request->get('iddiagnostico');
            $tratamiento->otros=$request->get('otros');
            $tratamiento->estado="VENTA";
            $tratamiento->save();

            $idproducto = $request->get('idproducto');
            $cantidad = $request->get('cantidad');

            $cont = 0;

            while ($cont < count($idproducto)) {
                $detalle = new DetalleTratamiento();
                $detalle->idtratamiento=$tratamiento->idtratamiento;
                $detalle->idproducto=$idproducto[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->save();
                $cont=$cont+1;
            }

            DB::commit();

        }
        catch(\Exception $e){
            DB::rollback();
        }

            return Redirect::to('tratamientos/tratamiento'); 
    }

    public function show($id){
        $tratamiento=DB::table('tratamiento as tr')
            ->join('diagnostico as diag','tr.iddiagnostico','=','diag.iddiagnostico')
            ->join('paciente as p','tr.idpaciente','=','p.idpaciente')
            ->select('tr.idtratamiento','tr.nombre_tratamiento','tr.tipo_tratamiento','tr.fecharegistro','tr.otros','diag.detalle','p.nombre_p')
            ->where('tr.idtratamiento','=',$id)
            ->first();

        $detalles=DB::table('detalle_tratamiento as dtr')
            ->join('detalle_compra as dc','dtr.iddetalle_compra','=','dc.iddetalle_compra')
            ->select('dtr.idtratamiento','dc.idproducto','dc.cantidad')
            ->where('dtr.idtratamiento','=',$id)
            ->get();
        return view("tratamientos.tratamiento.show",["tratamiento"=>$tratamiento,"detalles"=>$detalles]);


    }

    public function destroy($id){
        $tratamiento=Tratamiento::findOrFail($id);
        $tratamiento->estado='VENTA';
        $tratamiento->update();
        return Redirect::to('tratamientos/tratamiento');
    }

     /*public function edit($id){
    	$tratamiento=Tratamiento::findOrFail($id);
    	$productos=DB::table('producto')->where('estado','=','1')->get();
    	return view("tratamientos.tratamiento.edit", ["tratamiento"=>$tratamiento,"productos"=>$productos]);
    }
    public function update(ProductoFormRequest $request,$id){
    	$tratamiento= Tratamiento::findOrFail($id);
    	$tratamiento->nombre_tratamiento=$request->get('nombre_tratamiento');
    	$tratamiento->tipo_tratamiento=$request->get('tipo_tratamiento');
    	$tratamiento->fecharegistro=$request->get('fecharegistro');
    	$tratamiento->otros=$request->get('otros');
    	$tratamiento->iddiagnostico=$request->get('iddiagnostico');
        $tratamiento->update();
    	$tratamiento->idproducto=$request->get('idproducto');
        return Redirect::to('tratamientos/tratamiento');
    }*/
}