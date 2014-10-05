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
Class DeviantArtItemParser implements IItemParser
{
    public function parse($siteLink)
    {
        $imgLink = array('empty.jpg');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $siteLink);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'imgcrawl');
        $code = curl_exec($ch);

        // preg_match('%<img *name="gmi-ResViewSizer_fullimg[^>]*src="([^"]*)"[^>]*>%', $code, $matches) ;

        // 20141004
        preg_match('%<img[^>]*src="([^"]*)"[^>]*class="dev-content-full"[^>]*>%', $code, $matches) ;

        if (isset($matches[1])) {
            $imgLink = $matches[1];
        }

        return array($imgLink);
    }
}