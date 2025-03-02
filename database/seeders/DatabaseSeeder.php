<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::create([
      'name' => 'Super Admin',
      'email' => 'superadmin@example.com',
      'username' => 'superadmin',
      'password' => Hash::make('password'),
      'email_verified_at' => now(),
      'remember_token' => Str::random(10),
      'role' => 'superadmin'
    ]);

    User::create([
      'name' => 'Admin',
      'email' => 'admin@example.com',
      'username' => 'admin',
      'password' => Hash::make('password'),
      'email_verified_at' => now(),
      'remember_token' => Str::random(10),
      'role' => 'admin'
    ]);
  }
}
