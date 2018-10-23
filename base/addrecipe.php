<?php
include 'header.php';
?>
<body>
  <form method="POST" class="recipe-form" action="includes/addrecipe.inc.php">
    <label class="input-label">Title</label>
    <input type="text" name="title" placeholder="Recipe Title" />
    <label class="input-label">Summary</label>
    <textarea type="text" cols="54" rows="10" class="recipe-summary" name="summary" placeholder="Recipe Summary"></textarea>
    <label class="input-label">Ingredients</label>
    <textarea type="text" cols="54" rows="10" class="recipe-ingredients" name="ingredients" placeholder="Enter Ingredients in comma-separated lists."></textarea>
    <label class="input-label">Instructions</label>
    <textarea type="text" cols="54" rows="10" class="recipe-instructions" name="instructions" placeholder="Enter Instructions on individual lines."></textarea>
    <button type="submit" name="submit">Add Recipe!</button>
  </form>
</body>
<?php
include 'footer.php';
?>
