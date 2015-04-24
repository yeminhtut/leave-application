<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    // User::insert(
    // 	array(
    // 	'role_id'	   => '0',
    //     'name'     => 'Ye Min Htut',        
    //     'username' => 'yeminhtut',
    //     'email'    => 'yehtut.it@gmail.com',
    //     'password' => Hash::make('Messenger21'),
    // ),
    // array('role_id'=>'1','name'=>'Admin','username' => 'admin','email'=>'admin@gmail.com','password' => Hash::make("Messenger21")),        
    // );


    DB::table('users')->insert(array(
        array('role_id'=>'1','username'=>'john','email'=>'yehtut.it@gmail.com','password' => Hash::make('Messenger')),
        array('role_id'=>'1','username'=>'mark','email'=>'admin@gmail.com','password' => Hash::make('Messenger')),
     ));
}

}