<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl;

use \OCA\ImgCrawl\App\ImgCrawl;

$application = new ImgCrawl();
$application->registerRoutes($this, array(
    'routes' => array(
        array(
            'name' => 'page#index',
            'url' => '/',
            'verb' => 'GET',
        ),
    ),
));