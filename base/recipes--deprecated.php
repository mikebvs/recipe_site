<?php
include 'header.php';
?>
<body>
  <div class="main-container">
    <div class="main-wrapper">
      <?php
        include 'includes/dbconnect.inc.php';
        $sql = "SELECT * FROM recipes WHERE recipe_title='Scrambled Eggs';";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <h2><?php echo $row['recipe_title']; ?></h2>
        <br />
        <br />
        <h3>Summary</h3>
        <br />
        <p><?php echo $row['recipe_summary']; ?></p>
        <br />
        <h3>Ingredients</h3>
        <br />
        <ul class="ingredients">
          <?php
            $ingredients = explode("|", $row['recipe_ingredients']);
            foreach($ingredients as $v){
              print "<li>".$v."</li>";
            }
          ?>
        </ul>
        <br />
        <h3>Instructions</h3>
        <br />
        <ol class="instructions">
          <?php
            $instructions = explode("\r\n", $row['recipe_instructions']);
            foreach($instructions as $v){
              print "<li>".$v."</li>";
            }
          ?>
        </ol>
    </div>
  </div>
</body>
