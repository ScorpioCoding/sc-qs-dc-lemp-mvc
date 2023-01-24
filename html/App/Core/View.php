<?php

namespace App\Core;

class View
{
  public function __construct()
  {
    echo ('test within the class');
  }

  /*
    * rendering the page - View.php
    * @params   array   $paths
    * @params   array   $data
    */
  public static function render($name, $meta = array(), $trans = array(), $data = array())
  {
    $path = $name . '.phtml';
    if (self::checkPath($path)) {
      extract($meta);
      extract($trans);
      extract($data);
      if (is_readable($path)) {
        require $path;
      } else {
        throw new \Exception("View.php : renderPage : NO such document exits : $path");
      }
    } else
      throw new \Exception("View.php : renderPage : the checkPath : FAILED");
  } //END renderPage


  /*
    * Path checking at View base level - View.php
    * @params   int     $renderOption 0,1,2
    * @params   array   $paths
    */
  public static function checkPath($path = array())
  {
    if (!is_readable($path))
      throw new \Exception("View.php : checkPath : File doesn't exist : $path");
    else
      return true;
  } //END checkPath








  //END-Class
}