<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Ye Min Htut',
        'username' => 'yeminhtut',
        'email'    => 'yehtut.it@gmail.com',
        'password' => Hash::make('Messenger21'),
    ));
}

}