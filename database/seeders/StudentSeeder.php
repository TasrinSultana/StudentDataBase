<?php

namespace Database\Seeders;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Student::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Student::create([
                's_id'   => $faker->numberBetween(1710000000, 2110000000),
                'name'   =>  $faker->name,
                'dept'   => $faker->randomElement(["CSE", "EEE", "MSE", "ICE", "ACCE", "Physics", "Chemistry", "Math", "Pharmacy"]),
                'address'=> $faker->address,
                'phone'  => $faker->phoneNumber,
            ]);
        }
    }
}
