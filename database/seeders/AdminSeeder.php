<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'        => 'Admin',
            'surname'     => 'Administrador',
            'email'       => 'admin@ayuntamiento.es',
            'phone'       => '600000000',
            'address'     => 'Plaza del Ayuntamiento, 1',
            'city'        => 'Granada',
            'postal_code' => '18001',
            'password'    => Hash::make('admin1234'),
            'is_admin'    => true,
        ]);
    }
}