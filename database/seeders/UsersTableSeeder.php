<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => NULL,
                'name' => 'New',
                'email' => 'abc@xyz.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Jl4/ZILh44WWxL9SVXthz.qJXkR308QDXxu0O0nTqYjP838ek3EF6',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2021-04-29 15:42:39',
                'updated_at' => '2021-04-29 15:42:39',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'name' => 'Sanskar',
                'email' => 'sanskarpandey@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$wwq4/P9gjP.MfMweNQ9sGeysMHcYnWAfOtTYO/KxGLEjVZOlu.m6K',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2021-04-30 06:09:33',
                'updated_at' => '2021-04-30 07:26:27',
            ),
        ));
        
        
    }
}