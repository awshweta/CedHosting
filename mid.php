<?php 
include_once("Product.php");
include_once("Dbcon.php");
$product = new Product();
$db = new Dbcon();
$result =$product->fetchCategory($db->conn);
?>
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
						<h1><img src="logo.png"><a></a></h1>
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
									<?php
										if ($result->num_rows > 0) {
										while ($row=$result->fetch_assoc()) {?>
											<li><a href="catpage.php?id=<?php echo $row['id']; ?>"><?php echo $row['prod_name']; ?></a></li>
										<?php }
									}
									?>
								</ul>			
							</li>
							<li <?php if($filename == 'blog.php') { ?> class="active"<?php }  ?>><a href="blog.php">Blog</a></li>
							<li <?php if($filename == 'pricing.php') { ?> class="active"<?php }  ?>><a href="pricing.php">Pricing</a></li>
							<li <?php if($filename == 'contact.php') { ?> class="active"<?php }  ?>><a href="contact.php">Contact</a></li>
							<li ><a><i class="fas fa-shopping-cart"></i></a></li>
							<?php if(isset($_SESSION['user'])) { ?>
								<li <?php if($filename == 'logout.php') { ?> class="active"<?php }  ?> ><a href="logout.php">Logout</a></li>
							<?php } 
							else { ?>
								<li <?php if($filename == 'login.php') { ?> class="active"<?php }  ?> ><a href="login.php">Login</a></li>
							<?php } ?>
							<!--<li><a href="logout.php">Logout</a></li>-->
						</ul>	  
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>
