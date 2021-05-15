<?php

namespace ClinicaMedica\Http\Controllers;

use ClinicaMedica\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use DB;
use ClinicaMedica\Http\Requests;
use ClinicaMedica\Users; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; 
use ClinicaMedica\Http\Requests\UserFormRequest;
use Barryvdh\DomPDF\Facade as PDF;

use Maatwebsite\Excel\Facades\Excel;
use ClinicaMedica\Exports\UsersExport;
use Illuminate\Support\Facades\Hash;

use Alert;





class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 public function _construct()
    {
    
        $this->middleware('permission:users.create')->only(['create','store']);
        $this->middleware('permission:users.index')->only('index');
        $this->middleware('permission:users.edit')->only(['edit','update']);
        $this->middleware('permission:users.show')->only('show');
        $this->middleware('permission:users.destroy')->only('destroy');
          


    }


    public function exportPdf()
    {
        $users = User::get();
        $pdf   = PDF::loadView('pdf.users', compact('users'));

        return $pdf->download('user-list.pdf');
    }



    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'user-list.xlsx');
    }





    public function index(Request $request)


    {

        if($request){
            $query=trim($request->get('searchText'));
             
            $users=DB::table('users')
            ->where('name','LIKE','%'.$query.'%')
            //->where('estado_p','=','Activo')
            ->orderBy('id','desc')
            ->paginate(10);

        // $this->middleware('permission:roles.index');
         $roles=DB::table('roles')->get();
        //$users=User::paginate();

        //return view('users.index',compact('users'));

        // return view('users.index',compact('users'),"searchText"=>$query);
         return view('users.index',["users"=>$users,"roles"=>$roles,"searchText"=>$query]);
        
        }

    }

     
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  \ClinicaMedicaas\Product  $product
     * @return \Illuminate\Http\Response
     */


     public function create()
    {

       // dd($product->id);
        return view("auth.register");
       
        
    }


    public function store(UserFormRequest $request){
        $user=new User;
        $user->name=$request->get('name');
        $user->apellidos=$request->get('apellidos');
        $user->direccion=$request->get('direccion');
        $user->fechanacimiento=$request->get('fechanacimiento');
        $user->edad=$request->get('edad');
        $user->telefono=$request->get('telefono'); 
        
        $user->email=$request->get('email');
         //'password' => Hash::make($data['password']),
        $user->password=bcrypt($request['password']);

        // $user->password=$request=>Hash::make($request->get('password')),
        
        //$user->password=$request->request->add(['password'=>Hash::make($request->input('password'))]);
       
        $user->estado='ACTIVO';
        $user->save();
        
        return Redirect::to('users');  
    }


    public function show(User $user)
    {

       // dd($product->id);
        return view('users.show',compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ClinicaMedicaas\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    { 
       // $roles=Role::get();
       // return view('users.edit',compact('user','roles'));
        //return view('users.edit', ["users"=>user::findOrFail($user)],compact('user','roles'));

         //return view('users.edit', ["users"=>user::findOrFail($user)]);

         $roles=Role::get();
        return view('users.edit',compact('user','roles'));

        


        //return view("registro.paciente.edit", ["paciente"=>Paciente::findOrFail($id)]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ClinicaMedicaas\Product  $product
     * @return \Illuminate\Http\Response
     */
   /* public function update(Request $request, User $user)
    {

        //actualice el usuario
        //actualice los roles

        //actualizar el usuario
        
        $user->update($request->all());

       // Alert::success('Registro guardado con exito!!','User');

        // en la siguiente linea estoy actualizar roles, es decir este usuario tiene muchos roles hay que sincronizarlo con los actuales

        $user->roles()->sync($request->get('roles'));
        //Alert::success('Registro guardado con exito!!','User');
        //return redirect()->back();

         //return redirect()->route('users.edit',$user->id)->with('info','Usuario actualizado con exito');


        

        Alert::success('Registro guardado con exito!!','User');
        //return redirect()->back();

        return Redirect::to('users');


        //return redirect()->route('users.edit',$user->id);
    }*/

    public function update(Request $request, User $user){
        
        //$user=User::findOrFail($id);
        //$user->name=$request->get('name');
        //$user->apellido=$request->get('apellido');
        //$user->direccion=$request->get('direccion');
        //$user->fechanacimiento=$request->get('fechanacimiento');
        //$user->edad=$request->get('edad');
       // $user->telefono=$request->get('telefono'); 
        //$user->email=$request->get('email');
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));

       // $user->update();

        //$user->roles()->sync($request->get('roles'));
       //Alert::warning('El Paciente '. $paciente->nombre_p.' ha sido actualizado con exito!!','Paciente');
        //return redirect()->back();
        //Alert::success('Registro guardado con exito!!','User');
      // return Redirect::to('users');
       // return redirect()->route('users.edit',$user->id)
       // ->with('info','Actulizado');
       // return redirect()->route('users.edit',$user->id)
     //  ->with('info','Actulizado');
 // Alert::warning('El Usuario ' . $user->id . ' ha sido actualizado con exito!!', 'Usuario');
        //return redirect()->back();

        return Redirect::to('users');

        //$paciente->estado_p=$request->get('estado_p');
    }

    public function update2(UserFormRequest2 $request,$id){
        
        $user=User2::findOrFail($id);
        $user->password=$request->get('password');
        
        //$user->email=$request->get('email');

        $user->update();

        $user->roles()->sync($request->get('roles'));
       //Alert::warning('El Paciente '. $paciente->nombre_p.' ha sido actualizado con exito!!','Paciente');
        //return redirect()->back();
        Alert::success('Registro guardado con exito!!','User2');
       return Redirect::to('users');


        //$paciente->estado_p=$request->get('estado_p');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ClinicaMedicaas\Product  $product
     * @return \Illuminate\Http\Response
     */
   /* public function destroy(User $user)
    {
        $user->delete();
        //return back()->with('info','Eliminado correctamente');

        return back();

    }*/

        public function destroy(User $user)
    {
        $user->delete();
        //return back()->with('info','Eliminado correctamente');

         return back();
    }
    
}
