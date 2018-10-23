<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>
<body>
  <header>
    <nav>
      <div class="main-wrapper">
        <ul class="header">
          <li><a href="index.php"><button type="submit" style=" border-radius: 5px;">Home</button></a></li>
          <li><a href="addrecipe.php"><button type="submit" style="white-space:nowrap; width: 150px;  border-radius: 5px;">Submit a recipe!</button></a></li>
          <li><form class="nav-search" method="POST" action="includes/recipe-search.inc.php">
            <button type="submit" name="submit">Search!</button>
            <input type="text" name="search" placeholder="Search for a recipe" />
          </form></li>
        </ul>
        <div class="nav-login">
          <?php
            if(isset($_SESSION['u_id'])){
              echo '<span><h3>Logged in as: '.$_SESSION['u_uid'].'</h3></span>
                    <form method="post" action="includes/logout.inc.php">
                      <button type="submit" name="submit">Logout</button>
                    </form>';
            }else{
              echo '<form method="POST" action="includes/login.inc.php">
                      <input type="text" name="uid" placeholder="Username/Email" />
                      <input type="password" name="pwd" placeholder="password" />
                      <button type="submit" name="submit">Login</button>
                    </form>
                    <a href="signup.php">Sign Up</a>';
            }
          ?>
        </div>
      </div>
    </nav>
  </header>
