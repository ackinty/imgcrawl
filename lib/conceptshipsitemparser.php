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
Class ConceptshipsItemParser implements IItemParser
{
    public function parse($link)
    {
        $imgLink = array('empty.jpg');

        preg_match_all('%<img src="([^"]*)"[^>]*>%', $link, $matches);

        if (!empty($matches)) {
            $imgLink =  $matches[1];
        }

        return $imgLink;
    }
}