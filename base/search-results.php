<?php
session_start();
include 'header.php';
?>
<body>
  <div class="main-container">
    <div class="main-wrapper">
      <?php
        $ids = $_SESSION['search-ids'];
        $names = $_SESSION['search-names'];
        if($_SESSION['u_uid'] == "Admin"){
          print_r($ids);
          print_r($names);
        }
        if(count($ids) < 1){
          echo "<h2>No recipes returned!</h2>";
        }else{
          for($i=0; $i<count($ids);++$i){

            echo "<form method=\"POST\" action=\"includes/search-result-print.inc.php\">
              <input type=\"hidden\" name=\"id\" value=\"".$ids[$i]."\"/>
              <button class=\"result-link\" type=\"submit\" name=\"submit\">".$names[$i]."</button>
            </form>
            <hr />";



      //      echo "<h2>".$row['recipe_title']."</h2><br /><br />";
      //      echo "<h3>Summary</h3><br />";
      //      echo "<p>".$row['recipe_summary']."</p><br />";
      //      echo "<h3>Ingredients</h3><br />";
      //      echo "<ul class=\"ingredients\">";
      //      $ingredients = explode("|", $row['recipe_ingredients']);
      //      foreach($ingredients as $v){
      //        echo "<li>".$v."</li>";
      //      }
      //      echo "</ul><br />";
      //      echo "<h3>Instructions</h3><br />";
      //      echo "<ol class=\"instructions\">";
      //      $instructions = explode("\r\n", $row['recipe_instructions']);
      //      foreach($instructions as $v){
      //        print "<li>".$v."</li>";
      //      }
      //      echo "</ol><hr />";
          }
        }
      ?>
    </div>
  </div>
</body>
<?php
unset($_SESSION['search-ids']);
unset($_SESSION['search-names']);
include 'footer.php';
?>
