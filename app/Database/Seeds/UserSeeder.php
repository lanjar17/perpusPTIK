<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i<10; $i++){
            $data = [
                'nama'    => $faker->name,
                'alamat'    => $faker->address,
                'tempat_lahir'    => $faker->city,
                'tanggal_lahir'    => $faker->date($format = 'Y-m-d', $max = 'now'),
                'jenis_kelamin'    => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'telepon'    => $faker->phoneNumber,
                'email'    => $faker->email,
                'username'    => $faker->username,
                'password'    => $faker->password,
                'avatar'    => $faker->imageUrl($width = 640, $height = 480),
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ];

            // Using Query Builder
            $this->db->table('users')->insert($data);
        }
        
        
    }
}
