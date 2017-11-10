<?php

class HomeController extends Controller{
	
	public function index(){

             $feed = "http://fox59.com/comments/feed/";

             $rss = new RssDisplay($feed);

             $this->set('feed_data',$rss->getFeedItems(8));

             $this->set('rss_title',$rss->getChannelInfo());

	}
}
