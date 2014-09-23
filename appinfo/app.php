<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

\OCP\App::addNavigationEntry(array(
    'id' => 'imgcrawl',
    'order' => 10,
    'href' => \OCP\Util::linkToRoute('imgcrawl.page.index'),
    'icon' => \OCP\Util::imagePath('imgcrawl', 'imgcrawl.svg'),
    'name' => \OC_L10N::get('imgcrawl')->t('ImgCrawl'),
));

// cron task
\OCP\Backgroundjob::addRegularTask('\OCA\imgcrawl\Cron\SomeTask', 'run');
