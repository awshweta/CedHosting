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
	$pattern = "/^\w+@[a-zA-z_]+?\.[a-zA-Z]{2,3}$/";
	$mobileval = '/^[1-9][0-9]{9}$/';
	$split = str_split($mobile, 1);
	$count =0;
	echo count($split[1]);
	if (preg_match ($mobileval, $mobile) ) {  
		for($i=0;$i<count($split)-2; $i++) {
			if($split[$i] == $split[$i++]) {
				$count++;
				continue;
			}
			else {
				$r = false;
				break;
			}
		}
		if($count == 9) {
			$mobileErr = "all value are same";
			$r = true;
		}
	}
	else {
		$mobileErr = "Please enter 10 digit";
		$r = true;
	}
	if (!preg_match ($pattern, $email) ) {  
		$emailErr = "Please enter character only or follow name@example.com format";
		$r = true;
	}  
	if(!preg_match('/^([a-zA-Z]+\s?)*$/', $name)) { 
		$nameErr ="please enter alphabet character only and more than one space are not allow between word";
		$r = true;
	}
	if(!preg_match('/^([a-zA-Z]+\s?)*$/', $ans)) { 
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
							<input type="text" name="name" class="name" required> <span class="error"><?php echo $nameErr; ?></span>
						</div>
						<div>
							<span>Email Address<label>*</label></span>
							<input type="email" name="email" class="email" required> <span class="error"><?php echo $emailErr; ?></span>
						</div>
						<div>
							<span>Mobile<label>*</label></span>
							<input type="text" name="mobile" class="mobile" required> <?php echo $mobileErr; ?></span>
						</div>
						<div>
							<span>Security Question<label>*</label></span>
							<select name="cab" class="cab custom-select" id="inputGroupSelect03">
								<option selected disabled>Choose</option>
								<option value="What was your childhood nickname?">What was your childhood nickname?</option>
								<option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
								<option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
								<option value="What was your dream job as a child?">What was your dream job as a child?</option>
								<option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname?</option>
							</select>
						</div>
						<div>
							<span>Security Answer<label>*</label></span>
							<input type="text" name="ans" class="ans" required>
							 <span class="error"><?php echo $ansErr; ?></span>
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
							<input type="password" name="pass" class="pass" required><span class="error"><?php echo $passErr; ?></span>
						</div>
						<div>
							<span>Confirm Password<label>*</label></span>
							<input type="password" name="rePass" class="rePass" required><span class="error"><?php echo $repassErr; ?></span>
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="register-but">
						<form>
							<input type="submit" value="submit" class="btn" name="submit">
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