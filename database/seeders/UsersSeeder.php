<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        User::create([
            'name'     => 'Admin Uks',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('ukssisehat'),
            'role'     => 'admin',
        ]);

        User::create([
            'name'     => 'Petugas UKS',
            'email'    => 'petugas@gmail.com',
            'password' => Hash::make('rahasia'),
            'role'     => 'petugas',
        ]);


    }
}
