<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Feed;
use App\Content;
use Carbon\Carbon;

class UpdateFeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Feeds';

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
        Content::truncate();
        $data = array();
        $feeds = Feed::all();
        if (!$feeds->count()) {
            return false;
        };
        foreach ($feeds as $feed) {
            $parseFile = @simplexml_load_file($feed->url, 'SimpleXMLElement', LIBXML_NOCDATA);
            if (!$parseFile) {
                $this->line('Failed to load:' . $feed->url);
            } else {
                $cont = $parseFile->children()->channel->item;
                if (count($cont)) {
                    $this->line('Loading:' . $feed->url);
                    foreach ($cont as $item) {
                        $pub_date = Carbon::parse((string)$item->pubDate)->format('Y-m-d H:m:s');
                        $data[] = array(
                            'feed_id' => $feed->id,
                            "title" => (string)$item->title,
                            'description' => (string)$item->description,
                            'link' => (string)$item->link,
                            'pub_date' => $pub_date
                        );
                    }

                };
            };

        }
        if (Content::insert($data)) {
            $this->line('Update Success!');
        } else {
            $this->line('Update Failed!');
        }

    }
}
