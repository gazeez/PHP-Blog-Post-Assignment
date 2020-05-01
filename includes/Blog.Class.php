<?php

// Class declaration

class Blog {

  /**

   * Properties (with default values.)

   */

  // PUBLIC means it can be overwritten OUTSIDE of what's in the class methods.
  public $id = 0;
  public $title = '';
  public $contents = '';

  // __construct executes each time we make a new instance of this class (a new object.)

  function __construct ( $id = 0, $title = '', $content = '')
  {
    if ( is_integer( $id ) && !empty( $id ) )
    {
      $this->id = $id;
    }
    if ( is_string( $title ) && !empty( $title ) )
    {
      $this->title = $title;
    }
    if ( is_string( $content ) && !empty( $content ) )
    {
      $this->content = $content;
    }
  }

  public function output ( $echo = TRUE )
  {
    $output = '';
    ob_start();
    ?>
          <?php echo $this->id; ?>.
          <strong><?php echo $this->title; ?>:</strong>
          <?php echo $this->content; ?>
    <?php
    $output = ob_get_clean();
    if ( $echo === TRUE ) echo $output;
    return $output;
  }

}