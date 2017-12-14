<?php
 if (isset($_POST['submit'])) {
	
	 include_once 'dbh.inc.php';
	 
	 $first = mysqli_real_escape_string($conn, $_POST['first']);
	 $last = mysqli_real_escape_string($conn, $_POST['last']);
	 $email = mysqli_real_escape_string($conn, $_POST['email']);
	 $uid = mysqli_real_escape_string($conn, $_POST['uid']);
	 $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	 $iname = $_POST['iname'];
	 $file = $_FILES["file"]["name"];
	 $size = $_FILES["file"]["size"];
	 
	 //Error Handlers
	 //Check for empty fields
	 if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($iname) || empty($file)) {
		header("Location: ../signup.php?signup=empty");
		exit(); 
	 } else {
		//Check if input characters are valid
		 if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
			header("Location: ../signup.php?signup=invalid");
			 exit();
		 } else {
			 //Check if email is valid
			 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				 header("Location: ../signup.php?signup=email");
				 exit();
			 } else {
				 $sql = "SELECT * FROM users WHERE user_uid='$uid'";
				 $result = mysqli_query($conn, $sql);
				 $resultCheck = mysqli_num_rows($result);
				 if ($resultCheck > 0) {
					 header("Location: ../signup.php?signup=usertaken");
					 exit();
				 } else 
				 {
					 //Check For Image Requirements
					 if ($size > 500000) 
					 {
						 echo "<label class='err'> Image size must be smaller than 500kb </label>";
					 }
					 else
					 {
						 
					 
						 $allowedExts = array("gif", "jpeg", "jpg", "png");
						 $temp = explode (".", $_FILES["file"]["name"]);
						 $extension = end($temp);
						 
						 if ((($_FILES["file"]["type"] == "image/gif")
							|| ($_FILES["file"]["type"] == "image/jpeg")
							|| ($_FILES["file"]["type"] == "image/jpg")
							|| ($_FILES["file"]["type"] == "image/pjpeg")
							|| ($_FILES["file"]["type"] == "image/x-png")
							|| ($_FILES["file"]["type"] == "image/txt")
							|| ($_FILES["file"]["type"] == "image/png"))
							&& ($_FILES["file"]["size"] <= 500000)
							&& in_array($extension, $allowedExts))
						 {
							 if (file_exists("upload/" . $_FILES["file"]["name"])) 
							 {
							 	echo $_FILES["file"]["name"] . "Image upload already exist. ";
							 } 
							else 
							{
								move_uploaded_file( $_FILES["file"]["tmp_name"],
													  "upload/" .$uid.$_FILES["file"]["name"]);
							}
						 }
						 	
						 	
							 if ($_FILES["file"]["error"] > 0) {
								 echo "Return Code: " .$_FILE["file"]["error"] . "<br>";
								 } 
					 
								 $pictureName = $uid.$_FILES["file"]["name"];
								 //Hashing the pasword
								 $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
								 //Insert the user into the database
								 $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, iname, filename) VALUES ('$first','$last','$email','$uid','$hashedPwd', '$iname','$pictureName')";
								 mysqli_query($conn, $sql);
								 header("Location: ../chat.php");
								 exit(); 	 
						 	}
				 }
			 } //end of size
		 } //end of result check
	 } //end of validate email
	 
 } //end of regex
	 //end of many ors
 //end of post['submit']
		 else {
	 header("Location: ../signup.php");
	 exit();
 }
?>