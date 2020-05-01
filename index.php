<?php
  include './includes/Blogs.Class.php'
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title> Blog Site </title>
  </head>
  <body>
    <header>
     <?php //<h1> Blog Site </h1> ?>
    </header>
    <?php
    // New object instance of "blogs" class.
      $blogs = new Blogs( dirname( __FILE__ ).'/data/articles.json');

      // Output ALL the blogs we found!
      $blogs->output();
    ?>
  </body>
</html>