<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Feed;

class AddFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new feed';

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
        $title = $this->ask('What is the feed title?');
        $url = $this->ask('What is the feed url?');
        
        if (!$this->confirm('Do you want add a new feed with title "' . $title . '" and url "' . $url . '"?')) {
            return;
        }

        try {
            Feed::create([
                'title' => $title,
                'url' => $url
            ]);

            $this->info('New feed added');
        } catch (\Exception $e) {
            $this->error('Add new feed failure.');
        }
    }
}
