<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User([

            'name'=>'admin',
            'email'=>'admin@a.com',
            'is_active'=>1,
            'role_id'=>1,
            'password'=>bcrypt('admin1')]);
        $admin->save();

    }
}
