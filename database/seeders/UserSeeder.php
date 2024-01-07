<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@edu-emsi.ma',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ]);

        User::factory(9)->create();
    }
}
