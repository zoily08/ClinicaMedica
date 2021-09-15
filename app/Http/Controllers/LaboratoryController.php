<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;
use ClinicaMedica\MedicalExam;
use ClinicaMedica\Paciente;
use ClinicaMedica\Area;
use ClinicaMedica\Order;
use Alert;
use Dark\Dummy\Html\JSONHtmlElement;
use Dark\Dummy\Html\HTMLBuilder;
class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function _construct()
    {
         
        $this->middleware('permission:laboratorio.create')->only(['create','store']);
        $this->middleware('permission:laboratorio.index')->only('index');
        $this->middleware('permission:laboratorio.edit')->only(['edit','update']);
        $this->middleware('permission:laboratorio.show')->only('show');
        $this->middleware('permission:laboratorio.destroy')->only('destroy');
     }
 
     
    public function index()
    {
        dd(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        // $patient = $order->patient;
        return response()->json([
            'order'=>$order,
            'patient'=>$order->patient,
            'exams'=> $order->exams
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exam_order_index(Request $request)
    {
        $searchText = $request->get('searchText');
        $orders = Order::all();
        return view('laboratorio.exam_order_index')
        ->with('patiens',Paciente::all()->prepend(['idpaciente'=>-1,'nombre_p' => 'Seleccioné una opción'])->pluck('nombre_p','idpaciente'))
        ->with('searchText',$searchText)
        ->with('orders',$orders)
        ->with('areas',Area::all()->prepend(['id'=>-1,'name' => 'Seleccioné una opción'])->pluck('name','id'))
        ->with('exams',MedicalExam::where('status','Activo')->get()->prepend(['id'=>-1,'name' => 'Seleccioné una opción'])->pluck('name','id'));
    }

    public function exam_order_data($id)
    {
        $exam = MedicalExam::find($id);
        return response()->json([
            'price' => $exam->price,
            'id' => $exam->id,
            'code' => $exam->code
        ]);
    }

    public function exam_order_store(Request $request)
    {
        // dd($request);
        $order = new Order;
        $order->fill($request->all());
        $order->save();
        foreach ($request->get('exams_lst') as $exam_id) {
            $exam = MedicalExam::find($exam_id);
            $order->exams()->attach($exam);
        }
        Alert::success('La nueva orden de examenes ha sido guardada con exito!!','Orden');
        return redirect()->back();
    } 

    public function updateOrder(Request $request, Order $order)
    {
        // dd($order,$request);
        // $order = new Order;
        $order->fill($request->all());
        $order->update();
        foreach ($order->exams as $exam) {
           $order->exams()->detach($exam);
        }

        foreach ($request->get('exams_lst') as $exam_id) {
            $exam = MedicalExam::find($exam_id);
            $order->exams()->attach($exam);
        }
        Alert::success('Los datos de la orden de examenes han sido actualizados con exito!!','Orden');
        return redirect()->back();
    }

    public function getPatient($id)
    {
        $patient = Paciente::find($id);
        return response()->json([
            'patient' => $patient
        ]);
    }

    public function add_patient(Request $request)
    {
        $patient = new Paciente;
        $patient->fill($request->all());
        $patient->estado_p = 'ACTIVO';
        $patient->save();

        return redirect()->back();
    }

    public function get_form($id)
    {
        $exam =MedicalExam::find($id);
        // dd($id,$exam,new HTMLBuilder('div'),MedicalExam::where('inputs','!=','[]')->get());
        $form = new JSONHtmlElement($exam->inputs);
        return response()->json([
            'form'=> ''.$form
        ]);
    }

    ///new



    public function results_index(Request $request)
    {
        $searchText = $request->get('searchText');
        $orders = Order::all();
        return view('laboratorio.exam_result_index')
        ->with('orders',$orders);
    }

      public function getExams($id)
    {
        $order=Order::find($id);

   $patient=Paciente::find($order->patient_id);
   $name=$patient->nombre_p;
   $lastname=$patient->apellido_p;
        return response()->json([
            'exams' => Order::find($id)->exams,
            'patientname' =>$name,
            'patientlastname'=>$lastname
        ]);
    }
    

     public function generatemodal($id)
    {
       $mde=MedicalExam::find($id);

$build= new JSONHtmlElement($mde->inputs);

  return response()->json([
          'form'=> ''.$build
          
        ]);
    }
}
