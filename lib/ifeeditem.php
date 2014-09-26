<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Lib;

Interface IFeedItem
{
    public function __construct($item);

    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getLink();

    /**
     * @return string
     */
    public function getTitle();

    public function __destruct();
}