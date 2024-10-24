<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $teacherRole = Role::create(['name' => 'teacher']);
        $studentRole = Role::create(['name' => 'student']);

    

        // Assign permissions to roles
        $adminRole->givePermissionTo('manage courses');
        $adminRole->givePermissionTo('view courses');

        $teacherRole->givePermissionTo('manage courses');
        $teacherRole->givePermissionTo('view courses');

        $studentRole->givePermissionTo('view courses');

        // Create Users
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'Admin@devbunch.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole($adminRole);

        $teacher = User::create([
            'name' => 'Teacher User',
            'email' => 'Teacher@devbunch.com',
            'password' => bcrypt('12345678'),
        ]);
        $teacher->assignRole($teacherRole);

        $student = User::create([
            'name' => 'Student User',
            'email' => 'Student@devbunch.com',
            'password' => bcrypt('12345678'),
        ]);
        $student->assignRole($studentRole);
    }
}
