<?php 
// session_name("sifs") ;
session_start();

// $sh = $_SESSION['school'] ;

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

<body  ng-controller="formsCtrl" >
	<?php require("header.php") ; ?>
	
	<?php require("sidebar.php") ; ?>
	<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Forms</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Forms Page</h1>
			</div>
		</div><!--/.row-->
				

		
		<div class="row" >
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="pull-right" >  <a href="new-form.php"> + New Form </a></span><h3> Forms </h3></div>
					<div class="panel-body">
						<table   class="table table-striped datatable bootstrap-datatable" id="data" >
						   <thead>
                                        <tr>
                                            <th> Form Title </th>
                                            <th> Discription </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX"  ng-repeat="ass in forms.fm">
                                            <td>  {{ass.fm_title}}  </td>
                                            <td> {{ass.fm_discrip}}  </td>
                                            <td><a href="#edit-form" data-toggle='modal' data-target='#e{{ass.fm_id}}' class="btn btn-xs btn-primary"> Edit </a> <a href="#delete-form" data-toggle='modal' data-target='#d{{ass.fm_id}}' class="btn btn-xs btn-danger"> Delete </a>  <a href="setup-form.php?fm={{ass.fm_id}}" class="btn btn-xs btn-success"> Setup Form Fields </a> </td>
                                        </tr> 
                                       
                                    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

<!-- 	<?php // require("delete-product-modal.php") ; ?>	 -->


		
	 <!-- <?php // require("edit-cat-modal.php") ; ?>	 -->





	 <div   ng-repeat="ass in forms.fm"  class="modal fade" id="e{{ass.fm_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Edit  {{ass.fm_title}} </h3>
      </div>
      <div class="modal-body">
      <form method="post" action="update.php?obj=student">
      
              <div class="form-group">
                      <label> Form Title </label>
                          <div class="controls">
                                <input type="text" class="form-control" value="{{ass.fm_title}}" name="name" autocomplete="off" />
                        </div>
                   </div>


                  <div class="form-group">
                      <label >Discription </label>
                          <div class="controls">
                              <textarea name="fm_discrip" class="form-control">{{ass.fm_discrip}}</textarea>
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
