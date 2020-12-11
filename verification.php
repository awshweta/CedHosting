<?php include("header.php");
include_once("Dbcon.php");
include_once("User.php"); 
$passErr="";
$repassErr="";
$nameErr="";
$emailErr="";
$mobileErr="";
$ansErr = "";
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
	$pattern = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
	//echo strlen($mobile);
	$mobileval="";
	$split = str_split($mobile, 1);
	$count =0;
	//echo $split[5];
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
	if (!preg_match ($pattern, $email) ) {  
		$emailErr = "Please follow name@example.com format";
		$r = true;
	}  
	if(!preg_match('/^([a-zA-Z]+\s?)*$/', $name)) { 
		$nameErr ="please enter alphabet character only and more than one space are not allow between word";
		$r = true;
	}
	if(!preg_match('/^([a-zA-Z0-9]+\s?)*$/', $ans)) { 
		$ansErr ="please enter alphabet character only and more than one space are not allow between word";
		$r = true;
	}
	if($pass != $rePass) {
		$repassErr = "password does not match";
		$r = true;
	}
	if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,16}$/", $pass)) {
		$r = true;
		$passErr ="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character";
	}
	if($r == false) {
		if($pass == $rePass) {
			$ret = $user->register($email ,$name ,$pass ,$ques,$ans ,$mobile , $db->conn);
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
                        <h3>OTP Verification</h3>
                        <div>
							<span>Mobile<label>*</label></span>
                            <input type="text" name="motp" class="motp" required> <span class="error"><?php echo $nameErr; ?></span>
                            <div class="register-but">
                                <form>
                                    <input type="submit" value="Verify Mobile" class="reg btn" name="verifyMoblile">
                                </form>
                            </div>
                        </div>
                        <div>
							<span>Email<label>*</label></span>
                            <input type="email" name="motp" class="motp" required> <span class="error"><?php echo $nameErr; ?></span>
                            <div class="register-but">
                            <form>
                                <input type="submit" value="Verify Email" class="reg btn" name="verifyEmail">
                            </form>
                            </div>
                        </div>
						<div>
							<span>Mobile OTP<label>*</label></span>
                            <input type="text" name="motp" class="motp" required> <span class="error"><?php echo $nameErr; ?></span>
                            <div class="register-but">
                            <form>
                                <input type="submit" value="Verify OTP" class="reg btn" name="submit">
                            </form>
                        </div>
                        </div>
						<div>
							<span>EMAIL OTP<label>*</label></span>
                            <input type="text" name="eotp" class="eotp" required> <span class="error"><?php echo $emailErr; ?></span>
                            <div class="register-but">
                            <form>
                                <input type="submit" value="Verify OTP" class="reg btn" name="submit">
                            </form>
                            </div>
                        </div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- registration -->

</div>

<!-- login -->
<?php include("footer.php"); ?>