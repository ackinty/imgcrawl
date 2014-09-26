<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Lib;

Class SimplePieFeedItem implements IFeedItem
{
    protected $simplePieItem ;

    public function __construct($item) {
        $this->simplePieItem = $item;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->simplePieItem->get_id();
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->simplePieItem->get_description();
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->simplePieItem->get_link();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->simplePieItem->get_title();
    }

    public function __destruct()
    {
        // nothing
    }
}