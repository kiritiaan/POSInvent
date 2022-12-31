<?php

session_start();
if(isset($_SESSION['userId'])){
	header('location:dashboard.php');		
}

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "inventorydb";
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

    if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
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
    <?php
    require_once "../FinalProject/styles/stylish.php";
    ?>
    <link rel="stylesheet" href="styles/log.css">
    <title>Login Page</title>

</head>

<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div>
            <img src="img/logo.png" alt="" srcset="">
            <div class="messages">
                <?php 
                if($errors) {
                    foreach ($errors as $key => $value) {
                        echo '<div class="alert alert-warning" role="alert">
                        <i class="glyphicon glyphicon-exclamation-sign"></i>
                        '.$value.'</div>';										
                    }
                } 
                
                ?>
            </div>
            <div class="input-group mb-3 mother">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-danger">Login</button>
            <a href="Dashboard.php" class=" text text-primary">Forget Password?</a>
        </div>
    </form>




</body>

</html>