<?php 
session_start();

$fm = $_GET['fm'] ;

require("../api/functions.php") ;
?>
<!DOCTYPE html>
<html  ng-app="AutoForms">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> - View Form-Setup  </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <script src="js/angular.js" type="text/javascript"></script>
    <!--Icons-->
    <script src="js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body  ng-controller="ViewFormsCtrl" >
    <?php require("header.php") ; ?>

    <?php require("sidebar.php") ; ?>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">View Form</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> {{forms.fm[0].fm_title}} </h1>
            </div>
        </div><!--/.row-->



        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="pull-right" >  <a href="#setup-form" data-toggle="modal" data-target="#addField" class="btn btn-success"> + Add  Form Fields  </a></span>
                        <h3>  {{forms.fm[0].fm_title}} </h3></div>
                        <div class="panel-body">

                            <div class="container col-md-10">
                                <div class="form-group" ng-repeat="key in fields.fd">
                                    <!-- To show if the input type is text  -->
                                    <div  ng-show="key.typ_name === 'text'" >
                                        <label class="control-label" for="typeahead"> {{key.fd_title}}</label>
                                        <div class="controls">
                                            <input type="{{key.typ_name}}" placeholder="{{key.fd_discrip}}" class="form-control" name="{{key.fd_name}}" >
                                            <!--  {{key.field}} -->
                                        </div>
                                    </div>


                                    <!-- To show if the input type is email  -->
                                    <div  ng-show="key.typ_name === 'email'" >
                                        <label class="control-label" for="typeahead"> {{key.fd_title}}</label>
                                        <div class="controls">
                                            <input type="{{key.typ_name}}" placeholder="{{key.fd_discrip}}" class="form-control" name="{{key.fd_name}}" validate>
                                            <!--  {{key.field}} -->
                                        </div>
                                    </div>


                                    <!-- To show if the input type is password  -->
                                    <div  ng-show="key.typ_name === 'password'" >
                                        <label class="control-label" for="typeahead"> {{key.fd_title}}</label>
                                        <div class="controls">
                                            <input type="{{key.typ_name}}" placeholder="{{key.fd_discrip}}" class="form-control" name="{{key.fd_name}}" >
                                            <!--  {{key.field}} -->
                                        </div>
                                    </div>



                                    <!-- To show if the input type is number  -->
                                    <div  ng-show="key.typ_name === 'number'" >
                                        <label class="control-label" for="typeahead"> {{key.fd_title}}</label>
                                        <div class="controls">
                                            <input type="{{key.typ_name}}" placeholder="{{key.fd_discrip}}" class="form-control" name="{{key.fd_name}}" >
                                            <!--  {{key.field}} -->
                                        </div>
                                    </div>



                                    <!-- To show if the input type is textarea  -->
                                    <div  ng-show="key.typ_name === 'textarea'" >
                                        <label class="control-label" for="typeahead"> {{key.fd_title}}</label>
                                        <div class="controls">
                                            <textarea class="form-control" name="{{key.fd_name}}"> </textarea>
                                            <!-- <input type="{{key.typ_name}}" placeholder="{{key.fd_discrip}}" > -->
                                            <!--  {{key.field}} -->
                                        </div>
                                    </div>


                                    <!-- To show if the input type is select  -->
                                    <div  ng-show="key.typ_name === 'select'" >
                                        <label class="control-label" for="typeahead"> {{key.fd_title}}</label>
                                        <div class="controls">
                                            <select class="form-control" name="{{key.fd_name}}" >
                                                <option>{{key.fd_discrip}}</option>                          		
                                            </select>
                                            <!-- <input type="{{key.typ_name}}" placeholder=""> -->
                                            <!--  {{key.field}} -->
                                        </div>
                                    </div>




                                </div>


                            </div>
                        </div>
                    </div>
                </div><!--/.row-->	

                <!-- 	<?php // require("delete-product-modal.php") ; ?>	 -->



                <!-- <?php // require("edit-cat-modal.php") ; ?>	 -->





                <div class="modal fade" id="addField" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title" id="myModalLabel"> Add Form Field   </h3>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="input.php?obj=formFields">

                                    <div class="form-group">
                                        <label> Field  Title </label>
                                        <div class="controls">
                                            <input type="text" class="form-control" value="" name="fd_title" autocomplete="off" />
                                            <input type="hidden" name="fd_form" value="<?php echo "$fm"; ?>">
                                            <input type="hidden" name="fd_agency" value=" {{forms.fm[0].fm_agency}}">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label >Input type </label>
                                        <div class="controls">
                                            <select class="form-control" name="fd_type">
                                                <option> Select Input type</option>
                                                <option ng-repeat="typ in inputs.typ" value="{{typ.typ_id}}">{{typ.typ_name}}</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label >Discription </label>
                                        <div class="controls">
                                            <textarea name="fd_discrip" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="submit" value="Save & Update" class="btn btn-success">
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div><!--/.main-->

            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/dataTables/jquery.dataTables.js"></script>
            <script src="js/dataTables/dataTables.bootstrap.js"></script>
            <!-- // <script src="app.js"></script> -->
            <script>
                !function ($) {
                    $(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
                        $(this).find('em:first').toggleClass("glyphicon-minus");	  
                    }); 
                    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
                }(window.jQuery);

                $(window).on('resize', function () {
                    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
                })
                $(window).on('resize', function () {
                    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
                })
        </script>	

        <script>

            var FM =  <?php echo "$fm"; ?>

            App = angular.module("AutoForms",[]) ;

            // View Setup Form Controller

            App.controller("ViewFormsCtrl", function($scope, $http){

                $http.get("../api/ap.php?obj=setForm&fid="+FM)
                .success(function(response) {

                    $scope.forms = {};
                    $scope.forms.fm = response.data;
                });


                $http.get("../api/ap.php?obj=FormView&fid="+FM)
                .success(function(response) {

                    $scope.fields = {};
                    $scope.fields.fd = response ;

                });


            });

        </script>

</body>

</html>
