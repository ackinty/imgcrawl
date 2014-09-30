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
        $imagesInfos = array();

        preg_match('%<a href="([^"]*)">\[link\]</a>%', $link, $matches);
        if(isset($matches[1])) {
            $link = $matches[0];
            $siteLink = $matches[1];

            $images = array();

            if (strpos($siteLink, "jpg") !== FALSE) {
                $images =  array($siteLink);
            }
            elseif (strpos($siteLink, "png") !== FALSE) {
                $images =  array($siteLink);
            }
            elseif (strpos($siteLink, "deviantart") !== FALSE) {
                $parser = new DeviantArtItemParser;
                $images =  $parser->parse($siteLink);
            }
            elseif (strpos($siteLink, "imgur") !== FALSE) {
                $parser = new ImgurItemParser;
                $images =  $parser->parse($siteLink);
            }
            elseif (strpos($siteLink, "cghub") !== FALSE) {
                $parser = new CGHubItemParser;
                $images =  $parser->parse($siteLink);
            }
            elseif (strpos($siteLink, "conceptships") !== FALSE) {
                $parser = new ConceptshipsItemParser;
                $images =  $parser->parse($siteLink);
            }

            foreach($images as $image) {
                array_push($imagesInfos, new ImageInfo($image, '', '', $siteLink));
            }

        }

        return $imagesInfos;
    }
}