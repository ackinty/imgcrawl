<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Lib;

if(!class_exists('\SimplePie')) {
    require_once __DIR__ . '/../3rdparty/simplepie/autoloader.php';
}

Class SimplePieFeedParser implements IFeedParser
{
    protected $feed;
    protected $feedUrl;

    public function __construct()
    {
        $this->feed = new \SimplePie();
    }

    /**
     * @param string $url The feed's URL to parse
     */
    public function setFeedUrl($url)
    {
        $this->feedUrl = $url;

        $this->feed->set_feed_url($url);
        $this->feed->init();
        $this->feed->handle_content_type();
    }

    /**
     * @return string The feed's url
     */
    public function getFeedUrl()
    {
        return $this->feedUrl;
    }

    /**
     * @return array OCA\ImgCrawl\Lib\IFeedItem[]
     */
    public function getItems()
    {
        $feedItems = array();

        $items = $this->feed->get_items(0,20);
        while($item = array_shift($items)) {
            array_push($feedItems, new SimplePieFeedItem($item));
        }
        unset($items);

        return $feedItems;
    }

    public function __destruct()
    {
        // Nothing
    }
}