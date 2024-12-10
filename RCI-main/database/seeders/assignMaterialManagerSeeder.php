<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class assignMaterialManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materialManager = new User();
        $materialManager->first_name = 'Material';
        $materialManager->last_name = 'Manager';
        $materialManager->user_name = 'material_manager';
        $materialManager->email = 'material@mailinator.com';
        $materialManager->password = bcrypt('12345678');
        $materialManager->status = true;
        $materialManager->save();
        $materialManager->assignRole('MATERIAL-MANAGER');
    }
}
