<?php
include_once("Dbcon.php");
include_once("User.php"); 
if(isset($_POST['action'])) {
	if($_POST['action'] == "register") {
		$name = isset($_POST['name']) ? $_POST['name'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : "";
		$ques = isset($_POST['ques']) ? $_POST['ques'] : "";
		$ans = isset($_POST['ans']) ? $_POST['ans'] : "";
		$oldPass = isset($_POST['oldPass']) ? $_POST['oldPass'] : "";
		$rePass = isset($_POST['newPass']) ? $_POST['newPass'] : "";
		$db = new Dbcon();
		$user = new User();
		$ret = $user->register($email ,$name ,$oldPass ,$rePass ,$ques,$ans ,$mobile , $db->conn);
		echo '<script>alert("'.$ret.'");</script>';

	}

}
?>