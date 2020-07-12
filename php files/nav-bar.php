<?php
  session_start();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<div class="container">
<nav id='nav'>
      <button><a href="index.php"><b>StudMov</b></a></button>
      <button><a href="login.php"><b>Login</b></a></button>
      <div class="dropdown">
        <button class="dropbtn"><a href = ""><b>Year</b></button></a>
        <div class="dropdown-content">
          <a href="year.php?decade=early">1900-1960</a>
          <a href="year.php?decade=1960s">1960s</a>
          <a href="year.php?decade=1970s">1970s</a>
          <a href="year.php?decade=1980s">1980s</a>
          <a href="year.php?decade=1990s">1990s</a>
          <a href="year.php?decade=2000s">2000s</a>
          <a href="year.php?decade=2010s">2010s</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn"><a href=""><b>Genre</b></a></button>
        <div class="dropdown-content">
          <a href="genre.php?genre=Action">Action</a>
          <a href="genre.php?genre=Comedy">Comedy</a>
          <a href="genre.php?genre=Sci-Fi">Sci-Fi</a>
          <a href="genre.php?genre=Romance">Romance</a>
    	    <a href="genre.php?genre=Horror">Horror</a>
        </div>
      </div>
      <button><a style="color:black" href=""><b><?php echo $_SESSION['username'];?></b></a></button>

<div class="search_box">
 <form method="post" action="search.php">
 <input type="text" placeholder="Search Movies.." name="search" required>
 <input style="margin-left:25%" type="submit" value="search">
 </form>
</div>
</div>
</nav>
</body>
</html>
