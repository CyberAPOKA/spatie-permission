<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Core\Constants\UserRole;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = [
            ['name' => 'Master User', 'email' => 'master@hotmail.com', 'role' => 'master'],
            ['name' => 'Service User', 'email' => 'service@hotmail.com', 'role' => 'service'],
            ['name' => 'Financial User', 'email' => 'financial@hotmail.com', 'role' => 'financial'],
            ['name' => 'Marketing User', 'email' => 'marketing@hotmail.com', 'role' => 'marketing'],
            ['name' => 'Organizer User', 'email' => 'organizer@hotmail.com', 'role' => 'organizer'],
            ['name' => 'Influencer User', 'email' => 'influencer@hotmail.com', 'role' => 'influencer'],
            ['name' => 'Athlete User', 'email' => 'athlete@hotmail.com', 'role' => 'athlete'],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password'),
            ]);

            $user->assignRole($userData['role']);
        }

        // foreach (UserRole::$labels as $role => $label) {
        //     $label = mb_strtolower($label);
        //     $email = str_replace(' ', '', $label) . '@hotmail.com';

        //     DB::table('users')->insert([
        //         'name' => $label,
        //         'email' => $email,
        //         'password' => Hash::make('123123123'),
        //         'role' => $role,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // foreach (range(1, 10) as $index) {
        //     DB::table('users')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' => Hash::make('password'),
        //         'role' => $faker->randomElement(UserRole::values()),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
