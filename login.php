<?php
	include_once("User.php");
	if(isset($_POST['submit'])) {
		$email = isset($_POST['email']) ?  trim($_POST['email']) :'';
		$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
		//echo $email;
		//echo $pass
		$user = new User();
		$ret = $user->login($email , $pass);
		if($ret['success'] != "") {
			
			//echo '<script>alert("'.$ret['success'].'");</script>';
			header('Location: index.php');
		}
		else {
			echo '<script>alert("'.$ret['error'].'");</script>';
		}
	}
?>
<?php include_once("header.php"); ?>
		<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form method="POST">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="email" name="email" required> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password" name="pass" required> 
									  </div>
									  <a class="forgot" href="#">Forgot Your Password?</a>
									  <input type="submit" name="submit" value="Login">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
<?php include("footer.php"); ?>