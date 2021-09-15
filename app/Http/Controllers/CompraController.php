<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\CompraFormRequest;  
use ClinicaMedica\Compra;
use ClinicaMedica\DetalleCompra;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Alert;


class CompraController extends Controller
{

public function __construct(){

       /* $this->middleware('permission:compras.ingreso.create')->only(['create','store']);
        $this->middleware('permission:compras.ingreso.index')->only('index');
        $this->middleware('permission:compras.ingreso.edit')->only(['edit','update']);
        $this->middleware('permission:compras.ingreso.show')->only('show');
        $this->middleware('permission:compras.ingreso.destroy')->only('destroy');
        */            

    }

    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $compras=DB::table('compra as c') 
            ->join('proveedor as p','c.idproveedor','=','p.idproveedor')
            ->join('detalle_compra as dc','c.idcompra','=','dc.idcompra')
            ->select('c.idcompra','c.num_comprobante','c.tipo_comprobante','c.presentacion','c.estado','c.fecha_compra','p.nombre_p',DB::raw('sum((dc.cantidad*precio_compra*dc.impuesto/100)+dc.cantidad*precio_compra) as total'))
            ->where('c.num_comprobante','LIKE','%'.$query.'%') 
            //->where('estado','=','Activo')
            ->orderBy('c.idcompra','desc')
            ->groupBY('c.idcompra','c.num_comprobante','c.tipo_comprobante','c.presentacion','c.estado','c.fecha_compra','p.nombre_p')
            ->paginate(10);

          $proveedors=DB::table('proveedor')->where('estado_p','=','Activo')->get();
          
          $productos=DB::table('producto as pro')
        ->select(DB::raw('CONCAT(pro.codigo_barra," ",pro.nombre_producto) AS producto'),'pro.idproducto')
        ->where('pro.estado','=','ACTIVO')
        ->get();

            return view('compras.ingreso.index',["proveedors"=>$proveedors,"productos"=>$productos,"compras"=>$compras,"searchText"=>$query]);
        }


    }

  /*public function create(){
        $proveedors=DB::table('proveedor')->where('estado_p','=','Activo')->get();

        $productos=DB::table('producto as pro')
        ->select(DB::raw('CONCAT(pro.codigo_barra," ",pro.nombre_producto) AS producto'),'pro.idproducto')
        ->where('pro.estado','=','ACTIVO')
        ->get();
        return view("compras.ingreso.create",["proveedors"=>$proveedors,"productos"=>$productos]);
    }*/

    public function create(){
        return view("compras.ingreso.create");
    }


    public function store(CompraFormRequest $request){
         try{
            DB::beginTransaction();
            $compra=new Compra;
            $compra->num_comprobante=$request->get('num_comprobante');
            $compra->tipo_comprobante=$request->get('tipo_comprobante');    
            $compra->presentacion=$request->get('presentacion');  
            $compra->estado='ACTIVO';

            $mytime = Carbon::now('America/El_Salvador');
            $compra->fecha_compra=$mytime->toDateTimeString();

              //$compra->fecha_vencimiento=$request->get('fecha_vencimiento');

           
             // $compra->fecha_vencimiento=$request->//get('fecha_vencimiento');
            
         //$mytime = Carbon::now('America/El_Salvador');
          //$compra->fecha_vencimiento=$mytime->toDateTimeString(); 

           //$compra->fecha_compra=$request->get('fecha_compra');

            
            $compra->idproveedor=$request->get('idproveedor');
            $compra->save();


            $idproducto = $request->get('idproducto');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $impuesto = $request->get('impuesto');
            $fecha_vencimiento= $request->get('fecha_vencimiento');
             //$impuesto->impuesto=$request->get('impuesto');  

           
           
            $cont = 0;


            while ($cont < count($idproducto)) {
                
                $detalle = new DetalleCompra();
                $detalle->idcompra=$compra->idcompra;
                $detalle->idproducto=$idproducto[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio_compra=$precio_compra[$cont];
                $detalle->impuesto=$impuesto[$cont]; 
                $detalle->fecha_vencimiento=$fecha_vencimiento[$cont]; 

                $detalle->save();
                $cont=$cont+1;

            }

            DB::commit();

        }
        catch(\Exception $e){
            DB::rollback();
        }

      
        return Redirect::to('compras/ingreso');

        }
    

    public function show($id){
        $compra=DB::table('compra as c')
            ->join('proveedor as p','c.idproveedor','=','p.idproveedor')
            ->join('detalle_compra as dc','c.idcompra','=','dc.idcompra')
            ->select('c.idcompra','c.num_comprobante','c.tipo_comprobante','c.presentacion','c.estado','c.fecha_compra','p.nombre_p',DB::raw('sum((dc.cantidad*precio_compra*dc.impuesto)/100+dc.cantidad*precio_compra) as total'))
            ->where('c.idcompra','=',$id)
            ->groupBY('c.idcompra','c.num_comprobante','c.tipo_comprobante','c.presentacion','c.estado','c.fecha_compra','p.nombre_p')
            ->first();
            

        $detalles=DB::table('detalle_compra as d')
            ->join('producto as po', 'd.idproducto','=','po.idproducto')
            ->select('po.nombre_producto as producto','d.cantidad','d.precio_compra','d.impuesto','d.fecha_vencimiento')
            ->where('d.idcompra','=',$id)
            ->get();
        return view("compras.ingreso.show",["compra"=>$compra,"detalles"=>$detalles]);

    }

    public function destroy($id){
        $compra=Compra::findOrFail($id);

        if ($compra->estado=='ACTIVO'){
        
        $compra->estado='INACTIVO';
    }
    else{
          if($compra->estado=='INACTIVO'){
            $compra->estado='ACTIVO';
          }
    }
       $compra->update();
        
       return Redirect::to('compras/ingreso');
    }
        //$compra->estado="INACTIVO";
        //$compra->update();
        //return Redirect::to('compras/ingreso');
    



  

}
