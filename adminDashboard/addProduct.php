<?php $r = false;
include_once("../Dbcon.php");
include_once("../Product.php");
$ret = "";
if(isset($_SESSION['user'])) {
	if($_SESSION['user']['role']==1) { 
    $db = new DbCon();
	$product = new Product();
    $getCategory = $product->getCategory($db->conn); 
    $result =$product->fetchCategory($db->conn);
    ?>
<?php include_once('header.php'); 
include_once("sidebar.php"); ?>
  </div>
      </div>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../imag.jpeg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $_SESSION['user']['name']; ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../imag.jpeg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $_SESSION['user']['name']; ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sdata: {action:""}m mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../imag.jpeg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $_SESSION['user']['name']; ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../imag.jpeg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $_SESSION['user']['name']; ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../imag.jpeg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $_SESSION['user']['name']; ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['user']['name']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="../logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <!-- Card stats -->
            <!-- Table -->
            <div class="row justify-content-center">
              <div class="col-lg-10 col-md-10">
                <div class="card bg-secondary border-0">
                  <div class="card-header bg-transparent pb-5">
                    <div class="text-muted text-center mt-2 mb-4"><small>Add Product</small></div>
                  </div>
                  <div class="card-body px-lg-5 py-lg-5">
                    <form role="form" method="POST">
                        <div class="pb-5">
                            <h1 id="header_1" class="form-header" data-component="header">
                                Create New Product
                            </h1>
                            <div id="subHeader_1" class="form-subHeader ">
                                Enter Product Details
                            </div>
                        </div>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                                Select Product Category
                                <span class="error form-required">*</span>
                            </label>
                            <div class="input-group mb-3">
                                <select class="category custom-select" id="inputGroupSelect01">
                                    <option selected disabled>Choose...</option>
                                    <?php
                                      if ($result->num_rows > 0) {
                                        while ($row=$result->fetch_assoc()) {?>
                                              <option value="<?php echo $row['prod_name']; ?>"><?php echo $row['prod_name']; ?></option>
                                        <?php }
                                      }
                                      ?>
                                </select>
                            </div>
                        </li>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                            Enter Product Name
                            <span class="error form-required">*</span>
                            </label>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="name form-control"   placeholder="Name" name="name" type="text">
                                </div>
                            </div>
                        </li>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                            Page Url
                            </label>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="url form-control"   placeholder="url" name="url" type="url">
                                </div>
                            </div>
                        </li>
                        <div class="pb-5">
                            <h1 id="header_1" class="form-header" data-component="header">
                                Product Description
                            </h1>
                            <div id="subHeader_1" class="form-subHeader ">
                                Enter Product Description Below
                            </div>
                        </div>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                                Enter Monthly Price 
                                <span class="form-required">*</span>
                            </label>
                            <div class="error form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="mplan form-control"   placeholder="This would be Monthly Plan" name="name" type="text">
                                </div>
                            </div>
                        </li>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                                Enter Annual Price 
                            <span class="error form-required">*</span>
                            </label>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="aplan form-control"   placeholder="This would be Annual Price" name="name" type="text">
                                </div>
                            </div>
                        </li>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                                SKU<span class="error form-required">*</span>
                            </label>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="sku form-control"   placeholder="Name" name="name" type="url">
                                </div>
                            </div>
                        </li>
                        <div class="pb-5">
                            <h1 id="header_1" class="form-header" data-component="header">
                                Features
                            </h1>
                        </div>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                                Web Space(in GB)
                                <span class="error form-required">*</span>
                            </label>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="web form-control"   placeholder="Enter 0.5 for 512 MB" name="name" type="text">
                                </div>
                            </div>
                        </li>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                                Bandwidth (in GB)
                            <span class="error form-required">*</span>
                            </label>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="bandwidth form-control"   placeholder="Enter 0.5 for 512 MB" name="name" type="text">
                                </div>
                            </div>
                        </li>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                                Free Domain<span class="form-required">*</span>
                            </label>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="domain form-control"   placeholder="Enter 0 if no domain available in this service" name="name" type="url">
                                </div>
                            </div>
                        </li>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                            Language / Technology Support<span class="form-required">*</span>
                            </label>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="language form-control"   placeholder="Separate by (,) Ex: PHP, MySQL, MongoDB" name="name" type="url">
                                </div>
                            </div>
                        </li>
                        <li class="form-line" data-type="control_dropdown" id="id_3">
                            <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                            Mailbox <span class="error form-required">*</span>
                            </label>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <input class="mailbox form-control"   placeholder="Enter Number of mailbox will be provided, enter 0 if none" name="name" type="url">
                                </div>
                            </div>
                        </li>
                      <div class="text-center">
                        <button type="button" name="addProduct" class="addProduct btn btn-primary mt-4">Add Product</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page contentif(isset($_SESSION['user'])) {
	if($_SESSION['user']['role']==1) { -->
      <!-- Footer -->
    <script src="admin.js"></script>
<?php include "footer.php";
    } 
}
else {
  header ('location:../login.php');
 } ?>

