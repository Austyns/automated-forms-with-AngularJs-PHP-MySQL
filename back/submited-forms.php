<?php 
session_start();

require("../api/functions.php") ;
?>
 <!DOCTYPE html>
<html  ng-app="AutoForms">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> - Forms  </title>

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

<body  ng-controller="SubmitedFrmsCtrl" >
	<?php require("header.php") ; ?>
	
	<?php require("sidebar.php") ; ?>
	<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Submited-Forms</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Submited Forms Page</h1>
			</div>
		</div><!--/.row-->
				

		
		<div class="row" >
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<!-- <span class="pull-right" >  <a href="new-form.php"> + New Form </a></span> -->
					<h3> Submited Forms </h3></div>
					<div class="panel-body">
						<table   class="table table-striped datatable bootstrap-datatable" id="data" >
						   <thead>
                                        <tr>
                                            <th> S/N </th>
                                            <th> Form Title </th>
                                            <th> Date & Time </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>                 
							            <tr ng-repeat="key in fom.fm">
							               <td>{{$index + 1}}</td>
							                <td>{{key.fm_title}}</td>
							                <td>{{key.details[0].registered_at}}</td>
							                <td><a  data-toggle="modal" data-target="#vf{{$index}}" href="" class="btn btn-success">View</a></td>
							              </tr>
                                    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

<!-- 	<?php // require("delete-product-modal.php") ; ?>	 -->


		
	 <!-- <?php // require("edit-cat-modal.php") ; ?>	 -->




    <!-- View Values Modal  -->
 
<div class="modal fade"  ng-repeat="key in fom.fm" id="vf{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{key.fm_title}}</h4>
      </div>
      <div class="modal-body">
    <div class="container">
    <form class="col-md-5 form-horizontal" method="post" name="regForm" enctype="multipart/form-data" >

  <!-- Form ID  -->
            <!-- <input type="text"  data-ng-model="key[fields.fd[0].fd_form]" > -->
                  <div class="form-group" ng-repeat="field in key.details">
                  
                  <!-- To show if the input type is text  -->
                    <div  ng-show="field.typ_name === 'text'" >
                      <label class="control-label" for="typeahead"> {{field.fd_title}}</label>
                          <div class="controls">
                            <input type="{{field.typ_name}}" placeholder="" class="form-control" name="{{field.fd_name}}" value="{{field.sf_value}}" disabled>
                               <!--  {{key.field}} -->
                            </div>
                          </div>


                  <!-- To show if the input type is email  -->
                    <div  ng-show="field.typ_name === 'email'" >
                      <label class="control-label" for="typeahead"> {{field.fd_title}}</label>
                          <div class="controls">
                            <input type="{{field.typ_name}}" placeholder="" class="form-control" name="{{field.fd_name}}" value="{{field.sf_value}}" disabled>
                               <!--  {{key.field}} -->
                            </div>
                       </div>


                  <!-- To show if the input type is password  -->
                    <div  ng-show="field.typ_name === 'password'" >
                      <label class="control-label" for="typeahead"> 
                      <label class="control-label" for="typeahead"> {{field.fd_title}}</label>
                          <div class="controls">
                            <input type="{{field.typ_name}}" placeholder="" class="form-control" name="{{field.fd_name}}" value="{{field.sf_value}}" disabled>
                               <!--  {{key.field}} -->
                            </div>
                       </div>



                  <!-- To show if the input type is number  -->
                    <div  ng-show="field.typ_name === 'number'" >
                      <label class="control-label" for="typeahead"> {{field.fd_title}}</label>
                          <div class="controls">
                            <input type="{{field.typ_name}}" placeholder="" class="form-control" name="{{field.fd_name}}" value="{{field.sf_value}}" disabled>
                               <!--  {{key.field}} -->
                            </div>
                       </div>



                  <!-- To show if the input type is textarea  --> 
                    <div  ng-show="field.typ_name === 'textarea'" >
                      <label class="control-label" for="typeahead"> {{field.fd_title}}</label>
                          <div class="controls">
                          <textarea class="form-control" name="{{key.fd_name}}" ng-model="formData.params[field.sf_id]" disabled>{{field.sf_value}}</textarea>
                            <!-- <input type="{{key.typ_name}}" placeholder="{{key.fd_discrip}}" > -->
                               <!--  {{key.field}} -->
                            </div>
                       </div>


                  <!-- To show if the input type is select  -->
                    <div  ng-show="field.typ_name === 'select'" >
                      <label class="control-label" for="typeahead"> {{field.fd_title}}</label>
                          <div class="controls">
                            <select class="form-control" name="{{key.fd_name}}" ng-model="formData.params[field.fd_id]" disabled>
                            <option>{{key.fd_discrip}}</option>                             
                            </select>
                            <!-- <input type="{{key.typ_name}}" placeholder=""> -->
                               <!--  {{key.field}} -->
                            </div>
                       </div>

                  </div>




   
        <button class="btn btn-success btn-block"  type="submit" disabled>Submit</button>
    </form>
        <!-- form end -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>    


		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- // <script src="js/chart.min.js"></script> -->
	<!-- // <script src="js/chart-data.js"></script> -->
	<!-- // <script src="js/easypiechart-data.js"></script> -->
	<!-- // <script src="js/bootstrap-datepicker.js"></script> -->
	<!-- // <script src="js/bootstrap-table.js"></script> -->
	<script src="js/dataTables/jquery.dataTables.js"></script>
	<script src="js/dataTables/dataTables.bootstrap.js"></script>
  <script src="app.js"></script>
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
            // $(document).ready(function () {
            //     $('#data').dataTable();
            // });
    </script>
    
    <script>

    </script>
   
</body>

</html>
