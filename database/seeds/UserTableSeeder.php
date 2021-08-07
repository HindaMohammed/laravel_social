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
        //
        $user = new \App\User();
        // `name`, `email`, `password`,
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
