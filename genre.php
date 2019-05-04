<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="film-camera-clipart-8.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Genre</title>
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
        <h3> 
		<?php 
	  		$genre_chosen1 = htmlspecialchars($_GET['genre']);
			echo $genre_chosen1;
			if($genre_chosen1 == NULL){
				echo "Genres";
			}

		?> 
		</h3>
        </div>
        <div class = "movie-container">
         <?php
			$genre_chosen2 = htmlspecialchars($_GET['genre']);
			if(isset($_GET['genre'])){			
			$sql = "SELECT m.title, m.img_url, g.genre_name, m.movie_id, j.movie_id, g.genre_id, j.genre_id 
					FROM movies m JOIN genre_movie_junc j ON m.movie_id=j.movie_id 
					JOIN genre g ON g.genre_id=j.genre_id ";


		
			if($_GET['genre'] == 'Action'){
			$sql .= "WHERE genre_name ='Action' ";
			}elseif($_GET['genre'] == 'Comedy'){
			$sql .= "WHERE genre_name = 'Comedy' ";
			}elseif($_GET['genre'] == 'Romance'){
			$sql .= "WHERE genre_name = 'Romance' ";
			}elseif($_GET['genre'] == 'Horror'){
			$sql .= "WHERE genre_name = 'Horror' ";
			}elseif($_GET['genre'] == 'Fantasy'){
			$sql .= "WHERE genre_name = 'Fantasy' ";
			}elseif($_GET['genre'] == 'Sci-Fi'){
			$sql .= "WHERE genre_name = 'Sci-Fi' ";
			}
			$sql .= "ORDER BY title;"; 
			
			$query=mysqli_query($connection, $sql);
                while($row=mysqli_fetch_array($query))
                {
					echo '<a href="display.php?movie_id='.$row['movie_id'].'"><img src="'.$row['img_url'].'" height="150" width="150" name="movie_id" /></a>';
				}
		    }
			
 ?>
</div>
	<div><?php include "footer.php";?></div>
        
    
</body>
</html>
