<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<!--script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="js/modernizr.custom.97074.js"></script>
<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<!--lightboxfiles-->
<script type="text/javascript">
	$(function() {
	$('.team a').Chocolat();
	});
</script>	
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
						<script type="text/javascript">
							$(function() {
							
								$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

							});
						</script>						
<!--script-->
</head>
<body>
	<!---header--->
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand">
								<h1><a href="index.html"><span class="a">Ced <span class="b">Hosting</span></span></a></h1>
							</div>
                        </div>
                        <?php
                        $filename = basename($_SERVER['REQUEST_URI']);
                        echo $filename;
                        $menu = array('index.php','about.php','services.php','blog.php','pricing.php' ,'contact.php','Login.php','linuxhosting.php','wordpresshosting.php','windowshosting.php','cmshosting.php');
                        ?>
			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav <?php if(in_array($filename, $menu)) { ?> current <?php } ?> ">
								<li <?php if($filename == 'index.php') { ?> class="active"<?php }  ?> ><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li <?php if($filename == 'about.php') { ?> class="active"<?php }  ?> ><a href="about.php">About</a></li>
								<li <?php if($filename == 'services.php') { ?> class="active"<?php }  ?> ><a href="services.php">Services</a></li>
								<li <?php if($filename == 'linuxhosting.php' || $filename == 'wordpresshosting.php' || $filename == 'windowshosting.php' || $filename == 'cmshosting.php') { ?> class="dropdown active"<?php }  ?> >
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">
										<li><a href="linuxhosting.php">Linux hosting</a></li>
										<li><a href="wordpresshosting.php">WordPress Hosting</a></li>
										<li><a href="windowshosting.php">Windows Hosting</a></li>
										<li><a href="cmshosting.php">CMS Hosting</a></li>
									</ul>			
                                </li>
                                <li <?php if($filename == 'blog.php') { ?> class="active"<?php }  ?>><a href="blog.php">Blog</a></li>
                                <li <?php if($filename == 'pricing.php') { ?> class="active"<?php }  ?>><a href="pricing.php">Pricing</a></li>
                                <li <?php if($filename == 'contact.php') { ?> class="active"<?php }  ?>><a href="contact.php">Contact</a></li>
                                <li ><a><i class="fas fa-shopping-cart"></i></a></li>
                                <li <?php if($filename == 'login.php') { ?> class="active"<?php }  ?> ><a href="login.php">Login</a></li>
                                <!--<li><a href="logout.php">Logout</a></li>-->
							</ul>	  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	<!---header--->