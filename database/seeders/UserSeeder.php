<?php

namespace Database\Seeders;

use App\Models\Admin;
// use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //create user clients

    // $clients = Client::all();

    // $clients->each(function ($client) {
    //   User::factory()->create([
    //     "client_id" => $client->id,
    //     "username" => $client->email
    //   ]);
    // });

    // create user admin
    
    $admin = Admin::first();
    $admin_password = config("custom.admin_password"); // get env variable

    User::create([
      "user_type" => "admin",
      "admin_id" => $admin->id,
      "username" => $admin->email,
      "password" => Hash::make($admin_password)
    ]);
  }  
}
