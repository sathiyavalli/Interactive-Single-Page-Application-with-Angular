var myApp = angular.module('myApp', ['ui.router']);

myApp.controller('MainCtrl', ['$scope', function ($scope) {
    
    $scope.text = 'Hello, Angular fanatic.';
    
}]);

/*for contact us form mail function*/

myApp.controller("contactForm", ['$scope', '$http','$location', '$anchorScroll', function($scope, $http,$location, $anchorScroll) {
    $scope.success = false;
    $scope.error = false;
$scope.input = {};
    $scope.sendMessage = function( input ) {
      input.submit = true;
      $http({
          method: 'POST',
          url: '../html/mail-send.php',
          data: $.param($scope.input),
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
      })
      .success( function(data) {
//	$('input[type="text"],textarea').val('');
//$("#contactform")[0].reset();
setTimeout(function () {
	$location.hash('top');
$anchorScroll();

    $(".alert-success").fadeTo(1500, 0).slideUp(1500, function () {
//        $(this).remove();
window.location.reload();
    });
}, 1500);


        if ( data.success ) {
          $scope.success = true;
        } else {
          $scope.error = true;

        }
      } );
    }
  }]);


myApp.config(['$stateProvider', function ($stateProvider) {

  $stateProvider
        
        // HOME STATES AND NESTED VIEWS ========================================
        .state('home', {
            url: '/home/',
            templateUrl: '../html/data-main.html'
        })
       .state('main', {
            url: '/main-page/',
            templateUrl: '../html/data-front.html'
        })
        
        // ABOUT PAGE AND MULTIPLE NAMED VIEWS =================================
        .state('about', {
            url: '/about/',
            templateUrl: '../html/view.html'
        }).state('services', {
            url: '/services/',
            templateUrl: '../html/data-prod.html'
        }).state('services.finance', {
            url: 'finance/',
            templateUrl: '../html/data-fin.html'
        }).state('services.visa', {
            url: 'visa/',
            templateUrl: '../html/data-visa.html'
        }).state('services.it', {
            url: 'it/',
            templateUrl: '../html/data-it.html'
        }).state('contact', {
            url: '/contact/',
            templateUrl: '../html/data-contact.html'
        }).state('product-page', {
            url: '/product-page/',
            templateUrl: '../html/services.html'
        }).state('privacy-policy', {
            url: '/privacy-policy/',
            templateUrl: '../html/privacy.html'
        });
  
}]);
