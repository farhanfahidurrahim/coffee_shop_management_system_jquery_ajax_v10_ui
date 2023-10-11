<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Farhan Fahidur Rahim',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' =>  Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
