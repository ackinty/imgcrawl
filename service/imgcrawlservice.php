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
    protected $itemParser;
    protected $cache;

    public function __construct(\OCA\ImgCrawl\Lib\IFeedParser $feedParser, \OCA\ImgCrawl\Lib\ItemParser $itemParser) {
        $this->feedParser = $feedParser;
        $this->itemParser = $itemParser;

        $this->cache = array();
    }

    public function imgCrawl() {
        $images = array();

        // $this->feedParser->setFeedUrl('http://conceptships.blogspot.com/feeds/posts/default');
        $this->feedParser->setFeedUrl('http://www.reddit.com/r/ImaginaryLandscapes/.rss');
        $items = $this->feedParser->getItems();

        foreach ($items as $item) {
            // TODO: cache

            $link = $siteLink = $description = '';
            $description = $item->getDescription();

            $imgLink = $this->itemParser->parse($this->feedParser->getFeedUrl(), $item);

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