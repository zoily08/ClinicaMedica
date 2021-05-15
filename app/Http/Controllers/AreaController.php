<?php

namespace ClinicaMedica\Http\Controllers;

use ClinicaMedica\Area; 
use Illuminate\Http\Request;
Use Alert;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function _construct()
    {
         
            $this->middleware('permission:area.create')->only(['create','store']);
            $this->middleware('permission:area.index')->only('index');
            $this->middleware('permission:area.edit')->only(['edit','update']);
            $this->middleware('permission:area.show')->only('show');
            $this->middleware('permission:area.destroy')->only('destroy');
                    


    }

    public function index(Request $request)
    {
        $searchText = $request->get('searchText');

        return view('area.index') 
        ->with('searchText',$searchText)
        ->with('areas',Area::orderBy('id','ASC')->search($searchText)->get());
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
        $area = new Area;
        $area->fill($request->all());
        $area->save();
        Alert::success('La nueva area ha sido guardada con exito!!','Area');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ClinicaMedica\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ClinicaMedica\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ClinicaMedica\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $area->fill($request->all());
        $area->update();
        Alert::success('La area '. $area->name.' ha sido actualizada con exito!!','Area');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ClinicaMedica\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        if (!$area->exams->count()) {
            $area->status = $area->status ? false : true;
            $area->update();
            return response()->json([
                "error"=> false,
                "msg" => ($area->status)? 'El area fue habilitada con exito':'El area fue deshabilitada con exito',
                'num'=>$area->exams->count()
            ]);
        }
        return response()->json([
            "error" => true,
            "msg"=> 'No es posible deshabilitar un area con examenes'
        ]);
    }

    public function getExams($id)
    {
        return response()->json([
            'exams' => Area::find($id)->exams
        ]);
    }
}
