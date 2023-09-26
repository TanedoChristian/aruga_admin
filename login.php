<?php
	include("connect.php");
	error_reporting();
	session_start();

	$message = null;

	if(isset($_SESSION["id"])){
		header("Location: index.php");
		exit();
	}

	if(isset($_POST["login"])){

		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);
	
		/* 
		NOTE THAT ONLY HASHED PASSWORDS CAN LOGIN SO...
		IF PASSWORD IS NOT YET BEEN HASHED, PERFORMED THIS CODE

		$sql_query = mysqli_query($connect,"SELECT * FROM `admin` WHERE `username` = '$username' LIMIT 1");
		$row = mysqli_fetch_assoc($sql_query);
		$sql2 = "UPDATE `admin` SET `password` = '".password_hash($password,PASSWORD_DEFAULT)."' WHERE `admin_id` = '".$row['admin_id']."'";

		*/

		// GET USERNAME INPUT AND QUERY IF EXISTED ELSE ERROR
		$sql_query = mysqli_query($connect,"SELECT * FROM `admin` WHERE BINARY `username` = '$username' LIMIT 1");

		if(mysqli_num_rows($sql_query)>0){

			$row = mysqli_fetch_assoc($sql_query);

			// IF PASSWORD INPUT AND PASSWORD HASHED IS THE SAME RETURN TRUE ELSE ERROR
			if($row && password_verify($password,$row['password'])){
				
				$_SESSION["id"] = $row["admin_id"];
	
				$sql2 = "UPDATE `admin` SET `password` = '".password_hash($password,PASSWORD_DEFAULT)."' WHERE `admin_id` = '".$row['admin_id']."'";
				$query2 = mysqli_query($connect,$sql2);
				if($query2){
					header("Location: index.php");
				}else{
					$message = "Update Error!";
				}
			}
			else{
				$message = "Incorrect username or password!";
			}
		}
		else{
			$message = "Incorrect username or password!";
		}
	}
?>

<!-- ========== HTML ========== -->
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!----===== ARUGA LOGO ===== -->
	<link rel="shortcut icon" href="img/logo.png" /> 

	<!----===== CSS ===== -->
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

	<!----===== MATERIALIZE CSS ===== -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

	<!----===== FONT AWESOME CSS ===== -->
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!----===== BOOTSTRAP ===== -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<!----===== W3 CSS ===== -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	</head>
<style>

</style>
<body>
	<img class="wave" src="img/abs.png">
	<div class="container">
		<div class="img">
			<img src="img/nanny.png">
		</div>
		<div class="login-content" id="content">
			<!-- ================ FORM ===============  -->
			<form method="post" class="shadow-lg p-3 mb-5 bg-white rounded" id="form" autocomplete="off">
				<img src="img/avatar.png">
				<h2 class="title">Welcome</h2>
				<?php
					if($message != null){
						echo "<style>.username-error{display:block;}</style>";
					}
				?>
				<p class="error username-error"><?php echo $message;?></p>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" id="username" name="username"required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
						<h5>Password</h5>
						<input type="password" class="input" id="password" name="password" required>
						<span id="eyee">
							<i class="fa fa-eye" aria-hidden="false" id="eye" onclick="password()"></i>
						</span>
            	   </div>
            	</div>
				<div class="tooltips">Forgot Password?
					<span class="tooltiptext">Please Contact Administrator!</span>
				</div>
            	<input type="submit" class="btn" value="Login" name="login" id="login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
