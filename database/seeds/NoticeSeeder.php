<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name = ['प्लास्टिक सामग्रीहरु', 'प्लास्टिक सामग्रीहरु', 'प्लास्टिक सामग्रीहरु','प्लास्टिक सामग्रीहरु','प्लास्टिक सामग्रीहरु','प्लास्टिक सामग्रीहरु','प्लास्टिक सामग्रीहरु','प्लास्टिक सामग्रीहरु','प्लास्टिक सामग्रीहरु'];
        foreach ($name as $key => $n) {
            \App\Models\Website\Post::create([
                'title' =>$n,
                'nepali_title' => ' प्लास्टिक सामग्रीहरु ',
                'slug' => 'slug-' . $key,
                'type' => 'news',
                'meta_data' => 'General'

            ]);
        }


    }
}
