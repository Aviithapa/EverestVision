<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            LaratrustSeeder::class,
            NoticeSeeder::class,
//            DisciplineSeeder::class,
//            LevelSeeder::class
        ]);
    }
}
