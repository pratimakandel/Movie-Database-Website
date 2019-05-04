<?php
session_start();

?>
<!DOCTYPE html>
<html lang = "en-US">
<head>
	<link rel="icon" href="film-camera-clipart-8.ico">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Year</title>

</head>
<body>

	<div><?php include "nav-bar.php"; ?></div>
	

<?php
include 'password.php'; //lets us use $username & $password from password.php
$servername="localhost";
$dbname = "S19_350_Team_Blue";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>

<?php
$sql = "SELECT movie_id, img_url, title FROM movies ";
if($_GET['decade'] == "early"){
	$sql .= "WHERE years <= 1960 ";
}elseif($_GET['decade'] == '1960s'){
	$sql .= "WHERE years >= 1960 && years < 1970 ";
}elseif($_GET['decade'] == '1970s'){
	$sql .= "WHERE years >= 1970 && years < 1980 ";
}elseif($_GET['decade'] == '1980s'){
	$sql .= "WHERE years >= 1980 && years < 1990 ";
}elseif($_GET['decade'] == '1990s'){
	$sql .= "WHERE years >= 1990 && years < 2000 ";
}elseif($_GET['decade'] == '2000s'){
	$sql .= "WHERE years >= 2000 && years < 2010 ";
}elseif($_GET['decade'] == '2010s'){
	$sql .= "WHERE years >= 2010 ";
}
$sql .= "ORDER BY years";

$query = mysqli_query($conn, $sql);

echo '<div class="container">';
echo  '<div class="movie-container">';

?>


<?php

$query=mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($query))
{
	echo '<a href="display.php?movie_id='.$row['movie_id'].'"><img src="'.$row['img_url'].'" height="150" width="150" name="movie_id" /></a>';
}
echo '</div></div>';
$conn->close();
?>

<div><?php include "footer.php";?></div>
</body>
</html>
