<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->role_id = 1;
        $user->name = "Admin";
        $user->email = "admin@root.io";
        $user->password = bcrypt('rootfahim');
        $user->save();

        $user = new User();
        $user->role_id = 2;
        $user->name = "Student";
        $user->email = "student@root.io";
        $user->password = bcrypt('rootfahim');
        $user->save();
    }
}
