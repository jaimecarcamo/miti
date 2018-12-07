     
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML> 
<html>
<head>
	<title>Osiembra</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/custom-styles.css" rel='stylesheet' type='text/css' /> 
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>
	<!--//skycons-icons-->

	<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
	rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/daterange/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/pickadate/pickadate.css">
	<!-- END VENDOR CSS-->

	<!-- BEGIN Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css">
	
</head> 
<body >
	<?php include ('seccionheader.php'); ?>
	<div class="page-container">
		<div class="left-content">
			<div class="inner-content">	
				<div class="outter-wp">
					<!--/sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="index.php">Home</a></li> 
							<li class="active">Formularios</li>
						</ol>
					</div>	
					<!--/pestañas-->	
					<div id="tabs" class="tabs">
						<h1 style="padding-left: 50px;font-weight: bold">ORDEN DE SIEMBRA</h1>
						<div class="graph">
							<nav>
								<ul>
									<li><a href="#section-1" class="icon-shop"><i class="fa fa-file-text-o"></i><span style="padding-left: 5px;">Formulario</span></a></li>
									<li><a href="#section-2" class="icon-cup"><i class="fa fa-table"></i></i><span style="padding-left: 5px;">Registro</span></a></li>
								</ul>
							</nav>
							<div class="content tab">
								<section id="section-1">
									<div class="graph-2 general">
										<h2 style="color:#052963; font-size: 1.8em; padding-bottom: 15px;">Formulario de Orden de siembra </h2>
										<div class="form-body">
											<form class="form-horizontal" data-model="OrdensViewModel" data-bind="submit:save">
												<div class="col-md-6 general">
													<h3 class="inner-tittle two">Creación</h3>	
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Código de Orden</label> 
														<div class="col-sm-8"> 
															<input type="text" data-bind="value:folio" class="form-control" id="focusedinput" placeholder="Default Input">
														</div> 
													</div>
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-4 control-label">Fecha Inicio</label>
														<div class="col-sm-8">
															<input type='text' data-bind="value:fecha_i" class="form-control pickadate-dropdown" placeholder="fecha"
															/>
															<div class="input-group-append">
																<span class="input-group-text">
																	<span class="la la-calendar-o"></span>
																</span>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-4 control-label">Emitido</label>
														<div class="col-sm-8">
															<input type="text" data-bind="value:emitido" class="form-control" id="focusedinput" placeholder="Default Input">
														</div> 
													</div>
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-4 control-label">Autorizado</label>
														<div class="col-sm-8">
															<input type="text" data-bind="value:autorizado" class="form-control" id="focusedinput" placeholder="Default Input">
														</div> 
													</div>
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-4 control-label">Transporte</label>
														<div class="col-sm-8">
															<input type="text" data-bind="value:transporte" class="form-control" id="focusedinput" placeholder="Default Input">
														</div> 
													</div>
												</div>
												<div class="col-md-6 general">
													<h3 class="inner-tittle two">Ubicación</h3>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Bodega producto</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: bodegas, optionsText: 'nombre_b_producto', optionsValue: 'id_b_producto', value: bodega, optionsCaption: 'Elegir ...',event:{change:getcolectora}">
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-6 general">	
													<h3 class="inner-tittle two">Orden</h3>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Producto</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: tcentroa, optionsText: 'd_centro', optionsValue: 'id_tipo_centro', value: tcentro, optionsCaption: 'Elegir ...'">
															</select>
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Colector</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: colectora, optionsText: 'nombre_colector', optionsValue: 'id_colector', value: colector, optionsCaption: 'Elegir ...',event:{change:getdatoscolector}">
															</select>
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Kilos colector</label>
														<div class="col-sm-2">
															<input type="text" data-bind="value:stock" class="form-control" id="focusedinput" readonly="readonly">
														</div> 
														<label for="inputEmail3" class="col-sm-1 control-label">Crear</label>
														<div class="col-sm-2">
															<input type="text" data-bind="value:crear, event:{change:getsaldo}" class="form-control" id="focusedinput">
														</div>
														<label for="inputEmail3" class="col-sm-1 control-label">Saldo</label> 
														<div class="col-sm-2">
															<input type="text" data-bind="value:saldo" class="form-control" id="focusedinput" readonly="readonly">
														</div> 
													</div>
													<div class="col-sm-offset-2">
														<button type="submit" class="btn btn-default">Guardar</button>
														<button type="reset" class="btn btn-default">Limpiar</button> 
													</div>
												</div>	 
											</form> 
										</div>
									</div>														
								</section>
								<section id="section-2">
									<div class="graph-2 general">
										<h2 style="color:#052963; font-size: 1.8em; padding-bottom: 15px;">Registro</h2>
										<div>
											<table class="table table-stripped table-bordered" data-model="OrdensViewModel">
												<thead>
													<tr>
														<th>Folio</th>
														<th>Bodega Insumo</th>
														<th>Fecha de Inicio</th>
														<th>Autorizado</th>
														<th>Transporte</th>
														<th>Emitido</th>
														<th>Producto</th>
														<th>Cantidad</th>
														<th>Colector</th>
														<th>Acción</th>
													</tr>
												</thead>
												<tbody data-bind="foreach:ordens">
													<tr>
														<td data-bind="text:folio_o_siembra"></td>
														<td data-bind="text:nombre_b_producto"></td>
														<td data-bind="text:fecha_inicio"></td>
														<td data-bind="text:autorizado"></td>
														<td data-bind="text:transporte"></td>
														<td data-bind="text:emitido"></td>
														<td data-bind="text:d_centro"></td>
														<td data-bind="text:cantidad"></td>
														<td data-bind="text:colector"></td>
														<td>
															<a data-bind="click: $parent.edit"><i class="la la-pencil"></i></a>
															<a data-bind="click: $parent.delete"><i class="la la-remove"></i></a>
														</td>
													</tr>
												</tbody> 
											</table>
										</div>
									</div>
									<div class="clearfix"> </div>
								</section>
							</div><!-- /content -->
						</div><!--//graph-->
					</div><!-- /tabs -->
					<script src="js/cbpFWTabs.js"></script>
					<script>new CBPFWTabs( document.getElementById( 'tabs' ) );</script> 

				</div><!--//outer-wp-->
			</div><!--//inner-content-->
		</div>
		<footer>
			<p>&copy 2016 Augment . All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts.</a></p>
		</footer>
		<?php include ('sidebarmenu.php'); ?>
		<div class="clearfix"></div>
	</div>

	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<!-- BEGIN VENDOR JS-->
	<script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
	<!-- BEGIN VENDOR JS-->
	<!-- BEGIN PAGE VENDOR JS-->
	<script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
	<script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
	<script src="app-assets/vendors/js/pickers/pickadate/picker.js" type="text/javascript"></script>
	<script src="app-assets/vendors/js/pickers/pickadate/picker.date.js" type="text/javascript"></script>
	<script src="app-assets/vendors/js/pickers/pickadate/picker.time.js" type="text/javascript"></script>
	<script src="app-assets/vendors/js/pickers/pickadate/legacy.js" type="text/javascript"></script>
	<script src="app-assets/vendors/js/pickers/daterange/daterangepicker.js"
	type="text/javascript"></script>
	<!-- END PAGE VENDOR JS-->
	<!-- BEGIN MODERN JS-->
	<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
	<script src="app-assets/js/core/app.js" type="text/javascript"></script>
	<script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
	<!-- END MODERN JS-->
	<!-- BEGIN PAGE LEVEL JS-->
	<script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
	<script src="app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"
	type="text/javascript"></script>
	<!-- END PAGE LEVEL JS-->

	<script src="js/jquery.livequery.min.js"></script>
	<script src="js/knockout-3.4.2.js"></script>
	<script src="js/knockout.multimodels-0.1.min.js"></script>
	<script src="js/ordens.js"></script> 
	<script src="js/global.js"></script> 

</body>
</html>