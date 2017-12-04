<?php

class RssDisplay extends Model
{

   protected $feed_url;
   protected $num_feed_items;

   public function __construct($url)
   {

     parent::__construct();

     $this->feed_url = $url;      

   }

   public function getFeedItems($num_feed_items = -1)
   {

     $items = simplexml_load_file($this->feed_url);

     $this->num_feed_items = $num_feed_items;

     $limit = 0;

     $rss_feed = array();

     foreach($items->channel->item as $item)
     {
        if($limit == $this->num_feed_items)
        {
            break;
        }
        $limit++;
        $feed = array();
        $feed["title"] = (string)$item->title;
        $feed["description"] = (string)$item->description;
        $feed["link"] = (string)$item->link;
        $feed["pubDate"] = (string)$item->pubDate;
        array_push($rss_feed,$feed);
     }

     return $rss_feed;

   }

   public function getChannelInfo()
   {
     $items = simplexml_load_file($this->feed_url);

     return $items->channel->title;
   }

}