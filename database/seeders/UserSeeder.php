<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pedro Raposo',
            'email' => 'pedroraposo@ufrrj.br',
            'email_verified_at' => now(),
            'password' => bcrypt('trindade')
        ]);

        User::create([
            'name' => 'David Machado',
            'email' => 'david_machado@ufrrj.br',
            'email_verified_at' => now(),
            'password' => bcrypt('trindade')
        ]);

        User::create([
            'name' => 'Victor de Oliveira',
            'email' => 'zvictor_rpd@ufrrj.br',
            'email_verified_at' => now(),
            'password' => bcrypt('trindade')
        ]);
    }
}
