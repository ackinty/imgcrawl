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
Class CGHubItemParser implements IItemParser
{
    public function parse($siteLink)
    {
        $imgLink = "empty.jpg" ;

        $code = join('', file($siteLink)) ;
        preg_match('%<link rel="image_src"[^>]*href="([^"]*)"[^>]*>%', $code, $matches) ;

        if (isset($matches[1])) {
            $imgLink = $matches[1];
            $imgLink = str_replace("thumb", "large", $imgLink); // "large" is for preview, "max" is for original image
        }

        return array($imgLink);
    }
}