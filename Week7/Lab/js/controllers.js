'use strict';

var appControllers = angular.module('appControllers', []);

appControllers.controller('CorpsCtrl', ['$scope', '$log', 'corpsProvider', 
    function($scope, $log, corpsProvider) {
    
        $scope.corperations = [];

        function getCorperations() {    
            corpsProvider.getAllCorperations().success(function(response) {
                $scope.corperations = response.data;
            }).error(function (response, status) {
               $log.log(response);
            });
        };

        getCorperations();
    
    
}])

.controller('CorpsDetailCtrl', ['$scope', '$log', '$routeParams', 'corpsProvider',
    function($scope, $log, $routeParams, corpsProvider) {
    
       var corpsID = $routeParams.corpsId;
        
       function getCorperation() {    
            corpsProvider.getCorperations(corpsID).success(function(response) {
                $scope.corps = response.data;
                $scope.corps.incorp_dt = new Date($scope.corps.incorp_dt);                
                console.log($scope.corps);
                loadMap('41.8239890,-71.4128340');
            }).error(function (response, status) {
               $log.log(response);
            });
        };

        getCorperation();
        
        
        function loadMap(location) {

        var lat = location.split(',')[0];
        var long = location.split(',')[1];

            var myCenter = new google.maps.LatLng(lat, long);

                var mapProp = {
                    center: myCenter,
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.querySelector('.googleMap'), mapProp);
                var marker = new google.maps.Marker({
                    position: myCenter
                });
                marker.setMap(map);

        }
        
    
}]);




