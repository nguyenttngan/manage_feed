<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Feed;
use App\Service\XmlService;

class ReadFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:read {feed_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read specific feed';

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

        if (is_numeric($feedId)) {
            $feed = Feed::find($feedId);
            if (!$feed) {
                return $this->error("Feed $feedId does not exist");
            }

            $url = $feed->url;
        } else {
            $url = $feedId;
        }

        try {
            $this->info('Reading....');

            $content = file_get_contents($url);
            $items = XmlService::parseXml($content);
            $headers = ['TITLE', 'PUBLISH DATE'];
            $this->table($headers, $items);
        } catch (\Exception $e) {
            $this->error('This feed is not compatible to read by this application');
        }
    }
}
