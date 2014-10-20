<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Service;

class ImgCrawlService
{

    protected $feedParser;
    protected $itemParser;
    protected $cache;
    protected $knownFeeds;

    public function __construct(\OCA\ImgCrawl\Lib\IFeedParser $feedParser, \OCA\ImgCrawl\Lib\ItemParser $itemParser)
    {
        $this->feedParser = $feedParser;
        $this->itemParser = $itemParser;

        $this->knownFeeds = array(
            1 => array(
                'id' => 1,
                'title' => 'Concept Ships',
                'url' => 'http://conceptships.blogspot.com/feeds/posts/default',
            ),
            2 => array(
                'id' => 2,
                'title' => 'Reddit - Imaginary Landscapes',
                'url' => 'http://www.reddit.com/r/ImaginaryLandscapes/.rss',
            ),
            3 => array(
                'id' => 3,
                'title' => 'Reddit - Spec Art',
                'url' => 'http://www.reddit.com/r/SpecArt/.rss',
            ),
            4 => array(
                'id' => 4,
                'title' => 'Reddit - Imaginary Characters',
                'url' => 'http://www.reddit.com/r/ImaginaryCharacters/.rss',
            ),
            5 => array(
                'id' => 5,
                'title' => 'Reddit - Imaginary Monsters',
                'url' => 'http://www.reddit.com/r/ImaginaryMonsters/.rss',
            ),
            6 => array(
                'id' => 6,
                'title' => 'Reddit - Imaginary Technology',
                'url' => 'http://www.reddit.com/r/ImaginaryTechnology/.rss',
            ),
        );

        $this->cache = array();
    }

    public function imgCrawl($feedId=1)
    {
        $images = array();

        $feed = $this->knownFeeds[$feedId];

        $this->feedParser->setFeedUrl($feed['url']);
        $items = $this->feedParser->getItems();

        foreach ($items as $item) {
            // TODO: cache

            $link = $siteLink = $description = '';
            $description = $item->getDescription();

            $imagesInfos = $this->itemParser->parse($this->feedParser->getFeedUrl(), $item);

            if (!empty($imagesInfos)) {
                foreach($imagesInfos as $imgInfo) {
                    array_push($images, $imgInfo);
                }
            }
        }

        unset($this->feedParser) ;

        return $images;
    }

    public function getKnownFeeds()
    {
        return array_values($this->knownFeeds);
    }
}