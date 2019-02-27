<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Feed;

class RemoveFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:remove {feed_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove a feed';

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
        $feedId = $this->argument('feed_id');
        $feed = Feed::find($feedId);

        if (!$feed) {
            return $this->error("Feed $feedId does not exist.");
        }

        if (!$this->confirm("Are you sure to remove feeed $feedId?")) {
            return;
        }

        try {
            $feed->delete();

            return $this->info("Feed $feedId has been removed.");
        } catch (\Exception $e) {
            $this->error('Add new feed failure.');
        }
    }
}
