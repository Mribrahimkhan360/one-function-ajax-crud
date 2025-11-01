<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use function Illuminate\Cache\table;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 140; $i++)
        {
            DB::table('merchants')->insert([
                'name'          => $faker->name,
                'phone'         => '01' .$faker->numberBetween(3,9) . $faker->randomNumber(8,true),
                'email'         => $faker->address,
                'store_name'    => $faker->company,
                'address' => '123 Main Street, Rajshahi',
                'store_code'    => 'ST' . str_pad($i,3,'0', STR_PAD_LEFT),
                'range'         => $faker->randomElement(['Dhaka Division', 'Chittagong Division', 'Sylhet Division', 'Khulna Division', 'Rajshahi Division']),
                'status'        => $faker->randomElement(['Active', 'Inactive']),
                'login_count'   => $faker->numberBetween(0,15),
                'created_at'    => now(),
                'updated_at'    => now(),
        ]);
        }
    }
}
