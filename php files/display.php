<?php
session_start();

/*Just for your server-side code*/
header('Content-Type: text/html; charset=ISO-8859-1');

?>
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

  <div><?php include "nav-bar.php"; ?></div>
  <div class="display">

    <?php

	include "password.php";
	$servername = "localhost";
	$db = "S19_350_Team_Blue";
	$connection = mysqli_connect($servername, $username, $password, $db);

	  $id= $_GET["movie_id"];
		if(!empty($id)){

			$result= "SELECT * FROM movies";
                       $director="select movies.movie_id as movie_id2, director_name from director inner JOIN direct_movie on director.director_id = direct_movie.director_id inner join movies on movies.movie_id = direct_movie.movie_id where movies.movie_id='".$id."'";
			$actor="select actor_name from actor inner JOIN movie_actor on actor.actor_id = movie_actor.actor_id inner join movies on movies.movie_id = movie_actor.movie_id where movies.movie_id='".$id."'";

			$genre="select genre_name from genre inner JOIN genre_movie_junc on genre.genre_id = genre_movie_junc.genre_id inner join movies on movies.movie_id = genre_movie_junc.movie_id where movies.movie_id='".$id."'";


                        $query2= mysqli_query($connection, $director);
			$query = mysqli_query($connection, $result);
       	                $query3= mysqli_query($connection, $actor);
			$query4= mysqli_query($connection, $genre);
	while($row=mysqli_fetch_array($query))
	{

	if($id == $row['movie_id']){

	echo '<div class = "movie-info">';
	     echo '<div>';
	     echo '<h1>'.$row['title'].'</h1>';
	     echo '<h4>Runtime:&nbsp;'.$row['runtime'].'</h4>';
	     echo '<h4>Plot:&nbsp;'.$row['plot'].'</h4>';
             echo '<h4>Year:&nbsp;'.$row['years'].'</h4>';
             echo '<h4>User rate:&nbsp;'.$row['user_rate'].'</h4>';
             echo '<h4>IMDB rate:&nbsp;'.$row['imdb_rate'].'</h4>';
	     echo '</br>';
             echo '<h2>More Details:</h2>';
	     echo '</div>';
	     echo "<img class='display_image' src='" . $row['img_url'] . "' height='350' width='400'> ";

	     echo '</div>';
           }
	}
		//print directors
     echo '<div class="movie_in">';
     $num_rows = mysqli_num_rows($query2);
 	if($num_rows> 0){
                       echo "Director:&nbsp;";
		$ctr=0;
            while($row=mysqli_fetch_array($query2)){

            $ctr++;
  	 echo $row['director_name'];
   	 if($ctr!=$num_rows){
        echo ' , ';}
    		else{
        echo '';
   	 }
		}
       }

       echo '</div>';

          //actors

          echo '<div class="movie_in">';
          $num_rows = mysqli_num_rows($query3);
          if($num_rows> 0){
            echo "Actor:&nbsp;";
            $ctr=0;
            while($row=mysqli_fetch_array($query3)){

              $ctr++;
              echo $row['actor_name'];
              if($ctr!=$num_rows){
                echo ' , ';}
                else{
                  echo '';
                }
              }

            }

            echo '</div>';

            //genre

            echo '<div class="movie_in">';
            $num_rows = mysqli_num_rows($query4);
            if($num_rows> 0){
              echo "Genre:&nbsp;";
              $ctr=0;
              while($row=mysqli_fetch_array($query4)){

                $ctr++;
                echo $row['genre_name'];
                if($ctr!=$num_rows){
                  echo ' , ';}
                  else{
                    echo '';
                  }
                }

              }

              echo '</div>';
            }
            ?>
            <h3 id="review-heading"> User Reviews </h3>
            <form method="POST">
              <div class = "review-input">
                <textarea rows="10" cols="90" name="comment">
                  Add your review here..</textarea>
            <input type="submit">

            </div>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
              $user= $_SESSION["username"];
              $review = $_POST["comment"];
              $movie_id =$_GET["movie_id"];
              $sql_select = "SELECT * from user";
              $query = mysqli_query($connection, $sql_select);
              while($row = mysqli_fetch_array($query)){
                if(strcmp($user, $row['username']) == 0){
                  if(!empty($review)){
                    $sql_insert = "INSERT INTO review(user_id, movie_id, review) VALUES (\"" . $row['user_id'].  "\", \"" . $movie_id . "\", \"". $review. "\")";
                    mysqli_query($connection, $sql_insert);
                    
                  }
                }
              }
}

            $sql_review= "SELECT review.review , user.username FROM review inner join user on review.user_id = user.user_id WHERE review.movie_id='". $_GET['movie_id']. "'";

            $print_review = mysqli_query($connection, $sql_review);
            $numRows = mysqli_num_rows($print_review);
            if ($numRows > 0) {
              while ($row = mysqli_fetch_assoc($print_review)) {
                echo '<div class="review">';
                echo "<div class='current_user'><b>". $row['username']. "</b></div>";
                echo '<img class="image"src=https://gix.uw.edu/wp-content/uploads/2019/01/photo-placeholder.jpeg>';
                echo "<div class='print_review'>" . $row["review"] . "</div>";
                echo '</div>';
                echo '<div class="delete">';
                echo "<form action='index.php'>";
                echo '<button name="delete" type="submit"<i class="fa fa-trash"></i></button>';
                echo ' </form>';
                echo '</div>';


}





            }
              mysqli_close($connection);

              ?>

              <div><?php include "footer.php";?></div>

 </body>
</html>
