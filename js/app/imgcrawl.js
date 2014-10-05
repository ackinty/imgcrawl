/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

var imgcrawl = angular
.module('imgcrawl', ['imgcrawl.services.img'])
.controller('imgcrawlController', ['$scope', 'imgService', imgcrawlController]);

function imgcrawlController($scope, imgService) {
    $scope.foo = 'bar';
    $scope.messages = [];

    $scope.init = function() {
        imgService.getImgs()
        .success(function(data) {
            $scope.imgs = data;
        })
        .error(function(data) {
            console.log('Error: ' + data);
            $scope.error = true;
        });
    }
    $scope.init();
}
