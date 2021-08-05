<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        foreach(Module::getOrdered() as $modulo){
            Permission::firstOrCreate(['name' => Str::slug($modulo->getName()) . '.view']);
            Permission::firstOrCreate(['name' => Str::slug($modulo->getName()) . '.create']);
            Permission::firstOrCreate(['name' => Str::slug($modulo->getName()) . '.update']);
            Permission::firstOrCreate(['name' => Str::slug($modulo->getName()) . '.delete']);
        }

        Permission::firstOrCreate(['name' => 'roles.view']);
        Permission::firstOrCreate(['name' => 'roles.create']);
        Permission::firstOrCreate(['name' => 'roles.update']);
        Permission::firstOrCreate(['name' => 'roles.delete']);

        Role::firstOrCreate(['name' => 'Super Admin']);

    }
}
