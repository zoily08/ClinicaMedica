<?php

namespace ClinicaMedica\Http\Controllers;

use ClinicaMedica\MedicalExam;
use ClinicaMedica\Area;

use Illuminate\Http\Request;
use Alert;

class MedicalExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(MedicalExam::first()->areas()->first()->pivot->correlative);
        $searchText = $request->get('searchText');
        $exams = MedicalExam::orderBy('name','ASC')->search($searchText)->get();
        // dd(MedicalExam::first()->area->exams);
        return view('examenes.index')
        ->with('exams',$exams)
        ->with('searchText',$searchText)
        ->with('areas',Area::all()->pluck('name','id')); 
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
        // dd($request);
        $exam = new MedicalExam;
        $exam->name = $request->get('name');
        $exam->price = $request->get('price');
        $exam->inputs = json_encode($request->get('inputs'));
        $exam->type = $request->get('type');
        $exam->save();
        foreach ($request->area_id as $area_id) {
            $area = Area::find($area_id);
            $exam->areas()->attach($area,['correlative'=> $area->exams->count() + 1]);
        }
        Alert::success('El nuevo examen ha sido guardado con exito!!','Examen');
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \ClinicaMedica\MedicalExam  $medicalExam
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalExam $medicalExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ClinicaMedica\MedicalExam  $medicalExam
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalExam $medicalExam)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ClinicaMedica\MedicalExam  $medicalExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalExam $medicalExam)
    {
        $medicalExam = MedicalExam::find($request->get('exam_id'));
        $medicalExam->fill($request->all());
        $medicalExam->inputs = json_encode($request->get('inputs'));
        $medicalExam->status = count($request->get('inputs')) ? 'Activo': 'Inconpleto';
        $medicalExam->update();
        
        Alert::success('Los datos examen han sido guardados con exito!!','Examen');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ClinicaMedica\MedicalExam  $medicalExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalExam $medicalExam)
    {
        //
    }

    public function get_info(MedicalExam $medicalExam)
    {
        $areas = collect();
        foreach ($medicalExam->areas as $area) {
            $areas->push($area->id);
        }
        return response()->json([
            'exam'=>$medicalExam,
            'areas_id'=>$areas->toArray()
        ]);
    }
}
