<?php
ini_set( 'display_errors', 1);
ini_set( 'display_startup_errors', 1);
error_reporting( E_ALL );
include_once dirname( __FILE__ ).'/Blog.Class.php';

class Blogs {

  //Properties

  private $allBlogs = array();

  //Methods

  function __construct ( $blogFilePath = '' )
  {
    if ( file_exists( $blogFilePath ) )
    {
    // Will retrieve the file contents as a string.
      $jsonString = file_get_contents( $blogFilePath );

      // Convert the JSON string to a PHP object.
      $jsonObject = json_decode( $jsonString );

      // Check if the "snacks" are an array.
      if ( is_array( $jsonObject->articles ) )
      {
        // Store the array in our property.
        $this->allBlogs = $jsonObject->articles;
      }

      // If data are NOT an array.
      else
      {
      // Show a warning in the browser.
      echo '<p> Warning!!! Data Appears to be Unreadable </p>';
      }
    }

    // if file does not exist.
    else
    {
      // Show a warning in the browser.
      echo '<p> WARNING: Your file doesn\'t exist!</p>';
    }
  }
  // Output all of the data
  public function output ()
  {
    // If there IS Data.
    if ( is_array($this->allBlogs) && !empty($this->allBlogs) )
    {
      // Heading, and open our unordered data.
      echo '<h2>Blog Site</h2><ul>';

      // Loop through the data
      foreach ( $this->allBlogs as $blog )
      {
        // Create an instance of our OTHER class: Data! Pass in the values.  
        $newBlog  = new Blog( $blog->id, $blog->title, $blog->content );

        // Echo out our result!
        echo '<li>'.$newBlog->output( FALSE ).'</li>';

      } // Close the unordered list
      echo '</ul>';
    }
  }

}