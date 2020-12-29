<?php

use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->insert([

            [
                'id' => 1,
                'room_id' => 1,
                'description' => 'this is the first meeting',
                'date' => '2021-08-02',
                'start' => '11:15',
                'end' => '12:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'room_id' => 2,
                'description' => 'this is the second meeting',
                'date' => '2021-03-02',
                'start' => '12:15',
                'end' => '13:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'room_id' => 3,
                'description' => 'this is the third meeting',
                'date' => '2021-01-02',
                'start' => '14:15',
                'end' => '15:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ]);
    }
}
