<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // 1. Crear o actualizar el usuario admin
        $admin = User::updateOrCreate(
            ['email' => 'estradaluis@gmail.com'],
            [
                'name' => 'Administrador',
                'email' => 'estradaluis@gmail.com',
                'password' => Hash::make('proyecto123'),
            ]
        );

        // 2. Crear el rol 'admin' si no existe
        $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // 3. Asignar el rol al usuario
        $admin->assignRole($role);
    }
}
