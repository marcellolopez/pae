<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\RoleUser;
use App\Estado;
use App\Entities\Paciente;
use App\Entities\Consulta;
use App\Entities\MotivoConsulta;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
	public function run()
	{
	    //$this->call(RoleTableSeeder::class);
        $user = new User;
        $user->nombres          = 'Marcello';
        $user->apellido_paterno = 'López';
        $user->apellido_materno = 'Cáceres';
        $user->rut      = '16366326';
        $user->telefono = '974163322';
        $user->email    = 'mlc74163322@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();

        $user = new User;
        $user->nombres          = 'Departamento';
        $user->apellido_paterno = 'área';
        $user->apellido_materno = 'Comercial';
        $user->rut      = '11111111';
        $user->telefono = '974163322';
        $user->email    = 'mlopez@cetep.cl';
        $user->password = Hash::make('123456');
        $user->save();  

        $role = new Role;
        $role->name          = 'Enfermera';
        $role->description    = 'Enfermera';
        $role->save();

    
        $role = new Role;
        $role->name          = 'Comercial';
        $role->description    = 'Comercial';
        $role->save();   

        $motivo_consulta = new MotivoConsulta;
        $motivo_consulta->motivo          = 'Psicología Adulto';
        $motivo_consulta->save();   

        $motivo_consulta = new MotivoConsulta;
        $motivo_consulta->motivo          = 'Psicología Infanto-Juvenil';
        $motivo_consulta->save();           

        $role_user = new RoleUser;
        $role_user->user_id          = 1;
        $role_user->role_id          = 1;
        $role_user->save();

    
        $role_user = new RoleUser;
        $role_user->user_id          = 2;
        $role_user->role_id          = 2;
        $role_user->save();

        $estado = new Estado;
        $estado->estado          = 'Enviado';
        $estado->save();        

        $estado = new Estado;
        $estado->estado          = 'En Gestión';
        $estado->save();     

        $estado = new Estado;
        $estado->estado          = 'Cerrado';
        $estado->save();     

        $paciente = new Paciente;
        $paciente->activo = true;
        $paciente->nombres          = 'Claudio';
        $paciente->apellidoPaterno = 'Pinto';
        $paciente->apellidoMaterno = 'Villegas';
        $paciente->rut      = '16366326';
        $paciente->telefono = '695312522';
        $paciente->email    = 'Claudio@gmail.com';
        $paciente->save(); 

        $consulta = new Consulta;
        $consulta->user_id = 1;
        $consulta->paciente_id = $paciente->id;
        $consulta->motivo_consulta_id = 1;
        $consulta->estado_id = 1;
        $consulta->fecha_enviado = now();
        $consulta->comentario = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ";
        $consulta->save(); 
          

        $paciente = new Paciente;
        $paciente->activo = true;
        $paciente->nombres          = 'Marta María';
        $paciente->apellidoPaterno = 'Salgado';
        $paciente->apellidoMaterno = 'Cáceres';
        $paciente->rut      = '5548224';
        $paciente->telefono = '657851322';
        $paciente->email    = 'maratisalgado@hotmail.com';
        $paciente->save();  

        $consulta = new Consulta;
        $consulta->user_id = 1;
        $consulta->paciente_id = $paciente->id;
        $consulta->motivo_consulta_id = 1;
        $consulta->estado_id = 1;
        $consulta->fecha_enviado = now();
        $consulta->comentario = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ";
        $consulta->save(); 


        $paciente = new Paciente;
        $paciente->activo = true;
        $paciente->nombres          = 'Jorge';
        $paciente->apellidoPaterno = 'Prado';
        $paciente->apellidoMaterno = 'Fuentes';
        $paciente->rut      = '10523656';
        $paciente->telefono = '747785954';
        $paciente->email    = 'jorfe@gmail.com';
        $paciente->save(); 

        $consulta = new Consulta;
        $consulta->user_id = 1;
        $consulta->paciente_id = $paciente->id;
        $consulta->motivo_consulta_id = 1;
        $consulta->estado_id = 1;
        $consulta->fecha_enviado = now();
        $consulta->comentario = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ";
        $consulta->save(); 
          

        $paciente = new Paciente;
        $paciente->activo = true;
        $paciente->nombres          = 'Soledad';
        $paciente->apellidoPaterno = 'Pino';
        $paciente->apellidoMaterno = 'Contreras';
        $paciente->rut      = '9658745';
        $paciente->telefono = '748574585';
        $paciente->email    = 'soledadpino@hotmail.com';
        $paciente->save();

        $consulta = new Consulta;
        $consulta->user_id = 1;
        $consulta->paciente_id = $paciente->id;
        $consulta->motivo_consulta_id = 1;
        $consulta->estado_id = 1;
        $consulta->fecha_enviado = now();
        $consulta->comentario = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ";
        $consulta->save(); 
                             



        $paciente = new Paciente;
        $paciente->activo = true;
        $paciente->nombres          = 'Claudio';
        $paciente->apellidoPaterno = 'Pinto';
        $paciente->apellidoMaterno = 'Villegas';
        $paciente->rut      = '16366326';
        $paciente->telefono = '256986522';
        $paciente->email    = 'Claudio@gmail.com';
        $paciente->save(); 

        $consulta = new Consulta;
        $consulta->user_id = 1;
        $consulta->paciente_id = $paciente->id;
        $consulta->motivo_consulta_id = 1;
        $consulta->estado_id = 1;
        $consulta->fecha_enviado = now();
        $consulta->comentario = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ";
        $consulta->save(); 
          

        $paciente = new Paciente;
        $paciente->activo = true;
        $paciente->nombres          = 'Marta María';
        $paciente->apellidoPaterno = 'Salgado';
        $paciente->apellidoMaterno = 'Cáceres';
        $paciente->rut      = '5548224';
        $paciente->telefono = '658547215';
        $paciente->email    = 'maratisalgado@hotmail.com';
        $paciente->save();  


        $consulta = new Consulta;
        $consulta->user_id = 1;
        $consulta->paciente_id = $paciente->id;
        $consulta->motivo_consulta_id = 1;
        $consulta->estado_id = 1;
        $consulta->fecha_enviado = now();
        $consulta->comentario = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ";
        $consulta->save(); 
        

        $paciente = new Paciente;
        $paciente->activo = true;
        $paciente->nombres          = 'Jorge';
        $paciente->apellidoPaterno = 'Prado';
        $paciente->apellidoMaterno = 'Fuentes';
        $paciente->rut      = '10523656';
        $paciente->telefono = '875421578';
        $paciente->email    = 'jorfe@gmail.com';
        $paciente->save();   

        $consulta = new Consulta;
        $consulta->user_id = 1;
        $consulta->paciente_id = $paciente->id;
        $consulta->motivo_consulta_id = 1;
        $consulta->estado_id = 1;
        $consulta->fecha_enviado = now();
        $consulta->comentario = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ";
        $consulta->save(); 
        

        $paciente = new Paciente;
        $paciente->activo = true;
        $paciente->nombres          = 'Soledad';
        $paciente->apellidoPaterno = 'Pino';
        $paciente->apellidoMaterno = 'Contreras';
        $paciente->rut      = '9658745';
        $paciente->telefono = '414578745';
        $paciente->email    = 'soledadpino@hotmail.com';
        $paciente->save(); 

        $consulta = new Consulta;
        $consulta->user_id = 1;
        $consulta->paciente_id = $paciente->id;
        $consulta->motivo_consulta_id = 1;
        $consulta->estado_id = 1;
        $consulta->fecha_enviado = now();
        $consulta->comentario = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ";
        $consulta->save(); 
                 
	}
}
