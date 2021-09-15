<?php

namespace ClinicaMedica\Http\Controllers;
 
use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\VentaFormRequest; 
use ClinicaMedica\Venta;
use ClinicaMedica\DetalleVenta; 
use DB; 

use Carbon\Carbon;   
use Response;
use Illuminate\Support\Collection; 
 
class VentaController extends Controller
{   
     public function __construct(){         
    }   

    public function index(Request $request){ 
    	if($request){ 
    		$query=trim($request->get('searchText'));
    		$ventas=DB::table('venta as v')
    		->join('paciente as p','v.idpaciente','=','p.idpaciente')
    		->join('detalle_venta as dv','v.idventa','=','dv.idventa')
    		->select('v.idventa','v.fecha_venta','v.tipo_comprobante','v.num_comprobante','v.total_venta','v.estado','p.nombre_p')
    		->where('v.num_comprobante','LIKE','%'.$query.'%')
    		->orderBy('v.idventa','desc')
    		->groupBY('v.idventa','v.fecha_venta','v.tipo_comprobante','v.num_comprobante','v.total_venta','v.estado','p.nombre_p')
    		->paginate(10);
 
            $consult=DB::table('consulta_medica as cm')
            ->join('paciente as pac','cm.idpaciente','=','pac.idpaciente')
            ->select('pac.idpaciente','pac.nombre_p','pac.apellido_p') 
            ->where('estado_c','=','A RECETA')->get();
  
            $productos=DB::table('producto as pro')
            ->join('detalle_compra as dc','pro.idproducto','=','dc.idproducto')
            ->select(DB::raw('CONCAT(pro.nombre_producto) AS producto'),'pro.idproducto',DB::raw('(dc.precio_compra) as precio'),DB::raw('(pro.descuento) as desct'),DB::raw('(pro.margen_ganancia)as margen'),DB::raw('ROUND(((dc.precio_compra) * (100 / (100 - pro.margen_ganancia))),2) as precio_venta'),DB::raw('(dc.cantidad) as cant_compra'))
            ->groupBY('producto','pro.idproducto','dc.precio_compra','pro.descuento','pro.margen_ganancia','dc.cantidad')
            ->where('estado','=','ACTIVO')
            ->get(); 
    		return view('ventas.venta.index',["ventas"=>$ventas,"consult"=>$consult,"productos"=>$productos,"searchText"=>$query]); 
    	}
 
    }  
 
    /*public function create(){
    	$consult=DB::table('consulta_medica as cm')
        ->join('paciente as pac','cm.idpaciente','=','pac.idpaciente')
        ->select('pac.idpaciente','pac.nombre_p','pac.apellido_p')
        ->where('estado_c','=','VENTA')->get();
    	$productos=DB::table('producto as pro')
        ->join('detalle_compra as dc','pro.idproducto','=','dc.idproducto')
        ->select(DB::raw('CONCAT(pro.codigo_barra," ",pro.nombre_producto) AS producto'),'pro.idproducto',DB::raw('(dc.precio_compra) as precio'),DB::raw('(pro.descuento) as desct'))
        ->where('pro.estado','=','ACTIVO')
        ->groupBY('producto','pro.idproducto','dc.precio_compra','pro.descuento')
        ->get();
    		
    	return view("ventas.venta.create",["consult"=>$consult,"productos"=>$productos]);
    }*/


    /* public function create(){
        return view("ventas.venta.create");
    }*/




    public function store(VentaFormRequest $request){
    	try{
    		DB::beginTransaction();
    		$venta=new Venta;
            $venta->fecha_venta=$request->get('fecha_venta');
            $venta->tipo_comprobante=$request->get('tipo_comprobante');
            $venta->num_comprobante=$request->get('num_comprobante');
            $venta->total_venta=$request->get('total_venta');
            $venta->estado='VENDIDO';
    		$venta->idpaciente=$request->get('idpaciente');
    		$venta->save();
 
    		$idproducto = $request->get('idproducto');
    		$cantidad = $request->get('cantidad');
            $precio_venta = $request->get('precio_venta');
           // $precio_compra = $request->get('precio_compra');
    		$descuento= $request->get('descuento');
            $margen= $request->get('margen');
            $stock= $request->get('stock');
 
    		$cont = 0;

    		while ($cont < count($idproducto)){
    			$detalle = new DetalleVenta();
    			$detalle->idventa=$venta->idventa;
    			$detalle->idproducto=$idproducto[$cont];
    			$detalle->cantidad=$cantidad[$cont];
                $detalle->precio_venta=$precio_venta[$cont];
                $detalle->precio_compra=$precio_compra[$cont];
    			$detalle->descuento=$descuento[$cont];
                $detalle->margen=$margen[$cont];
                $detalle->stock=$stock[$cont];
    			
    			$detalle->save();
    			$cont=$cont+1;
    		}

    		DB::commit();

    	}
    	catch(\Exception $e){
    		DB::rollback();
    	}
    	return Redirect::to('ventas/venta');
    }

    public function show($id){
    	$venta=DB::table('venta as v')
            ->join('paciente as p','v.idpaciente','=','p.idpaciente')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha_venta','p.nombre_p','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
    		->where('v.idventa','=',$id)
            ->first();
    		

    	$detalles=DB::table('detalle_venta as dv')
    		->join('producto as pro', 'dv.idproducto','=','pro.idproducto')
    		->select('pro.nombre_producto as producto','dv.stock','dv.descuento','dv.precio_venta')
    		->where('dv.idventa','=',$id)
    		->get();
    	return view("ventas.venta.show",["venta"=>$venta,"detalles"=>$detalles]);

    }

    public function destroy($id){
    	$venta=Venta::findOrFail($id);
    	$venta->estado='0';
    	$venta->update();
    	return Redirect::to('ventas/venta');
    }
}
