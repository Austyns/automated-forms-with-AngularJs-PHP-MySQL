
var app =  angular.module("AutoForms",['ngRoute']); 

app.controller('thisCtrl', function($scope, $rootScope){

});




// Available Forms Controller

app.controller('AvailableFmCtrl', function($scope, $http, $routeParams, $location, $window, $rootScope) {

    // Making Available Available Forms

    $http.get("api/ap.php?obj=forms").success(function(response) {

        $scope.fom = {};
        $scope.fom.fm = response.data ;
    });

});





app.controller('FillFormCtrl', function($scope, $http, $location, $routeParams, $window, $rootScope) {
    var FmNum = $routeParams.FmNum ;
    $scope.fom = {};
    $scope.fom.id = FmNum ;
    // console.log(FmNum) ;

    // Form Details (Actual Form Params) 
    $http.get("api/ap.php?obj=FormView&fid="+FmNum)
    .success(function(response) {

        $scope.fields = {};
        $scope.fields.fd = response ;

    });

    //  Handle For Submission Withi  This c=scope 

    // create a blank object to handle form data.
    $scope.formData = {};
    // calling the submit function.
    $scope.ProcessForm = function() {
        // Posting data to php file
        $http({
            method  : 'POST',
            url     : 'api/input.php?action=fms&fid='+FmNum,
            data    : $scope.formData, //forms user object
            headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }).success(function(data) {
            if (data.errors) {
                // Showing errors.

            }else {
                $scope.message = data.message ;
                // Force Reload on changing state

                alert($scope.message) ;

                $window.location.href = "#/available-forms/";
            }
        });
    };



});

// Submited Forms Controller

app.controller('SubFormCtrl', function($scope, $http, $routeParams, $location, $window, $rootScope) {
    // Making Available Available Forms

    $http.get("api/ap.php?obj=SubForms")
    .success(function(response) {

        $scope.fom = {};
        $scope.fom.fm = response; 

    });


});





app.config( ['$routeProvider', function($routeProvider) {

    $routeProvider
    .when('/', {
        title: 'Welcome Page',
        templateUrl: 'templates/home.php'
    })
    .when('/available-forms', {
        title: 'Welcome Page',
        templateUrl: 'templates/available-forms.html',
        controller: 'AvailableFmCtrl'
    })
    .when('/view-form/:FmNum', {
        title: 'Forms',
        templateUrl:'templates/fill-form.html',
        controller: 'FillFormCtrl'
    })
    .when('/submited-forms', {
        title: 'Submited Forms',
        templateUrl:'templates/submited-forms.html',
        controller: 'SubFormCtrl'
    })
    .otherwise({
        redirectTo: '/'
    });

}]);

