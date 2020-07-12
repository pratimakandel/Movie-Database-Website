<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="film-camera-clipart-8.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Movie</title>
</head>
<body>
	 <?php
          include "password.php";
          $servername = "localhost";
          $db = "S19_350_Team_Blue";

          //create connection
          $connection = mysqli_connect($servername, $username, $password, $db);
  
                                    
?>          

	<div><?php include "nav-bar.php"?></div>
       
	<div class="latest_movies">
	<h3> Latest Movies</h3>
	</div>
 	<div class = "movie-container">
         <?php
          $sql_select = "select movie_id, img_url, title from movies where years > 2010";
          $query=mysqli_query($connection, $sql_select);
                while($row=mysqli_fetch_array($query))
                {
		
		echo '<a href="display.php?movie_id='.$row['movie_id'].'"><img src="' . $row['img_url'] . '" height="150" width="150" name="movie_id" /></a>';
                

        }
 ?>

</div>

<div class="latest_movies">
        <h3> TopRated Movies</h3>
        </div>
        <div class = "movie-container">
         <?php
          $sql_select = "select movie_id, img_url, title from movies where user_rate >= 9";
          $query=mysqli_query($connection, $sql_select);
                while($row=mysqli_fetch_array($query))
                {

                echo '<a href="display.php?movie_id='.$row['movie_id'].'"><img src="' . $row['img_url'] . '" height="150" width="150" name="movie_id" /></a>';
  

        }
 ?>
</div>
<div class="latest_movies">
        <h3> TopIMDB Movies</h3>
        </div>
        <div class = "movie-container">
         <?php
          $sql_select = "select movie_id, img_url, title from movies where imdb_rate >= 8.5";
          $query=mysqli_query($connection, $sql_select);
                while($row=mysqli_fetch_array($query))
                {

                echo '<a href="display.php?movie_id='.$row['movie_id'].'"><img src="' . $row['img_url'] . '" height="150" width="150" name="movie_id" /></a>';


        }
 ?>
</div>
	<div><?php include "footer.php";?>
        


    
</body>
</html>
