<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;

use ClinicaMedica\Http\Requests;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\ConsultaMedicaFormRequest; 
use ClinicaMedica\ConsultaMedica;  
use ClinicaMedica\Sintomas; 
use ClinicaMedica\SignosVitales;
use ClinicaMedica\Enfermedad;
use ClinicaMedica\Paciente;  
use DB;  
use Alert;    
     
use Carbon\Carbon;       
use Response;                      
use Illuminate\Support\Collection;  

class ConsultaMedicaController extends Controller
{
    public function __construct(){  

    }     
 
    public function index(Request $request){  

        $enfermedad=DB::table('enfermedad')->get();

        $sintomas = DB::table('sintomas')->pluck("nombre_sintomas","idsintomas");
        
        $signos=DB::table('signos_vitales as sig') 
            ->join('paciente as p','p.idpaciente','=','sig.idpaciente')
            ->select('sig.idsignos_vitales','p.idpaciente','p.nombre_p','p.apellido_p','sig.temperatura','sig.presionsistolica','sig.presiondiastolica','sig.peso','sig.estatura','sig.IMC','sig.estado')
            ->where('estado','=','EN CONSULTA') 
            ->orderBy('idpaciente','asc')
            ->groupBy('sig.idsignos_vitales','p.idpaciente','p.nombre_p','p.apellido_p','sig.temperatura','sig.presionsistolica','sig.presiondiastolica','sig.peso','sig.estatura','sig.IMC','sig.estado')
            ->get(); 
            return view('consulta.consulta_medica.index',["signos"=>$signos,"sintomas"=>$sintomas,"enfermedad"=>$enfermedad]); 
        } 

    public function getEnfermedad($id) {
        $paciente = explode(",", $id);

        $enf=DB::table('enfermedad')->get();
        $sin=DB::table('sintomas')->get();
        $SxE=DB::table('sintomas as s') 
            ->join('sint_enf as SxE','SxE.idsintomas','=','s.idsintomas')
            ->join('enfermedad as e','e.idenfermedad','=','SxE.idenfermedad')
            ->get();
        $dataset = $this->crearDataset($enf, $sin, $SxE);
        $diagnostico = $this->diagnosticar($paciente, $dataset, $enf);
        echo json_encode($diagnostico);
    }

    /* Crear Matriz de  enfermedades (filas) x sintomas (columnas), donde los valores 0 ausencia del sintoma y 1 presencia del sintoma
        Entrada: enfermedades, sintomas y sintomas_enfermedades (Son datos consultados directamente desde la Base de Datos)
        Salida: Matriz ExS (enfermedades x Sintomas)
    */
    private function crearDataset($enf, $sin, $SxE){
        $dataset = [];
        for($i=0 ; $i < $enf->count(); $i++){
            $dataset[$i] = array('id' => $enf[$i]->idenfermedad, 'fila' => []);
            for($j=0 ; $j < count($sin); $j++){
                $dataset[$i]["fila"][$j] = array('id' => $sin[$j]->idsintomas, 'valor' => 
                    $SxE->where('idsintomas', $sin[$j]->idsintomas)->where('idenfermedad', $enf[$i]->idenfermedad)->isEmpty() ? 0:1);
            }
        }//echo json_encode($dataset). "</br>"; // TEST
        return $dataset;
    }


