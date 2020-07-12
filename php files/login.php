<?php
 ob_start();
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="film-camera-clipart-8.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

form {
    width: 450px;
    min-height: 500px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 2%;
    background-image: white;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color:  #ff9933;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}


.container {
  padding: 16px;
 
}

</style>
</head>
<body>



<h1 style="text-align:center">Log In</h1>
         
         <?php
		 include "password.php";
                $servername = "localhost";
                $db = "S19_350_Team_Blue";
                $connection = mysqli_connect($servername, $username, $password, $db);

	
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        if(!empty($username) && !empty($password)){
		
				$query = mysqli_query($connection,"SELECT * FROM user WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
				// SQL query to fetch information of registerd users and finds user match.
				
				$rows = mysqli_num_rows($query);
				if ($rows == 1) {
					$_SESSION['username']=$username;
						header("location:index.php"); // Redirecting To Other Page
				} else {
 					echo '<h5 style="text-align:center">Please enter valid username and password</h5>';
				}
}else {
echo"invalid";
}
}

			mysqli_close($connection); // Closing Connection

?>
 
 <form method = "post">
 
  <div class="container">	
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button id="Login" name="login" type="submit">Login</button>
   
    <div class="container" style="text-align:center" style="background-color:#f1f1f1">
    <p>Please sign up if you dont have an account</p>
	<a href="signup.php">Sign Up</a>
	
   
  </div>  
</div>


<h5>Click here to logout <a href="logout.php" title="Logout">Logout</a></h5>
</form>
 
</body>
</html>

