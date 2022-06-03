<?php

namespace Database\Seeders;

use App\Models\Problem;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Target;
use App\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Target::factory(10)->create();
        Problem::factory(3)->create();
        Role::factory(3)->create();
        User::factory(5)->create();
        Permission::factory(10)->create();
    }
}
