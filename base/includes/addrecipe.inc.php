<?php
session_start();
if(isset($_SESSION['u_uid'])){
  if(isset($_POST['submit'])){
    include 'dbconnect.inc.php';
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $summary = mysqli_real_escape_string($connect, $_POST['summary']);
    $ingredients = mysqli_real_escape_string($connect, $_POST['ingredients']);
    $instructions = mysqli_real_escape_string($connect, $_POST['instructions']);

    $summary = str_replace(PHP_EOL, "|", $summary);
    $ingredients = str_replace(", ", "|", $ingredients);
    $instructions = str_replace(PHP_EOL, "|", $instructions);
    $author = $_SESSION['u_first'].' '.$_SESSION['u_last'];
    $authoruid = $_SESSION['u_uid'];
    $date = date("Y/m/d");

    //Error handling
    if(empty($title) || empty($summary) || empty($ingredients) || empty($instructions)){
      //Check all fields filled
      header("Location: ../addrecipe.php?addrecipe=invalid1");
      exit();
    }else{
      //Check for existing entries
      $sql = "SELECT * FROM recipes WHERE recipe_title='$title';";
      $result = mysqli_query($connect, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck >= 1){
        //If previous entry exists, error
        header("Location: ../addrecipe.php?addrecipe=existingrecipe");
        exit();
      }else{
        $insert = "INSERT INTO `recipes` (`recipe_title`, `recipe_summary`, `recipe_ingredients`, `recipe_instructions`, `recipe_author`, `recipe_account`, `recipe_create_date`) VALUES ('$title', '$summary', '$ingredients', '$instructions', '$author', '$authoruid', '$date')";
        mysqli_query($connect, $insert);
        header("Location: ../addrecipe.php?addrecipe=success");
        exit();
      }
    }
  }else{
    header("Location: ../addrecipe.php?addrecipe=invalid");
    exit();
  }
}else{
  header("Location: ../addrecipe.php?addrecipe=notloggedin");
  exit();
}
