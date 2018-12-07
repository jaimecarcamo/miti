<!DOCTYPE html>  
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
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
</head>
<body>
	<div class="sidebar-menu">
		<header class="logo">
			<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.php"> <span id="logo"><img src="images/mline.png" height="50" ></span> 
				<!--<img id="logo" src="" alt="Logo"/>--> 
			</a> 
		</header>
		<!--//inicio menu-->
		<div class="menu">
			<ul id="menu" >
				<li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Maestros</span> <span class="fa fa-angle-right" style="float: right"></span></a>
					<ul id="menu-academico-sub" >
						<li id="menu-academico-avaliacoes" ><a href="forms.html">Usuarios</a></li>
						<li id="menu-academico-avaliacoes" ><a href="validation.html">Holding</a></li>
						<li id="menu-academico-avaliacoes" ><a href="table.html">Empresa</a></li>
						<li id="menu-academico-avaliacoes" ><a href="buttons.html">Organigrama</a></li>
						<li id="menu-academico-avaliacoes" ><a href="table.html">Tablas</a></li>
						<li id="menu-academico-avaliacoes" ><a href="validation.html">Bodegas</a></li>
						<li id="menu-academico-avaliacoes" ><a href="table.html">Productos</a></li>
						<li id="menu-academico-avaliacoes" ><a href="farea.php">Área</a></li>
					</ul>
				</li>
				<li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Formularios</span> <span class="fa fa-angle-right" style="float: right"></span></a>
					<ul id="menu-academico-sub" >
						<li id="menu-academico-avaliacoes" ><a href="fcentrocultivo.php">F. Centro de Cultivo</a></li>
						<li id="menu-academico-avaliacoes" ><a href="fcuadrante.php">F. Cuadrante</a></li>
						<li id="menu-academico-avaliacoes" ><a href="flinea.php">F. Linea</a></li>
						<li id="menu-academico" ><a href="#"><span>F. Siembra</span><span class="fa fa-angle-right" style="padding-left: 15px"></span></a>
							<ul id="menu-academico-sub" style="width: 180px">
								<li id="menu-academico-avaliacoes" ><a href="fproyectosiembra.php">F. Proyecto Siembra</a></li>
								<li id="menu-academico-avaliacoes" ><a href="fbodegaproducto.php">F. Bodega Producto</a></li>
								<li id="menu-academico-avaliacoes" ><a href="fordensiembra.php">F. Orden Siembra</a></li>
								<li id="menu-academico-avaliacoes" ><a href="fsiembra.php">F. Siembra Colector</a></li>
							</ul>
						</li>
						<li id="menu-academico-avaliacoes" ><a href="fcosecha.php">F. Cosecha</a></li>
						<li id="menu-academico-avaliacoes" ><a href="fmuestreo.php">F. Muestreo</a></li>
					</ul>
				</li>
				<li id="menu-academico" ><a href="#"><i class="lnr lnr-chart-bars"></i><span>Reportes</span> <span class="fa fa-angle-right" style="float: right"></span></a>
					<ul id="menu-academico-sub" >
						<li id="menu-academico-avaliacoes" ><a href="rbiomasa.php">R. Biomasa</a></li>
						<li id="menu-academico-avaliacoes" ><a href="rbiomasa.php">R. Biomasa</a></li>
						<li id="menu-academico-avaliacoes" ><a href="rbiomasa.php">R. Biomasa</a></li>
					</ul>	
				</li>	
			</ul>
		</div>
		<!--//fin menu-->
	</div>
	<div class="clear-fix"></div>

	<!--//despliega sidebar menu-->
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({"position":"relative"});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	
</body>
</html>