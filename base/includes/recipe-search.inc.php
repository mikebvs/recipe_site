<?php
session_start();
if(isset($_POST['submit'])){
  include 'dbconnect.inc.php';
  $search = mysqli_real_escape_string($connect, $_POST['search']);
  if(empty($search)){
    header("Location: ../search-results.php?search-results=no-return");
    exit();
  }else{
    //Search each term
    $search = explode(" ", $search);
    //String that will hold all resulting recipe id's
    $resultid = "";
    $resultname = "";
    foreach($search as $v){
      $sql = "SELECT recipe_id, recipe_title FROM recipes WHERE recipe_title LIKE '%$v%'";
      $query_result = mysqli_query($connect, $sql);
      while($row = mysqli_fetch_assoc($query_result)){
        $resultid .= $row['recipe_id']."|";
        $resultname .= $row['recipe_title']."|";
      }
    }
    //Create an array for search result page
    $resultid = explode("|", $resultid);
    $resultname = explode("|", $resultname);
    //Remove empty node at end of array
    $ids = [];
    $names = [];
    for($i=0; $i<=50; ++$i){
      if($resultid[$i] != ""){
        if(!in_array($resultid[$i],$ids)){
          $ids[] = $resultid[$i];
          $names[] = $resultname[$i];
        }
      }
    }
    //SESSION variable passes the results to the next page
    $_SESSION['search-ids'] = $ids;
    $_SESSION['search-names'] = $names;
    $_SESSION['test'] = "TEST";
    header("Location: ../search-results.php?search-results=success");
    exit();
  }
}
