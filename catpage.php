<?php 
if(isset($_GET['id'])) {
    include_once("Product.php");
    include_once("Dbcon.php");
    $db = new Dbcon();
    $product = new Product();
    $id = $_GET['id'];
    $r = false;
    $ret = $product->fetchSpecificCategory($id, $db->conn);
    if ($ret->num_rows == 0) {
        header('location:index.php');
    }
    $prod = $product->fetchAvailableProduct($id, $db->conn); 
    include("header.php");
?>
    <link rel="stylesheet" href="css/swipebox.css">
            <script src="js/jquery.swipebox.min.js"></script> 
                <script type="text/javascript">
                    jQuery(function($) {
                        $(".swipebox").swipebox();
                    });
                </script>				
</head>
<body>
    <!---header--->
    <?php include_once("mid.php"); ?>	
    <!---header--->
                <div class="content">
                    <div class="linux-section">
                        <div class="container">
                            <div class="linux-grids">
                                <div class="col-md-8 linux-grid">
                                <?php 
                                if ($ret->num_rows > 0) {
                                    while ($row = $ret->fetch_assoc()) { ?>
                                        <h2><?php echo $row['prod_name']; ?></h2>
                                        <?php echo json_decode($row['html']); ?>
                                  <?php  }
                                }
                                ?>
                                <a href="#tab">view plans</a>
                                </div>
                                <div class="col-md-4 linux-grid1">
                                    <img src="images/linux.png" class="img-responsive" alt=""/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-prices" id="tab">
                        <div class="container">
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                        <div class="linux-prices">
                                                <?php if ($prod->num_rows > 0) {
                                                    while ($row = $prod->fetch_assoc()) { 
                                                        $desc=json_decode($row['description']); 
                                                    ?>
                                                     <div class="col-md-3 linux-price">
                                                        <div class="linux-top">
                                                            <h4><?php echo $row['prod_name']; ?></h4>
                                                        </div>
                                                        <div class="linux-bottom">
                                                            <h5><?php echo $row['mon_price']; ?><span class="month">per month</span></h5>
                                                            <h5><?php echo $row['annual_price']; ?><span class="month">per year</span></h5>
                                                            <h6>Single Domain</h6>
                                                            <ul>
                                                            <li><strong>SKU</strong><?php echo $row['sku']; ?></li>
                                                            <li><strong>Webspace</strong><?php echo $desc->webspace; ?></li>
                                                            <li><strong>Free Domain</strong><?php echo $desc->free_domain; ?></li>
                                                            <li><strong>Bandwidth</strong><?php echo $desc->bandwidth; ?></li>
                                                            <li><strong>Language</strong><?php echo $desc->language; ?></li>
                                                            <li><strong>Mailbox</strong><?php echo $desc->mailbox; ?></li>
                                                            <li><strong>location</strong> : <img src="images/india.png"></li>
                                                            </ul>
                                                        </div>
                                                        <a data-id="<?php echo $row['prod_id']; ?>"  class="addToCart" href="#">buy now</a>
                                                    </div>
                                            <?php    }
                                            } ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- clients -->
                <div class="clients">
                    <div class="container">
                        <h3>Some of our satisfied clients include...</h3>
                        <ul>
                            <li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
                            <li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
                            <li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
                            <li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
                            <li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
                            <li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
                        </ul>
                    </div>
                </div>
       <!-- clients -->
                    <div class="whatdo">
                        <div class="container">
                            <h3>Linux Features</h3>
                            <div class="what-grids">
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="what-grids">
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-move" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
<script src="user.js"></script>
<?php include("footer.php"); ?>
<?php 
} else {
    header("Location:index.php");
}

?>