<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@test',
            'password' => Hash::make('11111111'),
        ]);

        $user->assignRole('admin');

        $user->member()->create();
    }
}
