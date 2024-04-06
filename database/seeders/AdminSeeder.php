<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $name = config("custom.admin_name");
    $last_name = config("custom.admin_last_name");
    $email = config("custom.admin_email");

    Admin::create([
      "first_name" => $name,
      "last_name" => $last_name,
      "email" => $email
    ]);
  }
}
