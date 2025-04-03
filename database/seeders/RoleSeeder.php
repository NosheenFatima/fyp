<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Create roles
                $adminRole = Role::firstOrCreate(['name' => 'admin']);
                $EmployeeRole = Role::firstOrCreate(['name' => 'Employee']);
                $jobSeekerRole = Role::firstOrCreate(['name' => 'jobSeeker']);
        
                // Create Admin User
                $admin = User::create([
                    'name' => 'Admin User',
                    'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        // Create Librarian User
        $Employee = User::create([
            'name' => 'employee',
            'email' => 'Employee@example.com',
            'password' => Hash::make('password'),
        ]);
        $Employee->assignRole($EmployeeRole);

        // Create Regular User
        $jobSeeker = User::create([
            'name' => 'Regular User',
            'email' => 'jobseeker@example.com',
            'password' => Hash::make('password'),
        ]);
        $jobSeeker->assignRole($jobSeeker);
    }

    
}
