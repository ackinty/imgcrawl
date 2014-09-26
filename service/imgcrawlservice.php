<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Service;

class ImgCrawlService {

    protected $feedParser;
    protected $cache;

    public function __construct(\OCA\ImgCrawl\Lib\IFeedParser $feedParser) {
        $this->feedParser = $feedParser;

        $this->cache = array();
    }

    public function imgCrawl() {
        $images = array();

        $this->feedParser->setFeedUrl('http://conceptships.blogspot.com/feeds/posts/default');
        $items = $this->feedParser->getItems();

        foreach ($items as $item) {
            $link = $siteLink = $description = '';
            $description = $item->getDescription();

            $id = $item->getId();
            $anchor = substr($id, strpos($id, 'post-')+5);

            $siteLink = $item->getLink() . '#' . $anchor ;

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
                        'imgTitle' => $item->getTitle(),
                        'imgSrc' => $imgSrc,
                        'itemId' => $item->getId(),
                    ));
                }
            }
        }

        unset($this->feedParser) ;

        return $images;
    }
}