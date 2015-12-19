 'use strict';

var myApp = angular.module('myApp', [
  'ngRoute',
  'appControllers',
  'appServices'
]);

myApp.constant('config', {
    "endpoints": {
       "corps" : 'http://localhost:7000/PhpAdv/week5/lab/api/v1/corps'
    },
    "models" : {
        "corps" : {
           "corp": '',
           "incorp_dt": '',
           "email": '',
           "owner": '',
           "phone": '',
           "location": ''
           
        } 
    }
            
});


myApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl: 'partials/corps.html',
            controller: 'CorpsCtrl'
        }).
        when('/corps/:corpsId', {
            templateUrl: 'partials/corps-detail.html',
            controller: 'CorpsDetailCtrl'
        }).
        otherwise({
          redirectTo: '/'
        });
  }]);
  
  /*
  myApp.config(['$httpProvider',
  function($httpProvider) {
    // Use x-www-form-urlencoded Content-Type
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    
    $httpProvider.defaults.transformRequest = function(data){
        if (data === undefined) {
            return data;
        }
        var str = [];
        for(var key in data) {
          if (data.hasOwnProperty(key)) {
            var val = data[key];
            str.push(encodeURIComponent(key) + "=" + encodeURIComponent(val));
          }
        }
        return str.join("&");
    }; 
    
}]); */