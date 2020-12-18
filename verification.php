<?php include("header.php");
include_once("Dbcon.php");
include_once("User.php"); 
$passErr = "";
$repassErr = "";
$nameErr = "";
$emailErr = "";
$mobileErr = "";
$ansErr = "";
$r = false;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/vendor/autoload.php';
$username = "";
$error='';
$msg='';
$errorem='';
$errores='';
$getemail='';
$getemail = isset($_GET['email']) ? $_GET['email'] : "";
$getmobile = isset($_GET['mobile']) ? $_GET['mobile'] : "";
$getusername = isset($_GET['name']) ? $_GET['name'] : "";

if (isset($_POST['submitEmail'])) {
    $getemail = isset($_GET['email']) ? $_GET['email'] : "";
    $username = isset($_GET['name']) ? $_GET['name'] : "";
    echo $getemail;
    echo $getusername;
    $email = $_POST['email'];
    echo $email;
    if($email == $getemail) {
        $otp = rand(1000,9999);
        $_SESSION['otp']=$otp;
        $mail = new PHPMailer();
        try {
            $mail->isSMTP(true);
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'cedcossarjun1023@gmail.com';
            $mail->Password = 'Cedcoss@1023';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
    
            $mail->setfrom('cedcossarjun1023@gmail.com', 'CedHosting');
            $mail->addAddress($email);
            $mail->addAddress($email, $username);
    
            $mail->isHTML(true);
            $mail->Subject = 'Account Verification';
            $mail->Body = 'Hi User,Here is your otp for account verification: '.$otp;
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            $mail->send();
            echo "<script>alert('Your Email OTP has been send successfully !')</script>";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
if(isset($_POST['verifyEmail'])){
    if($_SESSION['otp'] == $_POST['eotp']) {
        $user = new User();
        $db = new DbCon();
      $data=$user->activeEmail($_GET['email'], $db->conn);
    }
    else{
      $error="Incorrect OTP";
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
                            <form method="POST">
                            <span>Mobile<label>*</label></span>
                            <input type="text" name="mobile" class="motp" required> <span class="error"><?php echo $nameErr; ?></span>
                            <div class="register-but">
                                    <input type="submit" value="Verify Mobile" class="reg btn" name="submitMoblile">
                                </form>
                            </div>
                        </div>
                        <div>
                            <form method="POST">
                            <span>Email<label>*</label></span>
                            <input type="email" name="email" class="motp" required> <span class="error"><?php echo $nameErr; ?></span>
                            <div class="register-but">
                                <input type="submit" value="VerifyEmail" class="reg btn" name="submitEmail">
                            </form>
                            </div>
                        </div>
                        <div>
                            <form method="POST">
                            <span>Mobile OTP<label>*</label></span>
                            <input type="text" name="motp" class="motp" required> <span class="error"><?php echo $nameErr; ?></span>
                            <div class="register-but">
                            <form>
                                <input type="submit" value="Verify OTP" class="reg btn" name="verifyMobile">
                            </form>
                        </div>
                        </div>
                        <div>
                            <form method="POST">
                            <span>EMAIL OTP<label>*</label></span>
                            <input type="text" name="eotp" class="eotp" required> <span class="error"><?php echo $emailErr; ?></span>
                            <div class="register-but">
                                    <input type="submit" value="Verify OTP" class="reg btn" name="verifyEmail">
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