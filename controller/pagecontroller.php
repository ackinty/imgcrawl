<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Controller;

use \OCP\AppFramework\Controller;
use \OCP\IRequest;
use \OCP\IL10N;

class PageController extends Controller {

    protected $imgCrawlService;

    public function __construct($appName, IRequest $request, \OCA\ImgCrawl\Service\ImgCrawlService $imgCrawlService){
        parent::__construct($appName, $request);

        $this->imgCrawlService = $imgCrawlService;
    }

    /**
     * @NoCSRFRequired
     */
    public function index() {
        return $this->render('main');
    }

}