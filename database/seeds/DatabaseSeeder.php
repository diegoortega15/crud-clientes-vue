<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Diego Ortega Pereira',
            'email'     => 'teste@teste.com',
            'password'  =>  bcrypt('123456'),
        ]);
    }
}