    /* Realizar calculo de probabilidades básica, para el pronostico sencillo de las enfermedades deacuerdo a los sintomas presentados por el paciente
        Entrada: Vector de las id de los sintomas (Desde la cadena de consulta del URL), el dataset generado por la función crearDataset() y las enfermedades (sacados desde la Base de datos)
        Salida: Vector de probabilidad (con las llaves idenfermedad, enfermedad y probabilidad)
    */
    private function diagnosticar($paciente, $dataset, $enf){
        //casos favorables y posibles
        $casos=[];
        //vector de probabilidad
        $probabilidad=[];

        //Recorrer las filas del dataset
        for($i=0; $i < count($dataset); $i++){
            $casos[$i] = array('id' => $dataset[$i]["id"], 'posible' => 0 , 'favorable' => 0);

            for($j=0; $j < count($dataset[$i]["fila"]); $j++){
            //Si la enfermedad se le ha registrado dicho sintoma
                if($dataset[$i]["fila"][$j]["valor"]==1){
                    $casos[$i]["posible"]++;
                    // Si el paciente tiene dicho sintoma 
                    if(in_array(strval($dataset[$i]["fila"][$j]["id"]), $paciente)){
                        $casos[$i]["favorable"]++;
                    }
                }
            }
            //Calcular las probabilidades. La formula de la probabilidad es: casos favorables / casos posibles
            $aux = $casos[$i]["posible"]!=0 ? round( $casos[$i]["favorable"] / $casos[$i]["posible"],4): 0;
            $probabilidad[$i]= array('idenfermedad'=> $enf[$i]->idenfermedad, "enfermedad" => $enf[$i]->enfermedad, "probabilidad" => $aux * 100);
        }//echo json_encode($casos) . "</br>"; // TEST
        return $probabilidad;
    }

       
   /* public function index(Request $request){    
    	if($request){  
    		$query=trim($request->get('searchText')); 
            $signos=DB::table('signos_vitales')->where('estado','=','EN CONSULTA');
            $paciente=DB::table('paciente as pac')
            ->join('signos_vitales as sig','sig.idpaciente','=','pac.idpaciente')
            ->select('sig.idsignos_vitales','pac.idpaciente','pac.nombre_p','pac.apellido_p','sig.temperatura','sig.presionsistolica','sig.presiondiastolica','sig.peso','sig.estatura','sig.estado')
            ->where('estado','=','EN CONSULTA')
            ->orderBy('idpaciente','asc')
            ->groupBy('sig.idsignos_vitales','pac.idpaciente','pac.nombre_p','pac.apellido_p','sig.temperatura','sig.presionsistolica','sig.presiondiastolica','sig.peso','sig.estatura','sig.estado')
            ->get(); 

           $pacientes=DB::table('paciente as p')
            ->join('signos_vitales as sv','p.idpaciente','=','sv.idpaciente')
            ->select(DB::raw('CONCAT(p.nombre_p," ",p.apellido_p) AS pacientes'),'p.idpaciente','sv.idsignos_vitales',DB::raw('(sv.temperatura) as temp'),DB::raw('(sv.presionsistolica) as press'),DB::raw('(sv.presiondiastolica) as presd'),DB::raw('(sv.peso) as peso'),DB::raw('(sv.estatura) as estatura'))
            ->where('sv.estado','=','EN CONSULTA')
            ->groupBY('pacientes','p.idpaciente','sv.idsignos_vitales','temp','press','presd','peso','estatura')
            ->get();

            $pacientes=DB::table('paciente as p')
            ->join('signos_vitales as sv', 'p.idpaciente', '=', 'sv.idpaciente')
            ->select('p.nombre_p','p.apellido_p','sv.idsignos_vitales','sv.temperatura','sv.presionsistolica','sv.presiondiastolica','sv.peso','sv.estatura')
            ->where('sv.estado','=','EN CONSULTA')
            ->get();
 
            return view('consulta.consulta_medica.index',["paciente"=>$paciente,"signos"=>$signos,"searchText"=>$query])
            ->with('sintomas',Sintomas::all()->pluck('nombre_sintomas','idsintomas'));
        }
    }*/

    public function store(Request $request)
    { 
        $consulta_medica = new ConsultaMedica;
        $consulta_medica->idsintomas= json_encode( $request->input('idsintomas') );
        $consulta_medica->idenfermedad = $request->get('idenfermedad');
        $consulta_medica->fecha_c=$request->get('fecha_c'); 
        $consulta_medica->observacion=$request->get('observacion');
        $consulta_medica->estado_c='A VENTA';
        

        foreach ($request->idsintomas as $idsintomas) {
            $sintomas = Sintomas::find($idsintomas);
            $consulta_medica->sintomas()->attach($idsintomas,['correlative'=> $idsintomas->sintomas->count() + 1]);
        }
        $consulta_medica->save();
        Alert::success('La nueva Consulta ha sido guardado con exito!!','Consulta');
        return redirect()->back();




        
    } 

}
