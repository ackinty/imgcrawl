/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

var imgcrawl = angular
.module('imgcrawl', ['imgcrawl.services.img'])
.config(['$httpProvider', imgCrawlConfig])
.controller('imgcrawlController', ['$scope', 'imgService', imgcrawlController]);

function imgCrawlConfig($httpProvider) {
    // always send CSRF token
    $httpProvider.defaults.headers.common.requesttoken = oc_requesttoken;
}

function imgcrawlController($scope, imgService) {
    $scope.foo = 'bar';
    $scope.messages = [];

    $scope.knownFeeds = [];
    $scope.selectedFeed = {};

    $scope.init = function() {
        // get feeds list
        imgService.getKnownFeeds()
            .success(function(data) {
                $scope.knownFeeds = data;
            })
            .error(function(data) {
                console.log('Error: ' + data);
                $scope.error = true;
            });

    }
    $scope.init();

    $scope.updateFeed = function(feedId) {
        if (feedId === undefined) {
            return
        }
        else {
            imgService.getImgs(feedId)
                .success(function(data) {
                    $scope.imgs = data;
                })
                .error(function(data) {
                    console.error('Error: ' + data);
                    $scope.error = true;
                });
        }
    }

}
