<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

\OCP\Util::addStyle('imgcrawl', 'imgcrawl');

\OCP\Util::addScript('imgcrawl', 'lib/angular.min');
\OCP\Util::addScript('imgcrawl', 'app/imgcrawl');

?>

<div ng-app="imgcrawl" ng-controller="imgcrawlController">

<div id="imgcrawl">
    ImgCrawl
</div>

<div id="container">

</div>

<div id="footer">

</div>

</div>