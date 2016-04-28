<?php 
session_start();
 ?>
 <!DOCTYPE html>
<html ng-app="AutoForms">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> - New Form </title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

        <!-- // <script src="js/angular.js" type="text/javascript"></script> -->


<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body ng-controller="newFrmCtrl" >

	<?php require("header.php") ; ?>
	
	<?php require("sidebar.php") ; ?>	
	<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">New-Form </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Forms </h1>
			</div>
		</div><!--/.row-->
				
		

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h3></h3></div>
					<div class="panel-body">
						
			<div class="col-md-10">
          
            <form id="defaultForm" method="post" enctype="multipart/form-data" class="form-horizontal" ng-submit="AddForm()">

                  <div class="form-group">
                      <label class="control-label" for="typeahead"> Form Title</label>
                          <div class="controls">
                                <input type="text" class="span6 form-control" name="fm_title" autocomplete="off" ng-model="fields.fm_title" />
								<span class="help-inline" style="color:red;"  ng-show="errorfm_title">{{errorfm_title}}</span>
                            </div>
                       </div>

                     
                  <div class="form-group">
                      <label class="control-label" for="typeahead">Role/Discription </label>
                          <div class="controls">
                                <textarea name="fm_discrip" ng-model="fields.fm_discrip" class="form-control"></textarea>
								<span class="help-inline" style="color:red;"  ng-show="errorfm_discrip">{{errorfm_discrip}}</span>
                            </div>
                       </div>

                     


                        <!-- <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3"> -->
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                           <!--  </div>
                        </div> -->
                    </form>
                  </div>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- // <script src="js/chart.min.js"></script> -->
	<!-- // <script src="js/chart-data.js"></script> -->
	<!-- // <script src="js/easypiechart.js"></script> -->
	<!-- // <script src="js/easypiechart-data.js"></script> -->
	<!-- // <script src="js/bootstrap-datepicker.js"></script> -->
	<script src="js/bootstrap-table.js"></script>
	<script src="js/lumino.glyphs.js"></script>
	<script src="js/angular.js"></script>
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

    </script>
</body>

</html>
