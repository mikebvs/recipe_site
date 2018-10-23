<?php
session_start();
  include_once 'header.php';
?>
  <section class="main-container">
    <div class="main-wrapper home">
      <h2>Home</h2>
      <hr />
      <?php
        if($_SESSION['u_uid']){
          echo "<h3>Welcome, ".$_SESSION['u_uid']."</h3>";
        }else{ ?>
      <form method="POST" class="login-form" action="includes/login.inc.php">
        <input type="text" name="uid" placeholder="Username/Email" required autocomplete="off" />
        <input type="password" name="pwd" placeholder="Password" required autocomplete="off" />
        <button type="submit" name="submit">Log In</button>
      </form>
    <?php } ?>
    </div>
  </section>
<?php
  include_once 'footer.php';
?>
