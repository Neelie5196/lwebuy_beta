var app = angular.module('lweApp', ['ngRoute']);

app.config(['$routeProvider', function ($routeProvider) {
    'use strict';
    $routeProvider
    .when('/', {templateUrl: 'dashboard.php'})
    .when('/home', {templateUrl: 'dashboard.php'})
    .when('/product', {templateUrl: 'templates/product.html'})
    .when('/sales', {templateUrl: 'templates/sales.html'})
    .when('/logout', {templateUrl: 'templates/home.html'})
    .when('/salesreport', {templateUrl: 'templates/salesreport.html'});

    $locationProvider.html5Mode(true);
}]);