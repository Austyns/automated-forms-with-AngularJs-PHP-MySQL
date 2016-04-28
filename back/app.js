App = angular.module("AutoForms",[]) ;



// View New Form Controller

   App.controller("newFrmCtrl", function($scope, $http, $window, $location){

        // initialize Input params ($_POST array)

        $scope.fields = {} ;

          $scope.AddForm = function() {
        // Posting data to php file
        // alert($scope.user) ;
        $http({
          method  : 'POST',
          url     : '../api/input.php?action=Nform',
          data    : $scope.fields, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         })
          .success(function(data) {
            if (data.errors) {
              // Showing errors.
              $scope.errorfm_title = data.errors.fm_title ;
              $scope.errorfm_discrip = data.errors.fm_discrip ;

            }  else {
              $scope.message = data.message ;

               // Force Reload on changing state

              alert("Successfully Added ") ;

              $window.location.href = "new-form.php" ;

              // $route.reload();
            }
          });
        };

	 });


// View Form Controller

   App.controller("formsCtrl", function($scope, $http){

	    $http.get("../api/ap.php?obj=forms")
	    .success(function(response) {

	        $scope.forms = {};
	        $scope.forms.fm = response.data;});
	    });



// Setup Form Ctrl

   App.controller("SetupFormsCtrl", function($scope, $http, $window, $location){

			    $http.get("../api/ap.php?obj=setForm&fid="+FM)
			    .success(function(response) {

			        $scope.forms = {};
			        $scope.forms.fm = response.data;
			    });


			    $http.get("../api/ap.php?obj=FormParams&fid="+FM)
			    .success(function(response) {

			        $scope.fields = {};
			        $scope.fields.fd = response.data;
			     });

			    $http.get("../api/ap.php?obj=inputyp")
			    .success(function(response) {

			        $scope.inputs = {};
			        $scope.inputs.typ = response.data;
			     });


        // initialize Input params ($_POST array)

        $scope.ff = {} ;

          $scope.AddFormField = function() {
        // Posting data to php file
        // alert($scope.user) ;
	        $http({
	          method  : 'POST',
	          url     : '../api/input.php?action=SetupForm&fid='+FM,
	          data    : $scope.ff, //forms user object
	          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
	         })
	          .success(function(data) {
	            if (data.errors) {
	              // Showing errors.
	              $scope.errorfd_title = data.errors.fd_title ;
	              $scope.errorfd_discrip = data.errors.fd_discrip ;
	              $scope.errorfd_type = data.errors.fd_type ;

	            }  else {
	              $scope.message = data.message ;

	               // Force Reload on changing state

	              alert("Successfully Added ") ;

	              $window.location.href = "setup-form.php?fm="+FM ;

	              // $route.reload();
	            }
	          });
	        };


		 });


    // Submited Forms Controller

    App.controller('SubmitedFrmsCtrl', function($scope, $http, $rootScope) {
      // var BaseServer = 'http://localhost/portal/' ;
      // $rootScope.appState = 'client' ;
      
      // Making Available Available Forms

       $http.get("../api/ap.php?obj=SubForms")
        .success(function(response) {

          $scope.fom = {};
          $scope.fom.fm = response; 

        });

      
     });





