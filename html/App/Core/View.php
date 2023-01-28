<?php

namespace App\Core;


/** THE VIEW
 * 
 */
class View
{
  public function __construct()
  {
    echo ('test within the class not static');
  }

  public static function setFile($args = array())
  {
    $viewFile = PATH_VIEWS;
    $viewFile .= strtolower($args['module']) . DS;
    $viewFile .= strtolower($args['controller']);
    $viewFile .= '.phtml';

    try {
      self::checkFile($viewFile);
      return $viewFile;
    } catch (NewException $e) {
      echo $e->getErrorMsg();
      return false;
    }
  }

  /*
    * rendering the page - View.php
    * @params   array   $paths
    * @params   array   $data
    */
  public static function render($args = array(), $meta = array(), $trans = array(), $data = array())
  {
    try {
      $viewFile = self::setFile($args);

      if ($viewFile) {
        extract($meta);
        extract($trans);
        extract($data);
        require $viewFile;
      } else {
        throw new NewException("View.php : render : Rendering FAILED");
      }
    } catch (NewException $e) {
      echo $e->getErrorMsg();
    }
  } //END render


  /*
    * Path checking at View base level - View.php
    * @params   int     $renderOption 0,1,2
    * @params   array   $paths
    */
  public static function checkFile($file)
  {
    if (!is_readable($file)) {
      throw new NewException("View.php : checkFile : File doesn't exist in Views : $file ");
      return false;
    } else {
      return true;
    }
  } //END checkFile








  //END-Class
}
