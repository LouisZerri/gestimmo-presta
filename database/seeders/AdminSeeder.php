<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gestimmo-france.fr'],
            [
                'name' => 'Admin',
                'password' => Hash::make('ByroN.GESTIMMO2005'),
                'is_admin' => true,
            ]
        );
    }
}
