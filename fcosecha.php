 
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Cosecha</title>
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
	<!--clock init-->
	<script src="js/css3clock.js"></script> 
	<!--Easy Pie Chart-->
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
	<!-- END Page Level CSS-->
</head> 
<body>
	<?php include ('seccionheader.php'); ?>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!--//outer-wp-->
				<div class="outter-wp">
					<!--/sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="index.php">Home</a></li>
							<li class="active">Formularios</li>
						</ol>
					</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
					<div id="tabs" class="tabs">
						<h1 style="padding-left: 50px; font-weight: bold">COSECHA</h1>
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
										<h2 style="color:#052963; font-size: 1.8em; padding-bottom: 15px;">Formulario de Cosecha</h2>
										<div class="form-body">
											<form class="form-horizontal" data-model="CosechaViewModel" data-bind="submit:save"> 
												<div class="col-md-6 general">
													<h3 class="inner-tittle two">Ubicación</h3>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Centro Cultivo</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: centroa, optionsText: 'nombre_centro', optionsValue: 'id_c_cultivo', value: centro, optionsCaption: 'Elegir ...',event:{change:getcuadrantea}">
															</select>
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Cuadrante</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: cuadrantea, optionsText: 'nombre_cuadrante', optionsValue: 'id_cuadrante', value: cuadrante, optionsCaption: 'Elegir ...',event:{change:getlineaa}">
															</select>
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Línea</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: lineaa, optionsText: 'nombre_linea', optionsValue: 'id_linea', value: linea, optionsCaption: 'Elegir ...'">
															</select>
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Proyecto Siembra</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: proyectoa, optionsText: 'nombre_proyecto', optionsValue: 'id_proyecto', value: proyecto, optionsCaption: 'Elegir ...',event:{change:getsiembra}"">
															</select>
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Siembra</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: siembras, optionsText: 'folio_siembra', optionsValue: 'id_siembra', value: siembra, optionsCaption: 'Elegir ...',event:{change:getstock}">
															</select>
														</div>
													</div>
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-4 control-label">Cuelgas Sembradas</label> 
														<div class="col-sm-2"> 
															<input type="text" class="form-control" data-bind="value: stock" readonly="readonly">
														</div> 
														<label for="inputEmail3" class="col-sm-1 control-label">Crear</label> 
														<div class="col-sm-2"> 
															<input type="text" class="form-control" data-bind="value:crear,event:{change:getsaldo}" >
														</div> 
														<label for="inputEmail3" class="col-sm-1 control-label">Saldo</label> 
														<div class="col-sm-2"> 
															<input type="text" class="form-control" data-bind="value: saldo" id="focusedinput" readonly="readonly">
														</div> 
													</div>
												</div>
												<div class="col-md-6 general">
													<h3 class="inner-tittle two">Creación</h3>
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
														<label for="inputEmail3" class="col-sm-4 control-label">Folio cosecha</label> 
														<div class="col-sm-8"> 
															<input type="text" data-bind="value:folio" class="form-control" id="focusedinput" placeholder="Default Input">
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Nombre embarcación</label> 
														<div class="col-sm-8"> 
															<select class="form-control" data-bind="options: embarcaciones, optionsText: 'nombre_embarcacion', optionsValue: 'id_embarcacion', value: embarcacion, optionsCaption: 'Elegir ...',event:{change:getpatente}">
															</select>
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Patente embarcación</label> 
														<div class="col-sm-8"> 
															<input type="text" data-bind="value:patente" class="form-control" id="focusedinput" placeholder="Default Input" readonly="readonly">
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Kilos Promedios</label> 
														<div class="col-sm-8"> 
															<input type="text" data-bind="value:peso" class="form-control" id="focusedinput" placeholder="Default Input">
														</div>
													</div>
													<div class="form-group"> 
														<label for="inputEmail3" class="col-sm-4 control-label">Cantidad Bin llenos</label> 
														<div class="col-sm-8"> 
															<input type="text" data-bind="value:bin" class="form-control" id="focusedinput" placeholder="Default Input">
														</div>
													</div>
												</div>
												<div class="col-md-6 general">
													<h3 class="inner-tittle two">Responsables</h3>
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-4 control-label">Responsable cosecha</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: responsables, optionsText: 'nombre', optionsValue: 'id_persona', value: res1, optionsCaption: 'Elegir ...'">
															</select>
														</div> 
													</div>
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-4 control-label">Responsable cosecha</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: responsables, optionsText: 'nombre', optionsValue: 'id_persona', value: res2, optionsCaption: 'Elegir ...'">
															</select>
														</div> 
													</div>
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-4 control-label">Responsable cosecha</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: responsables, optionsText: 'nombre', optionsValue: 'id_persona', value: res3, optionsCaption: 'Elegir ...'">
															</select>
														</div> 
													</div>
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-4 control-label">Responsable cosecha</label>
														<div class="col-sm-8">
															<select class="form-control" data-bind="options: responsables, optionsText: 'nombre', optionsValue: 'id_persona', value: res4, optionsCaption: 'Elegir ...'">
															</select>
														</div> 
													</div>
													<div class="col-sm-offset-2">
														<button type="submit" class="btn btn-default">Agregar</button>
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
											<table class="table table-stripped table-bordered" data-model="CosechaViewModel">
												<thead>
													<tr>
														<th>Folio</th>
														<th>Fecha de Inicio</th>
														<th>Peso Promedio</th>
														<th>Cantidad Bins</th>
														<th>Embarcación</th>
														<th>Cuelga cosechada</th>
														<th>Responsable</th>
														<th>Responsable</th>
														<th>Responsable</th>
														<th>Responsable</th>
														<th>Folio siembra</th>
														<th>Acción</th>
													</tr>
												</thead>
												<tbody data-bind="foreach:cosecha">
													<tr>
														<td data-bind="text:folio_cosecha"></td><!--//campos de tabla BD-->
														<td data-bind="text:fecha_inicio"></td>
														<td data-bind="text:peso_prom"></td>
														<td data-bind="text:cantidad_bins"></td>
														<td data-bind="text:nombre_embarcacion"></td>
														<td data-bind="text:unidad_cuelga"></td>
														<td data-bind="text:responsable_1"></td>
														<td data-bind="text:responsable_2"></td>
														<td data-bind="text:responsable_3"></td>
														<td data-bind="text:responsable_4"></td>
														<td data-bind="text:folio_siembra"></td>
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
						</div>
						<!-- /tabs -->
					</div>
					<script src="js/cbpFWTabs.js"></script>
					<script>new CBPFWTabs( document.getElementById( 'tabs' ) );</script>
				</div>
				<!--//outer-wp-->
			</div>
		</div>
		<!--//content-inner-->
		<footer>
			<p>&copy 2016 Augment . All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts.</a></p>
		</footer>
		<!--/sidebar-menu-->
		<?php include ('sidebarmenu.php'); ?>
		<div class="clearfix"></div>		
	</div>
	
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
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
	<script src="js/cosecha.js"></script> 
	<script src="js/global.js"></script>
</body>
</html>