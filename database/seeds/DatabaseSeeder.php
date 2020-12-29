<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            UserSeeder::class,
            RoomSeeder::class,
            MeetingSeeder::class,
            MeetingUserSeeder::class,
        ]);
    }
}
