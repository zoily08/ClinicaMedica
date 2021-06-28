<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use ClinicaMedica\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\ProductoFormRequest;  
use DB;  
use Alert; 
 
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use Barryvdh\DomPDF\Facade as PDF;

use Maatwebsite\Excel\Facades\Excel;
use ClinicaMedica\Exports\ProductoExport;
 
class ProductoController extends Controller
{
    public function _construct() 
    {
         
        $this->middleware('permission:proveedor.producto.create')->only(['create','store']);
        $this->middleware('permission:proveedor.producto.index')->only('index');
        $this->middleware('permission:proveedor.producto.edit')->only(['edit','update']);
        $this->middleware('permission:proveedor.producto.show')->only('show');
        $this->middleware('permission:proveedor.producto.destroy')->only('destroy');
     }
    public function exportPdf() 
    {
        $productos = Producto::get();
        $pdf   = PDF::loadView('pdf.producto', compact('productos'));

        return $pdf->download('producto-list.pdf');
    }




    /*public function exportExcel()
    {
        return Excel::download(new ProductoExport, 'producto-list.xlsx');
    }
*/



    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $proveedor=DB::table('proveedor')->where('estado_p','=','ACTIVO')->get();
            $productos=DB::table('producto as p')
            ->join('proveedor as prov', 'p.idproveedor','=','prov.idproveedor')
            ->select('p.idproducto','p.codigo_barra','p.unidad_medida','p.nombre_producto','p.fecha_registro','p.imagen','p.margen_ganancia','p.indicacion','p.descuento','p.presentacion','p.estado','p.idproveedor')
            ->where('nombre_producto','LIKE','%'.$query.'%')
            ->orwhere('p.idproducto','LIKE','%'.$query.'%')
            ->orderBy('idproducto','asc')
            ->paginate(10);
            return view('proveedor.producto.index',["productos"=>$productos,"proveedor"=>$proveedor,"searchText"=>$query]);                 
        }

    }   

    public function create(){     
        $proveedor=DB::table('proveedor')->where('estado_p','=','Activo')->get();
        return view("proveedor.producto.create",["proveedor"=>$proveedor]);
    }

    public function store(ProductoFormRequest $request){
        $producto=new Producto;
        $producto->codigo_barra=$request->get('codigo_barra');
        $producto->unidad_medida=$request->get('unidad_medida');
        $producto->nombre_producto=$request->get('nombre_producto');
        $producto->fecha_registro=$request->get('fecha_registro');
        $producto->margen_ganancia=$request->get('margen_ganancia');
        $producto->descuento=$request->get('descuento');
        $producto->presentacion=$request->get('presentacion');
        $producto->indicacion=$request->get('indicacion');
        $producto->estado='ACTIVO';
        $producto->idproveedor=$request->get('idproveedor');
        if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
            $producto->imagen=$file->getClientOriginalName();
        }
        $producto->save();

        Alert::success('Guardado con exito!!','Producto');
        return redirect()->back();
       // return Redirect::to('proveedor/producto'); 
    }

    public function show($id){ 
        $proveedor=DB::table('proveedor')->where('estado_p','=','Activo')->get();
        $prod=DB::table('producto as p')
            ->select('p.idproducto','p.codigo_barra','p.unidad_medida','p.nombre_producto','p.fecha_registro','p.imagen','p.margen_ganancia','p.indicacion','p.descuento','p.presentacion','p.estado','p.idproveedor')
            ->where('p.idproducto','=',$id) 
            ->get();
        return view("proveedor.producto.show", ["proveedor"=>$proveedor,"prod"=>$prod]);
    }

    public function edit($id){
        return view("proveedor.producto.edit", ["producto"=>Producto::findOrFail($id)]);
        
    } 
    public function update(ProductoFormRequest $request,$id){
        $producto= Producto::findOrFail($id);
        $producto->codigo_barra=$request->get('codigo_barra');
        $producto->unidad_medida=$request->get('unidad_medida');
        $producto->nombre_producto=$request->get('nombre_producto');
        $producto->fecha_registro=$request->get('fecha_registro');
        $producto->margen_ganancia=$request->get('margen_ganancia');
        $producto->descuento=$request->get('descuento');
        $producto->presentacion=$request->get('presentacion');
        $producto->indicacion=$request->get('indicacion');
        $producto->idproveedor=$request->get('idproveedor');

        if(Input::hasFile('imagen')){  
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
            $producto->imagen=$file->getClientOriginalName();
        }
        $producto->update();

        Alert::warning('Actualizado con exito!!','Producto');
        return Redirect::to('proveedor/producto');
    }

    public function destroy($id){
        $producto=Producto::findOrFail($id);
        if ($producto->estado=='ACTIVO'){
        $producto->estado='INACTIVO'; 
    }
    else{
          if($producto->estado=='INACTIVO'){
            $producto->estado='ACTIVO';
          }
    }
        $producto->update();
        Alert::success('Actualizado con exito!!','Producto');
        return redirect()->back();
        //return Redirect::to('proveedor/producto');
    }
}
