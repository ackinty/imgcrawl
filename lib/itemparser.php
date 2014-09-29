<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Lib;

use \OCA\ImgCrawl\Lib\ConceptshipsItemParser;

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
        }
        else { // reddit
            $parser = new RedditItemParser;
            $imgLinks = $parser->parse($item->getDescription());
        }

        return $imgLinks;
    }
}