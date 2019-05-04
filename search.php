<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="film-camera-clipart-8.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
       
    .search{	
	margin-top: 6em;
	display:grid;
	grid-template-columns: repeat(5, 150px)!important;
	grid-template-rows:150px!important;
	grid-gap: 4%;
	justify-content: center;
	
	}
    .search_movies{
	display: flex;
	margin-top: 8%;
	background-color: #ff9933;
	color: white;
	width: 20%;
	height:15%;
	text-align: center;
	justify-content: center;
	}




</style>

</head>
<body>


<div> <?php include "nav-bar.php" ?> </div>  
      
<div class="move_down">
 <?php
          include "password.php";
          $servername = "localhost";
          $db = "S19_350_Team_Blue";

          //create connection
          $connection = mysqli_connect($servername, $username, $password, $db);
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $name = $_POST["search"];
                                if(!empty($name)){
                                        $sql_search = "SELECT * FROM movies WHERE title LIKE '%{$name}%'";	
                                 $query= mysqli_query($connection, $sql_search);
                                $rows = mysqli_num_rows($query);
				
                                if ($rows >= 1) {
					echo'<div class="search_movies">';
             				echo '<h3> Search Results for "'.$name.'"</h3>';
					echo '</div>';
				        echo '<div class = "search">';	
                                         while($row=mysqli_fetch_array($query)){
		
                      
             echo '<a href="display.php?movie_id='.$row['movie_id'].'"><img src="' . $row['img_url'] . '" height="150" width="150" name="movie_id" /></a>';


			   }
			mysqli_close($connection);
		}else{
			
		      echo'<div class="search_movies">';
                      echo '<h3> Search Results for "'.$name.'"</h3>';
                      echo '</div>';
                      echo '<h2 style="margin-top: 10%"><b>No Results Found.</b></h2>';

		}
		}

		}

	?>
</div>

<div> <?php include "footer.php" ?> </div>
</body>
</html>

