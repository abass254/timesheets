<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //emp type'1'System Admin','2':'Fixed Term' ; '3':'Consultancy'
        DB::table('users')->insert([
            'first_name' => 'Super',
            'last_name' => 'Administrator',
            'username' => 'super_admin',
            'is_supervisor' => 1,
            'emp_type' => 1,
            'is_superuser' => 1,
            'is_active' => 1,
            'date_joined' => '23-01-2023',
            'department' => 1,
            'email' => 'admin@relicon.com',
            'emp_id' => 'EMP001',
            'company' => 1,
            'password' => bcrypt('11223344'),
        ]);
    }
}