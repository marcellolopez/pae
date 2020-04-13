<?php
use App\Role;
use Illuminate\Database\Seeder;
class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role = new Role;
        $role->name          = 'Enfermera';
        $role->save();

    
        $role = new Role;
        $role->name          = 'Comercial';
        $role->save();  
    }
}