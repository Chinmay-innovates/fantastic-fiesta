<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            "name"=> "Alex Voyager",
            "email"=> "user@example.com",
        ])->assignRole(RolesEnum::USER->value);

        User::factory()->create([
            "name"=> "Skylar Tradewind",
            "email"=> "vendor@example.com",
        ])->assignRole(RolesEnum::VENDOR->value);

        User::factory()->create([
            "name"=> "Nova Root",
            "email"=> "admin@example.com",
        ])->assignRole(RolesEnum::ADMIN->value);

    }
}
