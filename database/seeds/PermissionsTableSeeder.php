<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      ///permisos  por rutas

      //de medicos
      
        Permission::create([
         ///Navega
          'name'=>'Navegar Medicos',
          'slug'=>'medicos.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Medicos',
          'slug'=>'medicos.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Medicos',
          'slug'=>'medicos.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Medicos',
          'slug'=>'medicos.destroy',
          ]);

          //de consultorio
      
        Permission::create([
         ///Navega
          'name'=>'Navegar Consultorio',
          'slug'=>'consultorio.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Consultorio',
          'slug'=>'consultorio.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Consultorio',
          'slug'=>'consultorio.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Consultorio',
          'slug'=>'consultorio.destroy',
          ]);

        //de especialidad
      
        Permission::create([
         ///Navega
          'name'=>'Navegar Especialidad',
          'slug'=>'especialidad.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Especialidad',
          'slug'=>'especialidad.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Especialidad',
          'slug'=>'especialidad.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Especialidad',
          'slug'=>'especialidad.destroy',
          ]);

          //de sintomas
        Permission::create([
         ///Navega
          'name'=>'Navegar Sintomas',
          'slug'=>'sintomas.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Sintomas',
          'slug'=>'sintomas.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Sintomas',
          'slug'=>'sintomas.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Sintomas',
          'slug'=>'sintomas.destroy',
          ]);

          //de consulta
        Permission::create([
         ///Navega
          'name'=>'Navegar Consulta',
          'slug'=>'consulta.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Consulta',
          'slug'=>'consulta.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Consulta',
          'slug'=>'consulta.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Consulta',
          'slug'=>'consulta.destroy',
          ]);

          //de area
        Permission::create([
         ///Navega
          'name'=>'Navegar Area',
          'slug'=>'area.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Area',
          'slug'=>'area.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Area',
          'slug'=>'area.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Area',
          'slug'=>'area.destroy',
          ]);


         //de Examnes
        Permission::create([
         ///Navega
          'name'=>'Navegar Examen',
          'slug'=>'examen.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Examen',
          'slug'=>'examen.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Examen',
          'slug'=>'examen.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Examen',
          'slug'=>'examen.destroy',
          ]);


        //de Pproductos
        Permission::create([
         ///Navega
          'name'=>'Navegar Productos',
          'slug'=>'proveedor.producto.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Productos',
          'slug'=>'proveedor.producto.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Productos',
          'slug'=>'proveedor.producto.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Productos',
          'slug'=>'proveedor.producto.destroy',
          ]);


         //de Proveedores
        Permission::create([
         ///Navega
          'name'=>'Navegar Proveedores',
          'slug'=>'proveedor.registro.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Proveedores',
          'slug'=>'proveedor.registro.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Proveedores',
          'slug'=>'proveedor.registro.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Proveedores',
          'slug'=>'proveedor.registro.destroy',
          ]);

         //de Compras
        Permission::create([
         ///Navega
          'name'=>'Navegar Compras',
          'slug'=>'compras.ingreso.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Compras',
          'slug'=>'compras.ingreso.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Compras',
          'slug'=>'compras.ingreso.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Compras',
          'slug'=>'compras.ingreso.destroy',
          ]);


         //de Ventas
        Permission::create([
         ///Navega
          'name'=>'Navegar Venta',
          'slug'=>'ventas.venta.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Venta',
          'slug'=>'ventas.venta.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Venta',
          'slug'=>'ventas.venta.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Venta',
          'slug'=>'ventas.venta.destroy',
          ]);

           //de Paciente
        Permission::create([
         ///Navega
          'name'=>'Navegar Paciente',
          'slug'=>'registro.paciente.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Paciente',
          'slug'=>'registro.paciente.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Paciente',
          'slug'=>'registro.paciente.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Paciente',
          'slug'=>'registro.paciente.destroy',
          ]);


           //de Signo Vitales
        Permission::create([
         ///Navega
          'name'=>'Navegar Signos_Vitales',
          'slug'=>'signos.signos_vitales.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Signos_Vitales',
          'slug'=>'signos.signos_vitales.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Signos_Vitales',
          'slug'=>'signos.signos_vitales.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Signos_Vitales',
          'slug'=>'signos.signos_vitales.destroy',
          ]);

          //de Citas Medicas
        Permission::create([
         ///Navega
          'name'=>'Navegar Citas_Medicas',
          'slug'=>'citas.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Citas_Medicas',
          'slug'=>'citas.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Citas_Medicas',
          'slug'=>'citas.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Citas_Medicas',
          'slug'=>'citas.destroy',
          ]);

          //de ConsultaMedica
        Permission::create([
         ///Navega
          'name'=>'Navegar Consulta_Medica',
          'slug'=>'consulta.consulta_medica.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Consulta_Medica',
          'slug'=>'consulta.consulta_medica.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Consulta_Medica',
          'slug'=>'consulta.consulta_medica.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Consulta_Medica',
          'slug'=>'consulta.consulta_medica.destroy',
          ]);


         //de ConsultaPsicologica
        Permission::create([
         ///Navega
          'name'=>'Navegar Consulta_Psicologica',
          'slug'=>'consulta.consulta_psicologica.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Consulta_Psicologica',
          'slug'=>'consulta.consulta_psicologica.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Consulta_Psicologica',
          'slug'=>'consulta.consulta_psicologica.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Consulta_Psicologica',
          'slug'=>'consulta.consulta_psicologica.destroy',
          ]);



         //de Ordenes de Examenes
        Permission::create([
         ///Navega
          'name'=>'Navegar Ordenes_Examenes',
          'slug'=>'laboratorio.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Ordenes_Examenes',
          'slug'=>'laboratorio.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Ordenes_Examenes',
          'slug'=>'laboratorio.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Ordenes_Examenes',
          'slug'=>'laboratorio.destroy',
          ]);



         //de Resultados
        Permission::create([
         ///Navega
          'name'=>'Navegar Resultados_Examenes',
          'slug'=>'laboratory.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Resultados_Examenes',
          'slug'=>'laboratory.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Resultados_Examenes',
          'slug'=>'laboratory.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Resultados_Examenes',
          'slug'=>'laboratory.destroy',
          ]);


          //de Usuarios
        Permission::create([
         ///Navega
          'name'=>'Navegar Usuarios',
          'slug'=>'users.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Usuarios',
          'slug'=>'users.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Usuarios',
          'slug'=>'users.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Usuarios',
          'slug'=>'users.destroy',
          ]);


           //de Roles
        Permission::create([
         ///Navega
          'name'=>'Navegar Roles',
          'slug'=>'roles.index',
          ]);

        Permission::create([
         ///agrega
          'name'=>'Agregar Roles',
          'slug'=>'roles.create',

          ]);

        Permission::create([
         ///edita
          'name'=>'Editar Roles',
          'slug'=>'roles.edit',
          ]);

         Permission::create([
         ///edita
          'name'=>'Eliminar Roles',
          'slug'=>'roles.destroy',
          ]);









        





    }
}
