<?php

use Illuminate\Database\Seeder;
use App\Models\Feed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Feed::create([
          'title' => 'VnExpress',
          'url' => 'https://vnexpress.net/rss/thoi-su.rss'
        ]);
    }
}
