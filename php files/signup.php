<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

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

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color:  #ff9933;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}



/* Float cancel and signup buttons and add an equal width */
 .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}




/* Change styles for signup button on extra small screens */
@media screen and (max-width: 300px) {
   .signupbtn {
     width: 50%;
  }
}
</style>
<body>



 <?php
          include "password.php";
          $servername = "localhost";
          $db = "S19_350_Team_Blue";

          //create connection
          $connection = mysqli_connect($servername, $username, $password, $db);
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $name = $_POST["username"];
                        $pass = $_POST["psw"];
                        $rep_pass = $_POST["psw-repeat"];
			//check if the repeat password match
                        if(strcmp($pass, $rep_pass) == 0){
                                if(!empty($name) && !empty($password)){
                                        $sql_insert = "INSERT INTO user(username,  password)
                                               VALUES (\"" . $name .  "\", \"" . $pass . "\")";

                                   mysqli_query($connection, $sql_insert);
				  echo'<h4 style="text-align:center">Thank you for signing up!Log In&nbsp;<a href="login.php">here</a></h4>'; 
				
                                }else{
                                        echo'<h4 style="text-align:center">Please enter username and password</h4>';
                                        }
                        }else{
                                echo '<h4 style="text-align:center">Password does not match, please re-enter your password</h4>';



                        }
                }
mysqli_close($connection);


?>


 <form action="signup.php" style="border:1px solid #ccc" method="post"> 
  <div class="container">
   <h3 style="text-align:left"><a href="index.php" style="color: #ff9933">StudMov</a></h3> 
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      <div class="clearfix">
      <button type="submit" class="signupbtn">Sign Up</button>
	 


    </div>
  </div>
  </form>
               




</body>
</html>


