<?php

namespace ClinicaMedica\Http\Controllers;


use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\permission;
use Illuminate\Http\Request;
use DB;
use Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function _construct()
    {
        $this->middleware('permission:roles.create')->only(['create','store']);
        $this->middleware('permission:roles.index')->only('index');
        $this->middleware('permission:roles.edit')->only(['edit','update']);
        $this->middleware('permission:roles.show')->only('show');
        $this->middleware('permission:roles.destroy')->only('destroy');
            


    }
    public function index(Request $request)


    {


        //$this->middleware('permission:products.index');

        if($request){
            $query=trim($request->get('searchText'));

            $roles=DB::table('roles')
            ->where('name','LIKE','%'.$query.'%')
            //->where('estado_p','=','Activo') 
            ->orderBy('id','asc')
            ->paginate(10);


        //$roles=Role::paginate();

            $permissions=DB::table('permissions')->get();
            
         

        return view('roles.index',compact('roles'),["roles"=>$roles,"permissions"=>$permissions,"searchText"=>$query]);
    }


         //$this->middleware('permission:products.index');
        //$roles=Role::paginate();

        //return view('roles.index',compact('roles'));
    }

     public function create()

    {
        $permissions=Permission::get();
        return view('roles.create',compact('permissions'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $role=Role::create($request->all());

           ///actualizar permisos
        $role->permissions()->sync($request->get('permissions'));

        //return redirect()->route('roles.edit',$role->id)->with('info','Role guardado con exito');
       Alert::success('Registro guardado con exito!!','Role');
        return redirect()->back();
         //return redirect()->route('roles.edit',$role->id);

        //Alert::success('Registro guardado con exito!!','Role');
        //return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {

       // dd($product->id);
        return view('roles.show',compact('role'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions=Permission::get();
        return view('roles.edit',compact('role','permissions'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        

        //actualizar role
        $role->update($request->all());

        // en la siguiente linea estoy actualizar roles, es decir este usuario tiene muchos roles hay que sincronizarlo con los actuales

            ///actualizar permisos
        $role->permissions()->sync($request->get('permissions'));

         //return redirect()->route('roles.edit',$role->id)->with('info','Rol actualizado con exito');

       // return redirect()->route('roles.edit',$role->id);
        $role->update();
     Alert::success('Registro actualizado con exito!!','Role');
        return redirect()->back();
    
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        //return back()->with('info','Eliminado correctamente');
        return back();
    }
}
