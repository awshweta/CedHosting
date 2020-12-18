<?php include("header.php"); ?>
<!--script-->
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
</head>
<body>
	<!---header--->
	<?php include_once("mid.php"); ?>	
	<!---header--->
	<!---banner--->
            <div class="contain container-fluid mt--20">
                <div class="row">
                        <div class="col-xl-12 col-lg-12">
                        <table class="cartTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Billing Cycle</th>
                                    <th>Product Price</th>
                                    <th>Sku</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
    <script src="user.js"></script>
<?php include "footer.php"; ?>

