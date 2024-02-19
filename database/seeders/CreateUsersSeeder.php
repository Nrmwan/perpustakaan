<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'userName'=>'User',
               'namaLengkap'=>'User Peminjam',
               'no_tlp'=>'089388237462',
               'alamat'=>'Salatiga',
               'email'=>'user@gmail.com',
               'type'=>0,
               'password'=> bcrypt('12345678'),
            ],
            [
               'userName'=>'Admin',
               'namaLengkap'=>'Admin User',
               'no_tlp'=>'089388237462',
               'alamat'=>'Salatiga',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('12345678'),
            ],
            [
               'userName'=>'Petugas',
               'namaLengkap'=>'Petugas User',
               'no_tlp'=>'089388237462',
               'alamat'=>'Salatiga',
               'email'=>'petugas@gmail.com',
               'type'=>2,
               'password'=> bcrypt('12345678'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}