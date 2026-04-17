<?php

namespace Database\Seeders;

use App\Enums\Status;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'eagle@network.com',
        // ]);

        User::updateOrCreate(
            [
                'email' => 'eagle@network.com'
            ],
            [
                'name' => 'Admin',
                'type' => UserType::ADMIN->value,
                'status' => Status::ACTIVE->value,
                'password' => Hash::make('Eagle@123'),
            ]
        );
    }
}