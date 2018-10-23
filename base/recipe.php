<?php
session_start();
include 'header.php';
$row = $_SESSION['recipe-details'];
?>
<div class="main-container">
  <div class="main-wrapper">
    <?php //print_r($row); ?>
      <div class="recipe-heading">
        <h2><?php echo $row['recipe_title'];?></h2>
        <hr class="recipe"/>
        <h4 class="author">Author: <?php echo $row['recipe_author']." (".$row['recipe_uid'].")" ?> // Created On: <?php echo $row['recipe_create_date']; ?></h4>
      </div>
      <div class="recipe-content">
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
    <div class="recipe-photo-wrapper">
      <div class="recipe-photo">
        <img />
      </div>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>
