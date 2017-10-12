<?php 
// session_name("sifs") ;
session_start();

$fm = $_GET['fm'] ;

require("../api/functions.php") ;
?>
 <!DOCTYPE html>
<html  ng-app="AutoForms">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> - Form-Setup  </title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <script src="js/angular.js" type="text/javascript"></script>
        <script src="app.js"></script>Agency
        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>

    <body  ng-controller="SetupFormsCtrl" >
    	<?php require("header.php") ; ?>
    	
    	<?php require("sidebar.php") ; ?>
    	<!--/.sidebar-->
    		
    	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    		<div class="row">
    			<ol class="breadcrumb">
    				<li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    				<li class="active">Setup Form</li>
    			</ol>
    		</div><!--/.row-->
    		
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="page-header">Setup {{forms.fm[0].fm_title}} </h1>
    			</div>
    		</div><!--/.row-->
    				

    		
    		<div class="row" >
    			<div class="col-md-12">
    				<div class="panel panel-default">
    					<div class="panel-heading">
    					<span class="pull-right" >  <a href="#setup-form" data-toggle="modal" data-target="#addField" class="btn btn-success"> + Add  Form Fields  </a></span>
    					<h3>  {{forms.fm[0].fm_title}} </h3></div>
    					<div class="panel-body">
    					  <table   class="table table-striped datatable bootstrap-datatable" id="data" >
    						   <thead>
                                    <tr>
                                        <th> Fields Title </th>
                                        <!-- <th> Field Name </th> -->
                                        <th> Field Type </th>
                                        <th> Discription </th>
                                        <th> </th>
                                    </tr>
                                 </thead>
                                <tbody>
                                    <tr class="odd gradeX"  ng-repeat="ass in fields.fd">
                                        <td> {{ass.fd_title}}  </td>
                                        <!--  <td> {{ass.fd_name}}  </td> -->
                                        <td> {{ass.typ_name}}  </td>
                                        <td> {{ass.fd_discrip}}  </td>
                                        <td><a href="#edit-form" data-toggle='modal' data-target='#e{{ass.fm_id}}' class="btn btn-xs btn-primary"> Edit </a> 

                                        <a href="#" data-toggle='modal' data-target='#add{{ass.fm_id}}'  class="btn btn-warning btn-xs"  ng-show="ass.typ_name === 'select'"> Add Option </a>

                                        <a href="" class="btn btn-success btn-xs"  ng-show="ass.typ_name === 'select'"> View Option </a>
                                        <!-- <a href="#delete-form" data-toggle='modal' data-target='#d{{ass.fm_id}}' class="btn btn-xs btn-danger"> Delete </a>  <a href="setup-form.php" class="btn btn-xs btn-success"> Setup Form Fields </a>  -->
                                        </td>
                                    </tr> 
                                   
                                </tbody>
                                <tfoot>
                                	<tr>
                                		<td><br><br>
                                		<a class="btn btn-block btn-success" href="view-form.php?fm=<?php echo "$fm"; ?>"> View Form</a>
                                		</td>
                                	</tr>
                                </tfoot>
    						</table>
    					</div>
    				</div>
    			</div>
    		</div><!--/.row-->	
            
            <?php  require("add-option-modal.php") ; ?>	 
    		

            <div class="modal fade" id="addField" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel"> Add Form Field   </h3>
                        </div>
                        <div class="modal-body">
                            <form method="post" ng-submit="AddFormField()">
                      
                                <div class="form-group">
                                    <label> Field  Title </label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="" name="fd_title" ng-model="ff.fd_title" autocomplete="off" />
                                    <span class="help-inline" style="color:red;"  ng-show="errorfd_title">{{errorfd_title}}</span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label >Input type </label>
                                    <div class="controls">
                                        <select class="form-control" ng-model="ff.fd_type"  name="fd_type">
                                            <option> Select Input type</option>
                                            <option ng-repeat="typ in inputs.typ" value="{{typ.typ_id}}">{{typ.typ_name}}</option>

                                        </select>
                                        <span class="help-inline" style="color:red;"  ng-show="errorfd_type">{{errorfd_type}}</span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label >Discription </label>
                                    <div class="controls">
                                        <textarea name="fd_discrip" class="form-control" ng-model="ff.fd_discrip" ></textarea>
                                        <span class="help-inline" style="color:red;"  ng-show="errorfd_discrip">{{errorfd_discrip}}</span>
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
                // $(document).ready(function () {
                //     $('#data').dataTable();
                // });
        </script>
        
        <script>

        	var FM =  <?php echo "$fm"; ?>


        </script>
       
    </body>

</html>
