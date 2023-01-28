<?php

namespace App\Controllers\Site;

use App\Core\Controller;
use App\Core\View;


/**
 *  Home
 */
class Home extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {
    //MetaData
    $meta = array();

    // Translation
    $trans = array();

    // Extra data
    $data = array();



    /*
    * render the view
    * @params array 	$args
    * @params array 	$meta
    * @params array 	$trans
    * @params array 	$data
    */
    View::render($args, $meta, $trans, $data);
  }

  protected function after()
  {
  }

  //END-Class
}