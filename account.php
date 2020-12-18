<?php include("header.php");
include_once("Dbcon.php");
include_once("User.php"); 
$passErr="";
$repassErr="";
$nameErr="";
$emailErr="";
$mobileErr="";
$ansErr = "";
$quesErr ="";
$r = false;
if(isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : "";
    $ques = isset($_POST['ques']) ? trim($_POST['ques']) : "";
    $ans = isset($_POST['ans']) ? trim($_POST['ans']) : "";
    $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
    $rePass = isset($_POST['rePass']) ? $_POST['rePass'] : "";
    $db = new Dbcon();
    $user = new User();
    //$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^/";
    //echo strlen($mobile);
    $mobileval="";
    $split = str_split($mobile, 1);
    $count =0;
    //echo $split[5];
    if($ques == "") {
        $quesErr = "Please select question";
        $r = true;
    }
    if(strlen($mobile) == 10) {
        $mobileval = '/^[1-9]{1}[0-9]{9}$/';
        if (preg_match ($mobileval, $mobile) ) {  
            
            foreach($split as $k=>$val) {
                if($k < 9) {
                    if($split[$k] == $split[$k+1]) {
                        $count++;
                    }
                }
            }
            if($count == 9) {
                $mobileErr = "All value should not be identical";
                $r = true;
            }
        }
        else {
            $mobileErr = "Decimal is not allowed(.),
            -Only numeric values should be entered,
            -Maximum 10 digits excluding preceding 0";
            $r = true;
        }
    }
    if(strlen($mobile) == 11) {
        $mobileval = '/^[0][1-9][0-9]{9}$/';
        if (preg_match ($mobileval, $mobile) ) {  
            foreach($split as $k=>$val) {
                if($k >0 && $k <10) {
                    if($split[$k] == $split[$k+1]) {
                        $count++;
                    }
                }
            }
            if($count == 9) {
                $mobileErr = "All value should not be identical";
                $r = true;
            }
        }
        else {
            $mobileErr = "Decimal is not allowed(.),
            -Only numeric values should be entered,
            -Maximum 11 digits including preceding 0,
            -Number should not contain more than one 0's in starting,";
            $r = true;
        }
    }
    $pattern = "/^[a-zA-Z0-9-]+\.?+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/";
    if (!preg_match ($pattern, $email) ) { 
        $emailErr = "Two decimal(.) not allowed together,White spaces no allowed,No special character except @.";
        $r = true;
    }
    if(!preg_match('/^([a-zA-Z]+\s?)*$/', $name)) { 
        $nameErr ="please enter alphabet character only and more than one space are not allow between word";
        $r = true;
    }
    $letters = "/(^([a-zA-Z]+[a-zA-Z0-9]+\s?)*$)|(^([a-zA-Z]+\s?)*$)/";
    if(!preg_match($letters, $ans)) { 
        $ansErr ="please enter alphabet/alphanumeric character only";
        $r = true;
    }
    if($pass != $rePass) {
        $repassErr = "password does not match";
        $r = true;
    }
    if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,16}$/", $pass)) {
        $r = true;
        $passErr = "Minimum 8-16 characters, at least one uppercase letter, one lowercase letter, one number and one special character and space are not allowed";
    }
    if($r == false) {
        if($pass == $rePass) {
            $ret = $user->register($email, $name, $pass, $ques, $ans, $mobile, $db->conn);
            echo '<script>alert("'.$ret.'");</script>';
        }
    }
}
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
<!---login--->
<div class="content">
    <!-- registration -->
    <div class="main-1">
        <div class="container">
            <div class="register">
                <form method="POST"> 
                    <div class="register-top-grid">
                        <h3>personal information</h3>
                        <div>
                            <span>Name<label>*</label></span>
                            <input type="text" name="name" class="name" required> 
                            <p><small class="error text-danger"><?php echo $nameErr; ?></small></p>
                        </div>
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="email" name="email" class="email"  required>
                            <p><small class="error  text-danger"><?php echo $emailErr; ?></small></p>
                        </div>
                        <div>
                            <span>Mobile<label>*</label></span>
                            <input type="text" name="mobile" class="mobile" required>
                            <p><small class="error  text-danger"><?php echo $mobileErr; ?></small></p>
                        </div>
                        <div>
                            <span>Security Question<label>*</label></span>
                            <select name="ques" class="ques custom-select" id="inputGroupSelect03">
                                <option selected disabled>Choose</option>
                                <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                <option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
                                <option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
                                <option value="What was your dream job as a child?">What was your dream job as a child?</option>
                                <option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname?</option>
                            </select>
                            <p><small class="error text-danger"><?php echo $quesErr; ?></small></p>
                        </div>
                        <div>
                            <span>Security Answer<label>*</label></span>
                            <input type="text" name="ans" class="ans" required>
                            <p><small class="error text-danger"><?php echo $ansErr; ?></small></p>
                        </div>
                        <div class="clearfix"> </div>
                        <a class="news-letter" href="#">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
                        </a>
                    </div>
                    <div class="register-bottom-grid">
                        <h3>login information</h3>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" name="pass" class="pass" required>
                            <p><small class="error text-danger"><?php echo $passErr; ?></small></p>
                        </div>
                        <div>
                            <span>Confirm Password<label>*</label></span>
                            <input type="password" name="rePass" class="rePass" required>
                            <p><small class="error text-danger"><?php echo $repassErr; ?></small></p>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="register-but">
                        <form>
                            <input type="submit" value="submit" class="reg btn" name="submit">
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- registration -->

</div>

<!-- login -->
<?php include("footer.php"); ?>