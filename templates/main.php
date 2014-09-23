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
    <?php foreach($_['images'] as $image) { ?>
    <div class="blockImg">
        <div class="feedImg">
            <a href="<?php echo $image['siteLink']; ?>" title="<?php echo $image['imgTitle']; ?>">
                <img src="<?php echo $image['imgSrc']; ?>" height="400" width="400">
            </a>
        </div>
        <div class="action">
            <a href="<?php echo $image['itemId']; ?>" title="Lien vers le post d'origine">Post</a><br>
            <a href="">EE</a>
        </div>
    </div>
    <?php } ?>
</div>

<div id="footer">

</div>

</div>