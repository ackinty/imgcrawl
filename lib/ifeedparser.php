<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Lib;

Interface IFeedParser
{
    public function __construct();

    /**
     * @param string $url The feed's URL to parse
     */
    public function setFeedUrl($url);

    /**
     * @return array OCA\ImgCrawl\Lib\IFeedItem[]
     */
    public function getItems();

    public function __destruct();
}
