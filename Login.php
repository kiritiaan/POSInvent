<?php

session_start();
if(isset($_SESSION['userId'])){
	header('location:dashboard.php');		
}

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "projectmotor";
$store_url = "";
// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}


$errors = array();


if($_POST){

	$username = $_POST['username'];
	$password = $_POST['password'];
    $username = str_replace(' ', '', $username);

    if(empty($username) || empty($password)) {
		if($username == "" || $password == "") {
			$errors[] = "All field is required.";
		} 
	} else {
		$sql = "SELECT * FROM staff WHERE staff_user = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM staff WHERE staff_user = '$username' AND staff_pass = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['staff_user'];

				// set session
				$_SESSION['userId'] = $username;

				header('location:dashboard.php');	
			} else{
				$errors[] = "Incorrect username/password combination";
			} // /else
		} else {		
			$errors[] = "Username doesnot exists";		
		} // /else
	} // /else not empty username // password
	
} // /if $_POST


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="Box">

      <img src="Img/Logo.png"  srcset="" width="400px">

      <input type="text" placeholder="USERNAME" name="username">
      <input type="password" placeholder="PASSWORD" name="password">
        <div class="messages">
            <?php 
            if($errors) {
                foreach ($errors as $key => $value) {
                    echo '<script>alert("'.$value.'");</script>';
                }
            } 
            
            ?>
        </div>
      <button type="submit">LOGIN</button>
    </div>
    </form>
    
</body>
</html>