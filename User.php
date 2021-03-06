<?php
include_once("Dbcon.php");
class User {
    public $email;
    public $mobile;
    public $password;
    public $name;

    public function register($email ,$name ,$pass ,$ques,$ans ,$mobile , $conn) {
        $r = false;
        $active = 0;
        $isadmin = 0;
        $email_approved = 0;
        $phone_approved = 0;
        $pass = md5($pass);
        $sqlselect = "SELECT * FROM tbl_user";
        $result = $conn->query($sqlselect);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                if($row['mobile'] == $mobile && $row['email'] == $email) {
                    $ret = "mobile no and email both already exist";
                    return $ret;
                    $r=true;
                }
                if($row['email'] == $email) {
                    $ret = "email already exist";
                    return $ret;
                    $r=true;
                }
                else if($row['mobile'] == $mobile) {
                    $ret = "mobile no already exist";
                    return $ret;
                    $r=true;
                }
            }
        }
        if($r == false) {
            $sql = "INSERT INTO tbl_user(`email`,`name`,`mobile`,`email_approved`, `phone_approved`, `active`,`is_admin`,`password`,`security_question` , `security_answer`) VALUES ('".$email."', '".$name."','".$mobile."','".$email_approved."' ,'".$phone_approved."','".$active."','".$isadmin."','".$pass."','".$ques."','".$ans."')";
            if ($conn->query($sql) === true) {
                $ret = "Register successfully";
                header("location:verification.php?email='".$email."'&mobile='".$mobile."'&name='".$name."'");
            } else {
                $ret =$conn->error;
            }
            return $ret;
        }
    $conn->close();
}

public function activeEmail($email, $conn) {
    $sql = "UPDATE tbl_user SET `active`='1' ,`email_approved`='1' WHERE `email` = '$email'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Your email is successfully verified !')</script>";
        echo '<script>window.location.href="login.php";</script>';
    } else {
        $ret = "Error updating record: " . $conn->error;
        echo "<script>alert('".$ret."')</script>";
    }
}

public function login($email , $pass ) {
    $db = new Dbcon();
    $pass = md5($pass);
    $admin ="";
    $error = "";
    $success = "";
    $sql = "SELECT * FROM tbl_user WHERE `email`='$email' AND `password`='$pass'";
    $result = $db->conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            if($row['active'] == 1 && $row['email_approved'] ==1) {
                $_SESSION['user'] = array('name'=>$row['name'] ,'id'=>$row['id'] , 'role'=>$row['is_admin']);
                if($row['is_admin'] == 1) {
                    $admin = "yes";
                }
                if($row['is_admin'] == 0){
                    $admin = "no";
                }
                $success = "login successfully";
            }
            else {
                $error = "you are not approved";
            }
        }
    }
    else
    {
        $error = 'Invalid login details';
    }
    $arr = array('admin'=> $admin ,'error'=>$error , 'success' => $success);
    return $arr;
    $conn->close(); 
}
}
?>