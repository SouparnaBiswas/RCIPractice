<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class assignAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->first_name = 'Admin';
        $admin->last_name = 'Admin';
        $admin->user_name = 'admin';
        $admin->email = 'main@yopmail.com';
        $admin->password = bcrypt('wblN6E6CL136');
        $admin->status = true;
        $admin->save();
        $admin->assignRole('ADMIN');
    }
}
