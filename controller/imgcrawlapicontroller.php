<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Controller;

use \OCP\AppFramework\APIController;
use \OCP\AppFramework\Http\JSONResponse;
use \OCP\IRequest;
use \OCP\IConfig;

class ImgCrawlAPIController extends APIController {

    protected $imgCrawlService;

    public function __construct($appName, IRequest $request, ImgCrawlService $imgCrawlService){
        parent::__construct($appName, $request, 'GET');

        $this->imgCrawlService = $imgCrawlService;
    }

    /**
     * Returns informations from history
     * @NoCSRFRequired
     * @CORS
     */
    public function index() {
        $images = array();

        try {
            $images = $this->imgCrawlService->imgCrawl();
        } catch (Exception $e) {
            $response = new JSONResponse();
            return $response->setStatus(\OCA\AppFramework\Http::STATUS_NOT_FOUND);
        }

        if (empty($images)) {
            $response = new JSONResponse();
            return $response->setStatus(\OCA\AppFramework\Http::STATUS_NOT_FOUND);
        }

        return new JSONResponse($images);
    }

}