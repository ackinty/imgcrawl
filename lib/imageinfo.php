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
 * Store informations about an image
 */
Class ImageInfo
{
    public $imgSrc;
    public $imgTitle;
    public $originalPost;
    public $originalImgUrl;

    public function __construct($imgSrc='', $imgTitle='', $originalPostUrl='', $originalImgUrl='')
    {
        $this->imgSrc = $imgSrc;
        $this->imgTitle = $imgTitle;
        $this->originalPost = $originalPostUrl;
        $this->originalImgUrl = $originalImgUrl;
    }

}