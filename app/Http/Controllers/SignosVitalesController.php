<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use ClinicaMedica\SignosVitales;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\SignosVitalesFormRequest;  
use DB;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
 
class SignosVitalesController extends Controller
{  
    public function _construct() 
    {
         
        $this->middleware('permission:signos.signos_vitales.create')->only(['create','store']);
        $this->middleware('permission:signos.signos_vitales.index')->only('index');
        $this->middleware('permission:signos.signos_vitales.edit')->only(['edit','update']);
        $this->middleware('permission:signos.signos_vitales.show')->only('show');
        $this->middleware('permission:signos.signos_vitales.destroy')->only('destroy');
     }

    public function index (Request $request){     
    	if($request){
    		$query= trim($request->get('searchText'));
            $paciente=DB::select(DB::raw('SELECT * FROM paciente AS p LEFT JOIN (SELECT idpaciente AS id, estado FROM signos_vitales WHERE estado = "A CONSULTA") AS a ON idpaciente = id WHERE estado IS NULL AND estado_p = "ACTIVO"'));
    		$signos=DB::table('signos_vitales as sgv')
    		->join('paciente as p','sgv.idpaciente','=','p.idpaciente')
        	->select('sgv.idsignos_vitales','sgv.temperatura','sgv.presionsistolica','sgv.presiondiastolica','sgv.peso','sgv.estatura','sgv.IMC','p.nombre_p','p.apellido_p','sgv.estado','sgv.fecharegistro')
            ->where('nombre_p','LIKE','%'.$query.'%')
            ->where('estado','=','A CONSULTA')
    		->orderBy('idsignos_vitales','asc')
    		->paginate(10);
    	   return view('signos.signos_vitales.index',["signos"=>$signos,"paciente"=>$paciente,"searchText"=>$query]); 
        }
    } 


    public function store (SignosVitalesFormRequest $request){
    	$signos_v= new SignosVitales;
		$signos_v->temperatura=$request->get('temperatura');
		$signos_v->presionsistolica=$request->get('presionsistolica');
        $signos_v->presiondiastolica=$request->get('presiondiastolica');
		$signos_v->peso=$request ->get('peso');
		$signos_v->estatura=$request ->get('estatura');
        $signos_v->IMC=$request->get('IMC');
		$signos_v->idpaciente=$request ->get('idpaciente');
        $signos_v->estado='A CONSULTA';
        $signos_v->fecharegistro=$request->get('fecharegistro');
		$signos_v->save(); 
        Alert::success('Los Signos Vitales ha sido guardado con exito!!','SignosVitales');
        return redirect()->back();   
		/*return Redirect::to('signos/signos_vitales'); */
    }

    public function show ($id){
    	$paciente=DB::table('paciente')->where('estado_p','=','ACTIVO')->get();
        $signos=DB::table('signos_vitales as sig')
        ->join('paciente as p','sig.idpaciente','=','p.idpaciente') 
        ->select('sig.idsignos_vitales','sig.temperatura','sig.presionsistolica','sig.presiondiastolica','sig.peso','sig.estatura','sig.IMC','p.nombre_p','sig.estado','sig.fecharegistro')
        ->where('sig.idsignos_vitales','=',$id)
        ->first();
        return view("signos.signos_vitales.show", ["signos"=>$signos,"paciente"=>$paciente]);
 	 
    }
    public function edit($id){
        return view("signos.signos_vitales.edit", ["signos"=>SignosVitales::findOrFail($id)]);
    }

    public function update(SignosVitalesFormRequest $request,$id){

    	$signos=SignosVitales::findOrFail($id);
    	$signos->temperatura=$request->get('temperatura');
        $signos->presionsistolica=$request->get('presionsistolica');
        $signos->presiondiastolica=$request->get('presiondiastolica');
    	$signos->peso=$request->get('peso');
    	$signos->estatura=$request->get('estatura');
        $signos->IMC=$request->get('IMC'); 
        $signos->fecharegistro=$request->get('fecharegistro');
        $signos->update();
         Alert::warning('Los Signos de '. $signos->nombre_p.' ha sido actualizado con exito!!','Signos');
    	return Redirect::to('signos/signos_vitales');   
    } 

    public function destroy($id){
        $signos=SignosVitales::findOrFail($id);
        $signos->estado='EN CONSULTA';
        $signos->update();
         Alert::warning('Los Signos se han enviado con exito!!','Signos');
        return Redirect::to('signos/signos_vitales'); 
    }
    
}
 