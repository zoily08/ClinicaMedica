<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 


    Auth::routes();
    //login

    Route::get('/home', 'HomeController@index')->name('home'); 

///Routees 
 
Route::middleware('auth')->group(function(){


    //Roles
     Route::resource('roles','RoleController');

    Route::get('/examenes/get/{medicalExam}','MedicalExamController@get_info')->name('exams.get_info');

//////////////DECLARACION DE RUTAS PARA EL SISTEMA PARA ASIGNAR PERMISOS

                    /////////Rutas para User
Route::get('users','UserController@index')->name('users.index')
            ->middleware('permission:users.index');


    Route::put('users/{user}','UserController@update')->name('users.update')
            ->middleware('permission:users.edit');



    Route::get('users/{user}','UserController@show')->name('users.show')
            ->middleware('permission:users.show');



    Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
            ->middleware('permission:users.destroy');



    Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
            ->middleware('permission:users.edit');



        /////////Rutas para Roles
    Route::post('roles/store','RoleController@store')->name('roles.store')
            ->middleware('permission:roles.create');

    Route::get('roles','RoleController@index')->name('roles.index')
            ->middleware('permission:roles.index');

    Route::get('roles/create','RoleController@create')->name('roles.create')
            ->middleware('permission:roles.create');

    Route::put('roles/{id}','RoleController@update')->name('roles.update')
            ->middleware('permission:roles.edit');

    Route::get('roles/{id}','RoleController@show')->name('roles.show')
            ->middleware('permission:roles.show');

    Route::delete('roles/{id}','RoleController@destroy')->name('roles.destroy')
            ->middleware('permission:roles.destroy');

    Route::get('roles/{id}/edit','RoleController@edit')->name('roles.edit')
            ->middleware('permission:roles.edit');




});
/////////password

// Password Reset Routes.
////paar restaurar contraseñas por correo

Route::group(['prefix' => 'admin','namespace' => 'Auth'],function(){
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
   //Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPasswordController@reset');
   // Route::post('password/email', 'Auth/ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Route::post('password/email', 'Auth\PasswordController@postEmail');

});
////////////////////////

//codigo de envio de correo para recuperacion de contraseña

/*Route::group(['prefix' => 'admin','namespace' => 'Auth'],function(){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPasswordController@reset');
});*/

///////////////////////

///rutas de examenes

if ($options['register'] ?? true) {
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');
    }



    Route::get('/examenes/get/{medicalExam}','MedicalExamController@get_info')->name('exams.get_info');

    Route::get('area/get/examenes/{id}','AreaController@getExams')->name('area.get_exams');
    Route::post('paciente', 'PacienteController@storeNewPatient')->name('paciente.store_new_patient'); 
    Route::get('enfermedad/{id}','SintomasController@getEnfermedad');


   
    Route::get('consulta/consulta_medica/getenfermedad/{id}','ConsultaMedicaController@getEnfermedad');


    
Route::resource('registro/paciente','PacienteController');
Route::resource('users','UserController');
Route::resource('proveedor/producto','ProductoController'); 
Route::resource('proveedor/registro','ProveedorController');
Route::resource('consulta/consulta_medica','ConsultaMedicaController');
Route::resource('consulta/consulta_psicologica','ConsultaPsicologicaController');
Route::resource('consulta/Tipoconsulta','tipoconsultaController');
Route::resource('consulta/diagnostico','diagnosticoController');
Route::resource('compras/ingreso','CompraController');
Route::resource('ventas/venta','VentaController');
Route::resource('sintomas','SintomasController'); 
Route::resource('signos/signos_vitales','SignosVitalesController');
Route::resource('users','UserController');
Route::resource('consultorio','ConsultorioController');
Route::resource('especialidad','EspecialidadController');
Route::resource('medico','MedicoController');
Route::resource('citas','CitasController');
Route::resource('area', 'AreaController');
Route::resource('exams', 'MedicalExamController');
Route::resource('enfermedad','EnfermedadController');
Route::resource('consulta/especificacion','EspecificacionController');

Route::post('sint_enf','SintomasController@sint_enf')->name('sint_enf.sint_enf');



//////rutas de laboratory

Route::get('laboratory/order', 'LaboratoryController@exam_order_index')->name('laboratory.order');
Route::patch('laboratory/order/update/{order}', 'LaboratoryController@updateOrder')->name('laboratory.update_order');
Route::get('laboratory/order/{id}', 'LaboratoryController@exam_order_data')->name('laboratory.order_data');
Route::get('laboratory/get/patient/{id}', 'LaboratoryController@getPatient')->name('laboratory.get_patient');
Route::post('laboratory/order', 'LaboratoryController@exam_order_store')->name('laboratory.order_store');
Route::post('laboratory/order/add_patient', 'LaboratoryController@add_patient')->name('laboratory.add_patient');
Route::resource('laboratory', 'LaboratoryController');

Route::get('auth','UserController@create')->name('auth.register');



///////////////reportes
Route::get('user-list-pdf','UserController@exportPdf')->name('users.pdf');
Route::get('user-list-excel',    'UserController@exportExcel')->name('users.excel');
Route::get('paciente-list-pdf','PacienteController@exportPdf')->name('paciente.pdf');
Route::get('paciente-list-excel',    'PacienteController@exportExcel')->name('paciente.excel');
Route::get('producto-list-pdf','ProductoController@exportPdf')->name('producto.pdf');
Route::get('proveedor-list-pdf','ProveedorController@exportPdf')->name('proveedor.pdf');




////////////////////////////////////////






