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
\OCP\Util::addScript('imgcrawl', 'app/service/imgcrawl.services');
\OCP\Util::addScript('imgcrawl', 'app/imgcrawl');

?>

<div id="imgcrawl" ng-app="imgcrawl" ng-controller="imgcrawlController">

    <div class="nav">
        <div class="title">
            ImgCrawl
        </div>
    </div>

    <div id="container">
        <div id="msg" ng-show="" ng-cloak>
            <p ng-repeat="msg in messages">{{ msg }}</p>
        </div>
        <div class="blockImg" ng-repeat="img in imgs" ng-cloak>
            <div class="feedImg">
                <a href="{{ img.originalImgUrl }}" title="{{ img.imgTitle }}">
                    <img src="{{ img.imgSrc }}" height="400" width="400">
                </a>
            </div>
            <div class="action">
                <a href="{{ img.originalPost }}" title="Lien vers le post d'origine">Post</a><br>
                <a href="">EE</a>
            </div>
        </div>
        <div class="clear"></div>
    </div>

</div>

<div id="footer">

</div>

</div>