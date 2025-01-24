<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create(
            ['name' => 'admin', 'email' => 'admin@softui.com', 'password' => Hash::make('secret')],
        );
        
        $this->call(NivelSeeder::class);
        $this->call(ParroquiaSeeder::class);
        $this->call(CircuitoSeeder::class);
        $this->call(MisionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
