<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Lib;

/**
 * Parse a feed item to extract images
 */
Class RedditItemParser implements IItemParser
{
    public function parse($link)
    {
        $imgLink = array('empty.jpg');

        preg_match('%<a href="([^"]*)">\[link\]</a>%', $link, $matches);
        if(isset($matches[1])) {
            $link = $matches[0];
            $siteLink = $matches[1];

            if (strpos($siteLink, "jpg") !== FALSE) {
                return array($siteLink);
            }

            if (strpos($siteLink, "png") !== FALSE) {
                return array($siteLink);
            }

            if (strpos($siteLink, "deviantart") !== FALSE) {
                $parser = new DeviantArtItemParser;
                return $parser->parse($siteLink);
            }

            if (strpos($siteLink, "imgur") !== FALSE) {
                $parser = new ImgurItemParser;
                return $parser->parse($siteLink);
            }

            if (strpos($siteLink, "cghub") !== FALSE) {
                $parser = new CGHubItemParser;
                return $parser->parse($siteLink);
            }

            if (strpos($siteLink, "conceptships") !== FALSE) {
                $parser = new ConceptshipsItemParser;
                return $parser->parse($siteLink);
            }

        }

        return $imgLink;
    }
}