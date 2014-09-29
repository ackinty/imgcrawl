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
Class ImgurItemParser implements IItemParser
{
    public function parse($siteLink)
    {
        $imgLink = array('empty.jpg');

        // album ou pas ? je compte le nombre de / dans l'url (hors le '//' du 'http://')
        $test = str_replace('http://', '', $siteLink);

        //album
        if (substr_count($test, '/') > 1) {
            $code = join('', file($siteLink)) ;

            preg_match_all('%<a *class="zoom[^>]*href="([^"]*)"[^>]*>%', $code, $matches) ;

            return $matches[1];

        }
        // pas un album
        else {
            return array($siteLink.'.jpg');
        }

        return $imgLink;
    }
}