<?php

namespace Database\Seeders;

use App\Enums\Status;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@eaglenetwork.com'
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
