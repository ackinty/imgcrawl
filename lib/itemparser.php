<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Lib;

// use \OCA\ImgCrawl\Lib\ConceptshipsItemParser;

/**
 * Parse a feed item to extract images
 * @see IFeedItem
 */
Class ItemParser
{
    public function parse(string $feedUrl, IFeedItem $item)
    {
        $imgLinks = array();

        // conceptships
        if (strpos($feedUrl, "conceptships") !== FALSE) {
            $id = $item->getId();
            $anchor = substr($id, strpos($id, 'post-')+5);

            $siteLink = $item->getLink() . '#' . $anchor ;
            $parser = new ConceptshipsItemParser;
            $imgLinks = $parser->parse($item->getDescription());

            $imagesInfos = array();
            foreach($imgLinks as $imgLink) {
                $imgInfo = new ImageInfo(
                    $imgLink,
                    $item->getTitle(),
                    $siteLink,
                    $item->getId()
                );
                array_push($imagesInfos, $imgInfo);
            }
            return $imagesInfos;
        }
        elseif (strpos($feedUrl, "reddit.com") !== FALSE) { // reddit
            $parser = new RedditItemParser;
            $imgLinks = $parser->parse($item->getDescription());

            foreach($imgLinks as $imgInfo) {
                $imgInfo->imgTitle = $item->getTitle();
                $imgInfo->originalPost = $item->getId();
                array_push($imagesInfos, $imgInfo);
            }
        }

        return $imgLinks;
    }
}