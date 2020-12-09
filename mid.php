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
						<h1><img src="logo.png"><a href="index.html"></a></h1>
						</div>
					</div>
					<?php
					$filename = basename($_SERVER['REQUEST_URI']);
					//echo $filename;
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
