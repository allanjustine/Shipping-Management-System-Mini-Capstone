<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'profile_image'=> null,
            'name' => 'Admin',
            'address'=> 'Manila',
            'phone'=> '09634622',
            'age'=> '25',
            'gender'=> 'Male',
            'birthday'=> null,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123')
        ])->assignRole('Admin', 'User')
            ->givePermissionTo('manage-all','customer',);

        User::factory()->create([
            'profile_image'=> null,
            'name' => 'Mary Rose Montebon',
            'address'=> 'Bohol',
            'phone'=> '0912345',
            'age'=> '20',
            'gender'=> 'Female',
            'birthday'=> null,
            'email' => 'maryrose@gmail.com',
            'password' => bcrypt('password123')
        ])->assignRole('User')
            ->givePermissionTo('customer');
    }
}
