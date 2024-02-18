<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'Admin']);

        Permission::create(['name'=>'dashboard', 'description'=>'Ver dashboard'])->assignRole($role1);

        Permission::create(['name'=>'categories.index', 'description'=>'Ver categorías'])->assignRole($role1);
        Permission::create(['name'=>'categories.create', 'description'=>'Agregar categorías'])->assignRole($role1);
        Permission::create(['name'=>'categories.edit', 'description'=>'Editar categorías'])->assignRole($role1);
        Permission::create(['name'=>'categories.destroy', 'description'=>'Eliminar categorías'])->assignRole($role1);

        Permission::create(['name'=>'products.index', 'description'=>'Ver productos'])->assignRole($role1);
        Permission::create(['name'=>'products.create', 'description'=>'Agregar productos'])->assignRole($role1);
        Permission::create(['name'=>'products.edit', 'description'=>'Editar productos'])->assignRole($role1);
        Permission::create(['name'=>'products.destroy', 'description'=>'Eliminar productos'])->assignRole($role1);

        Permission::create(['name'=>'orders.index', 'description'=>'Ver pedidos'])->assignRole($role1);
        Permission::create(['name'=>'orders.deliver', 'description'=>'Entregar pedidos'])->assignRole($role1);
        Permission::create(['name'=>'orders.destroy', 'description'=>'Eliminar pedidos'])->assignRole($role1);

        Permission::create(['name'=>'sales.index', 'description'=>'Ver ventas'])->assignRole($role1);
        Permission::create(['name'=>'sales.destroy', 'description'=>'Eliminar ventas'])->assignRole($role1);

        Permission::create(['name'=>'users.index', 'description'=>'Ver usuarios'])->assignRole($role1);
        Permission::create(['name'=>'users.create', 'description'=>'Crear usuarios'])->assignRole($role1);
        Permission::create(['name'=>'users.edit', 'description'=>'Editar usuarios'])->assignRole($role1);
        Permission::create(['name'=>'users.destroy', 'description'=>'Eliminar usuarios'])->assignRole($role1);

        Permission::create(['name'=>'roles.index', 'description'=>'Ver roles'])->assignRole($role1);
        Permission::create(['name'=>'roles.create', 'description'=>'Agregar roles'])->assignRole($role1);
        Permission::create(['name'=>'roles.edit', 'description'=>'Editar roles'])->assignRole($role1);
        Permission::create(['name'=>'roles.destroy', 'description'=>'Eliminar roles'])->assignRole($role1);

        Permission::create(['name'=>'profile.edit', 'description'=>'Editar perfil'])->assignRole($role1);
    }
}
