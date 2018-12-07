  
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Biomasa</title>
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

	<script src="js/amcharts.js"></script>	
	<script src="js/serial.js"></script>	
	<script src="js/light.js"></script>	
	<script src="js/radar.js"></script>	
	<link href="css/barChart.css" rel='stylesheet' type='text/css' />
	<link href="css/fabochart.css" rel='stylesheet' type='text/css' />

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
							<li class="active">Reportes</li>
						</ol>
					</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
					<div id="tabs" class="tabs">
						<h1 style="padding-left: 50px; font-weight: bold">BIOMASA</h1>
						<div class="graph">
							<nav>	
								<ul>
									<li><a href="#section-1" class="icon-shop"><i class="lnr lnr-chart-bars"></i><span style="padding-left: 5px;">Peso - Fecha</span></a></li>
									<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-chart-bars"></i><span style="padding-left: 5px;">Biomasa</span></a></li>
								</ul>
							</nav>
							<div class="content tab">
								<section id="section-1">
									<div class="graph-2 general">
										<h2 style="color:#052963; font-size: 1.8em; padding-bottom: 15px;">Peso - Fecha</h2>
										<div class="section-1">
											<form class="form-horizontal" data-model="BiomasaViewModel" data-bind="submit:get">
												<div class="col-md-8">
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Fecha</label>
														<div class="col-sm-8">
															<input type='text' data-bind="value:fecha" class="form-control pickadate-dropdown" placeholder="fecha"
															/>
															<div class="input-group-append">
																<span class="input-group-text">
																	<span class="la la-calendar-o"></span>
																</span>
															</div>
														</div>
														<div class="col-md-12 general">Entre</div>
														<label for="inputEmail3" class="col-sm-2 control-label">Fecha</label>
														<div class="col-sm-8">
															<input type='text' data-bind="value:fecha2" class="form-control pickadate-dropdown" placeholder="fecha"
															/>
															<div class="input-group-append">
																<span class="input-group-text">
																	<span class="la la-calendar-o"></span>
																</span>
															</div>
														</div>
													</div>
													<div class="col-sm-offset-4">
														<button type="submit" class="btn btn-default">Buscar</button>
														<button type="reset" class="btn btn-default">Limpiar</button> 
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="clearfix"> </div>
									<div class="graph-2 general">
										<table class="table table-stripped table-bordered" data-model="BiomasaViewModel">
											<thead>
												<tr>
													<th>Centro de Cultivo</th>
													<th>peso inmersión</th>
													<th>peso emersión</th>
													<th>Fecha</th>
													<th>Acción</th>
												</tr>
											</thead>
											<tbody data-bind="foreach:cuelga">
												<tr >
													<td data-bind="text:nombre_centro"></td>
													<td data-bind="text:peso_inmersion"></td>
													<td data-bind="text:peso_emersion"></td>
													<td data-bind="text:fecha"></td>
													<td>
														<a data-bind="click: $parent.edit"><i class="la la-pencil"></i></a>
														<a data-bind="click: $parent.delete"><i class="la la-remove"></i></a>
													</td>
												</tr>
											</tbody> 
										</table>
									</div>
									<div class="clearfix"> </div>
									<div class="col-md-12 general" style="padding-top: 50px">
										<h3 class="sub-tittle">Gráfico Peso-Fecha</h3>
										<div id="chartdiv2"></div>  
									</div>
									<div class="clearfix"> </div>
								</section>
								<section id="section-2">
									<div class="graph-2 general">
										<h2 style="color:#052963; font-size: 1.8em; padding-bottom: 15px;">Biomasa</h2>
										<div class="section-1">
											<form class="form-horizontal" data-model="BiomasaViewModel" data-bind="submit:getfecha2">
												<div class="col-md-8">
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Fecha</label>
														<div class="col-sm-8">
															<input type='text' data-bind="value:fecha3" class="form-control pickadate-dropdown" placeholder="fecha"
															/>
															<div class="input-group-append">
																<span class="input-group-text">
																	<span class="la la-calendar-o"></span>
																</span>
															</div>
														</div>
													</div>
													<div class="col-sm-offset-4">
														<button type="submit" class="btn btn-default">Buscar</button>
														<button type="reset" class="btn btn-default">Limpiar</button> 
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="clearfix"> </div>
									<div class="graph-2 general">
										<table class="table table-stripped table-bordered" data-model="BiomasaViewModel">
											<thead>
												<tr>
													<th>Centro de Cultivo</th>
													<th>peso inmersión</th>
													<th>peso emersión</th>
													<th>Fecha</th>
													<th>Acción</th>
												</tr>
											</thead>
											<tbody data-bind="foreach:cuelga2">
												<tr >
													<td data-bind="text:nombre_centro"></td>
													<td data-bind="text:peso_inmersion"></td>
													<td data-bind="text:peso_emersion"></td>
													<td data-bind="text:fecha"></td>
													<td>
														<a data-bind="click: $parent.edit"><i class="la la-pencil"></i></a>
														<a data-bind="click: $parent.delete"><i class="la la-remove"></i></a>
													</td>
												</tr>
											</tbody> 
										</table>
									</div>
									<div class="clearfix"> </div>
									<div class="col-md-12 general" style="padding-top: 50px">
										<h3 class="sub-tittle">Gráfico Biomasa-Fecha</h3>
										<div id="chartdiv3"></div>  
									</div>
									<div class="clearfix"> </div>
								</section>
							</div><!-- /content -->
						</div><!--//graph-->
					</div><!-- /tabs -->
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

	<script type="text/javascript" src="js/vroom.js"></script>
	<script type="text/javascript" src="js/TweenLite.min.js"></script>
	<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
	<script src="js/jquery.livequery.min.js"></script>
	<script src="js/knockout-3.4.2.js"></script>
	<script src="js/knockout.multimodels-0.1.min.js"></script>
	<script src="js/biomasa.js"></script> 
	<script src="js/global.js"></script>
</body>
</html>