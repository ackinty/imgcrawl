<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Service;

if(!class_exists('\SimplePie')) {
    require_once __DIR__ . '/../3rdparty/simplepie/autoloader.php';
}

class ImgCrawlService {

    protected $cache;

    public function __construct() {
        $this->cache = array();
    }

    public function imgCrawl() {
        $feed = new \SimplePie();
        $feed->set_feed_url('http://conceptships.blogspot.com/feeds/posts/default');
        $feed->init();
        $feed->handle_content_type();

        $images = array();

        foreach ($feed->get_items(0,2) as $item) {
            $link = $siteLink = $description = '';
            $description = $item->get_description();

            $id = $item->get_id();
            $anchor = substr($id, strpos($id, 'post-')+5);

            $siteLink = $item->get_link() . '#' . $anchor ;

            // start $imgLink = conceptshipsParse($description());
            $imgLink = array('empty.jpg') ;
            preg_match_all('%<img src="([^"]*)"[^>]*>%', $description, $matches) ;
            if (!empty($matches)) {
                $imgLink =  $matches[1];
            }
            // end $imgLink = conceptshipsParse($description());

            if (!empty($imgLink)) {
                foreach($imgLink as $imgSrc) {
                    array_push($images, array(
                        'siteLink' => $siteLink,
                        'imgTitle' => $item->get_title(),
                        'imgSrc' => $imgSrc,
                        'itemId' => $item->get_id(),
                    ));
                }
            }
        }

        $feed->__destruct();
        unset($feed) ;

        return $images;
    }
}