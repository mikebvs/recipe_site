<?php
session_start();
include 'header.php';
?>
<body>
  <div class="main-container">
    <div class="main-wrapper">
      <h2>Recipe Search</h2>
      <form class="search-form" method="POST" action="includes/recipe-search.inc.php">
        <input type="text" name="search" placeholder="Search by title" />
        <button type="submit" name="submit">Search</button>
      </form>
    </div>
  </div>
</body>
