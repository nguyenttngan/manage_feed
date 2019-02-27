<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Feed;

class ListFeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all feeds';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = ['ID', 'TITLE', 'URL'];
        $feeds = Feed::all();
        $this->table($headers, $feeds);
    }
}
