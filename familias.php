<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); 
if (!isset($_SESSION['username'])){
header("Location: signin.php");
}
require_once("class/clases.php");

require_once("class/AppException.php");
$cm = new ConfigurationManager();

/* Consultas de selección que devuelven un conjunto de resultados */


						?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Softlab</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>

  
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
<!--Incluimos el editor de texto enriquecido-->
<script src="ckeditor/ckeditor.js"></script>    
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>
<script>
function modificafamilia(params)
    {
        cadena=params.split("+");
        document.getElementById("id").value=cadena[0];
        document.getElementById("familia").value=cadena[1];
        
    }
</script>		

<!----->
</head>
<body>
<div id="wrapper">
     <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="index.html">Softlab</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
            <div class="clearfix"> </div>
           </div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
		           

		          		           <?php include("inc/perfil.inc");?>
		         
	
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>

		    <div class="navbar-default sidebar" role="navigation"> <!--	Comienza Menu Lateral  -->
                <div class="sidebar-nav navbar-collapse"> <!--Div navbar-collapse	  -->
                 <!--A reemplazar por menu dinamico	  -->
                 <?php $cm->crear_menu_padre_bst();
                ?>
            </div> <!-- FIN Div navbar-collapse	  -->
			</div> <!--	FIN Menu Lateral  -->
        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <div class="banner">
		     		           <div class="alert alert-danger" id="mensaje_error" role="alert" hidden>Error: existen <?php if(isset($_GET['error'])){echo $_GET['error'];} ?> subfamilias asociadas a esta familia, elimine primero las subfamilias y luego podrá eliminar la familia</div> 
		    	<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Familias</span>
				</h2>
		    </div>
		<!--//banner-->
<div class="justaround">
   <h5>Familias de equipos</h5>
    <a href="#" class="btn btn-primary btn-xl" style="margin-top: 0px; margin-right: 0px;" data-href="#" data-toggle="modal" data-target="#myFormModal">
            <i class="fa fa-plus"></i><span class="hidden-sm hidden-xs">  Crear Familia<span/></a>   
           </div>               
                   
                    <div class="marcotrabajo" data-example-id="contextual-table">
						<table class="table">
						  <thead>
							<tr>
							  <th>#</th>
							  <th>Familia</th>
							  <th>Acciones</th>
							</tr>
						  </thead>
						  <tbody>
						  <?php
                           
                              $resultado = $cm->getListaFamilias();
                              while ($row=mysql_fetch_array($resultado)){ 
                              ?>
							<tr class="active">
							  <th scope="row"><?php echo $row[0];?></th>
							  <td><?php echo $row[1];?></td>
							  <td><a href="#" onclick="modificafamilia('<?php echo $row[0].'+'.$row[1];?>')" data-toggle="modal" data-target="#myFormModal"><i class="fa fa-edit nav_icon"></i></a>
							  <a href="#" data-href="class/manager_abms.php?accion=eliminafamilia&id=<?php echo $row[0];?>" data-toggle="modal" data-target="#myModalConfirm"><i class="fa fa-trash-o"></i></a></td>
							</tr>
							
							<?php } ?>
							<tr>
						  </tbody>
						</table>
					   </div>				
		
		


    
     <div class="modal fade" id="myFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h2 class="modal-title">Alta de Familia</h2>
				</div>
				<div class="modal-body">
<!--Formulario visible-->
 	<div class="grid-form">
 		<div class="grid-form1">
 		<h3 id="forms-example" class="">Nueva Familia</h3>
 		<form action="class/manager_abms.php" id="contact_form" method="post">
  <div class="form-group">
   <input type="hidden" name="abm" value="familia" >
   <input type="hidden" name="id" id="id" value="0">
    <label for="exampleInputMenu">Familia</label>
    <input type="text" class="form-control" id="familia" name ="familia" placeholder="Nombre de la Familia">
  </div>

<!--  <button type="submit" class="btn btn-default">Submit</button>-->
</form>
</div>
        </div>
                    </div>
<!--Fin Formulario visible-->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<a class="btn btn-danger" id="submitForm">Agregar</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
    </div><!-- /.formmodal -->



     <div class="modal fade" id="myModalConfirm" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h2 class="modal-title">Confirmación</h2>
				</div>
				<div class="modal-body">
					<p>Esta seguro de eliminar la familia??</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<a class="btn btn-danger btn-ok">Eliminar</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
     </div>
		<script>
            $('#myModalConfirm').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            
            
            

/* must apply only after HTML has loaded */
$(document).ready(function () {
    $("#contact_form").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {

                $("#contact_form").modal('toggle');
                        location.reload();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });
     
    $("#submitForm").on('click', function() {
        $("#contact_form").submit();
        location.reload();
    });
});

         </script>
<script>
<?php
if(isset($_GET['error'])){?>
$('#mensaje_error').show();	
<?php }else{?>
$('#mensaje_error').hide();	
<?php }?>
</script>	

		<div class="clearfix"> </div>
       </div>
     <!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
<!---->

</body>
</html>

