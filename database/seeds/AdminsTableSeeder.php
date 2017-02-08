<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = "Admin Pertama";
        $admin->username = "admin1";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt("admin1");
        $admin->save();

    }
}
