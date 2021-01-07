<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'id' => 1,
                'name' => 'michele',
                'surname' => 'mullin',
                'email' => 'michelem@gmail.com',
                'password' => Hash::make('michelem'),
                'permission_id' => 2,
                'language_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'name' => 'michele',
                'surname' => 'davids',
                'email' => 'micheled@gmail.com',
                'password' => Hash::make('micheled'),
                'permission_id' => 1,
                'language_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'name' => 'lucy',
                'surname' => 'lucifer',
                'email' => 'lucyl@gmail.com',
                'password' => Hash::make('lucyl'),
                'permission_id' => 3,
                'language_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ]);
    }
}
