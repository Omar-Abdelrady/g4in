<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'email' => 'omar@admin.com',
            'password' => Hash::make('12345678'),
            'name' => 'Omar Abdelrady',
            'is_super_admin' => true
        ]);
    }
}
