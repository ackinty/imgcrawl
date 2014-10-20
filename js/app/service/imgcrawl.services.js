/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

angular.module('imgcrawl.services.img', [])
    .factory('imgService', ['$http', function($http){
        var doGetImgs = function(feedId) {
            return $http.get(OC.generateUrl('/apps/imgcrawl/api/1.0/imgs/'+feedId));
        }

        var doGetKnownFeeds = function() {
            return $http.get(OC.generateUrl('/apps/imgcrawl/api/1.0/known_feeds'));
        }

        return {
            getImgs: function(feedId) { return doGetImgs(feedId); },
            getKnownFeeds: function() { return doGetKnownFeeds(); }
        };
    }]);