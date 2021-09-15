<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use ClinicaMedica\Paciente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\PacienteFormRequest;
use DB;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Barryvdh\DomPDF\Facade as PDF;

use Maatwebsite\Excel\Facades\Excel;
use ClinicaMedica\Exports\PacienteExport;

class PacienteController extends Controller
{
     public function _construct() 
    {
 
    $this->middleware('permission:registro.paciente.create')->only(['create','store']);
    $this->middleware('permission:registro.paciente.index')->only('index');
    $this->middleware('permission:registro.paciente.edit')->only(['edit','update']);
    $this->middleware('permission:registro.paciente.show')->only('show');
    $this->middleware('permission:registro.paciente.destroy')->only('destroy');
            


    }

    public function exportPdf()
    {
        $paciente = Paciente::get();
        $pdf   = PDF::loadView('pdf.paciente', compact('paciente'));




        return $pdf->download('paciente-list.pdf');
    }



    public function exportExcel()
    {
        return Excel::download(new PacienteExport, 'paciente-list.xlsx');
    }



    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $pacients = DB::table('paciente')
                ->where('nombre_p', 'LIKE', '%' . $query . '%')
                //->where('estado_p','=','Activo')
                ->orderBy('idpaciente', 'desc')
                ->paginate(10);
            // Alert::success("Guardado");
            return view('registro.paciente.index', ["pacients" => $pacients, "searchText" => $query]);
        }
    }


    public function create()
    {
        return view("registro.paciente.create");
    }

    public function store(PacienteFormRequest $request){


        $paciente = Paciente::where('nombre_p', '=', Input::get('nombre_p'))->get();
                if(count($paciente) > 0)
                {
                echo "ya esta este dato";
                }
                else{
                        $paciente = new Paciente;
                        $paciente->nombre_p = $request->get('nombre_p');
                        $paciente->apellido_p = $request->get('apellido_p');
                        $paciente->edad_p = $request->get('edad_p');
                        $paciente->genero_p = $request->get('genero_p');
                        $paciente->fechanacimiento_p = $request->get('fechanacimiento_p');
                        $paciente->direccion_p = $request->get('direccion');
                        $paciente->nombre_padre_p = $request->get('nombre_padre_p');
                        $paciente->nombre_madre_p = $request->get('nombre_madre_p');
                        $paciente->nombre_conyuge_p = $request->get('nombre_conyuge_p');
                        $paciente->nombre_responsable_p = $request->get('nombre_responsable_p');
                        $paciente->telefono_p = $request->get('telefono_p');
                        $paciente->fecha_registro_p = $request->get('fecha_registro_p');

                        $paciente->estado_p = 'ACTIVO';
                        $paciente->detalle = $request->get('detalle');

                        $paciente->save();



                }
                

            
           
            //return Redirect::to('registro/paciente');

            Alert::success('Registro guardado con exito!!', 'Paciente');
            //return redirect()->back();
             return Redirect::to('registro/paciente'); 
    }

    public function storeNewPatient(Request $request) 
    {
        // return response()->json([
        //     'patient'=>$request->all()
        // ]);
            $patient = new Paciente;
            $patient->fill($request->all()); 
            $patient->estado_p = 'ACTIVO';
            $patient->detalle = $request->get('detalle');

            $error = $patient->save();

            return response()->json([
                'msg'=> ($error) ? 'Registro guardado con exito!!':'Imposible guardar el registro',
                'title'=>'Paciente',
                'type'=> ($error) ? 'success':'error'
            ]);
    }

    public function show($id)
    {

        return view("registro.paciente.show", ["paciente" => Paciente::findOrFail($id)]);
    }





    public function edit($id)
    {
        return view("registro.paciente.edit", ["paciente" => Paciente::findOrFail($id)]);
    }
    public function update(PacienteFormRequest $request, $id)
    {

        $paciente = Paciente::findOrFail($id);
        $paciente->nombre_p = $request->get('nombre_p');
        $paciente->apellido_p = $request->get('apellido_p');
        $paciente->edad_p = $request->get('edad_p');
        $paciente->genero_p = $request->get('genero_p'); 
        $paciente->direccion_p = $request->get('direccion_p');
        $paciente->nombre_padre_p = $request->get('nombre_padre_p');
        $paciente->nombre_madre_p = $request->get('nombre_madre_p');
        $paciente->nombre_conyuge_p = $request->get('nombre_conyuge_p');
        $paciente->nombre_responsable_p = $request->get('nombre_responsable_p');
        $paciente->telefono_p = $request->get('telefono_p');



        $paciente->fecha_registro_p = $request->get('fecha_registro_p');
        $paciente->update();
        Alert::warning('El Paciente ' . $paciente->nombre_p . ' ha sido actualizado con exito!!', 'Paciente');
        //return redirect()->back();

        return Redirect::to('registro/paciente');


        //$paciente->estado_p=$request->get('estado_p');
    }

    /* public function destroy($id){
        $paciente=Paciente::findOrFail($id);
        $paciente->estado_p='INACTIVO';
        $paciente->update();
        return Redirect::to('registro/paciente');
    }*/


    public function destroy($id)
    {

        $paciente = Paciente::findOrFail($id);

        if ($paciente->estado_p == 'ACTIVO') {

            $paciente->estado_p = 'INACTIVO';
        } else {
            if ($paciente->estado_p == 'INACTIVO') {
                $paciente->estado_p = 'ACTIVO';
            }
        }
        $paciente->update();

        // return Redirect::to('registro/paciente');
        Alert::success('Actualizado con exito!!', 'Paciente');
        return redirect()->back();
    }
}
