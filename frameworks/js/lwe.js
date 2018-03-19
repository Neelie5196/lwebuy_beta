var app = angular.module('lweApp', ['ngRoute']);
            
app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.
    when ('/', {templateUrl: 'dashboard.php'}).
    when ('/home', {templateUrl: 'dashboard.php'}).
    when ('/purchase', {templateUrl: 'purchase.php'}).
    when ('/ship', {templateUrl: 'shipping.php'}).
    when ('/tracking', {templateUrl: 'tracking.php'});
}])