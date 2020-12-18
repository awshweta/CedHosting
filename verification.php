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
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host       = 'smtpout.secureserver.net';
    $mail->SMTPDebug  = 0;                  
    $mail->SMTPAuth   = true;                
    $mail->Port       = 25;                 
    $mail->Username   = $email; 
    $mail->Password   = $pass;       
    $mail->isHTML(true);                      
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    ini_set("SMTP", "aspmx.l.google.com");
    ini_set("sendmail_from", "YOURMAIL@gmail.com");
    $message = "The mail message was sent with the following mail setting:\r\nSMTP = aspmx.l.google.com\r\nsmtp_port = 25\r\nsendmail_from = YourMail@address.com";
    $headers = "From: YOURMAIL@gmail.com";
    mail("Sending@provider.com", "Testing", $message, $headers);
    echo "Check your email now....&lt;BR/>";
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