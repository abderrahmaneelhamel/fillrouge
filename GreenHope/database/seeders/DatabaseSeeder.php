<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::factory()->create([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
            $role = ModelsRole::create(['name' => 'Admin']);
            $user->assignRole($role);

        \App\Models\category::factory(1)->create();
        \App\Models\donations::factory(1)->create();
        \App\Models\events::factory(1)->create();
        \App\Models\needs::factory(1)->create();    
    }
}
