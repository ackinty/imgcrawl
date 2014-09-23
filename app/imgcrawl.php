<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\App;

use \OCP\AppFramework\App;
use \OCA\ImgCrawl\Controller\PageController;

class ImgCrawl extends App {

    /**
     * Define your dependencies in here
     */
    public function __construct(array $urlParams=array()){
        parent::__construct('imgcrawl', $urlParams);

        $container = $this->getContainer();

        /**
         * Controllers
         */
        $container->registerService('PageController', function($c){
            return new PageController(
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('L10N')
            );
        });

        /**
         * Core
         */
        $container->registerService('L10N', function($c) {
            return $c->query('ServerContainer')->getL10N($c->query('AppName'));
            // return \OC_L10N::get($c['AppName']);
        });

        $container->registerService('CoreConfig', function($c) {
            return $c->query('ServerContainer')->getConfig();
        });

    }


}