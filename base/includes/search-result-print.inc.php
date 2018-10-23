<?php
session_start();
if(isset($_POST['submit'])){
  include 'dbconnect.inc.php';
  $id = mysqli_real_escape_string($connect, $_POST['id']);
  if(empty($id)){
    header("Location: ../recipe.php?recipe_id-invalid");
    exit();
  }else{
    $sql = "SELECT * FROM recipes WHERE recipe_id='$id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['recipe-details'] = $row;
    header("Location: ../recipe.php?recipe_id=".$id."");
    exit();
  }
}else{
  header("Location: ../recipe.php?recipe-nosubmit");
  exit();
}
?>
