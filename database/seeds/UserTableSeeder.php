<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => bcrypt('admin123'),
        ]);
    }
}
