<?php

namespace App\Modules\Site\Controllers;

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
    //echo "here - home controller";
    $meta = array();
    $trans = array();
    $data = array();

    $viewPath = PATH_MODULES;
    $viewPath .= 'Site/Views';

    $viewName = $viewPath . DS;
    $viewName .= strtolower($args['controller']);


    /*
    * render the view
    * @params string 	$viewname
    * @params array 	$meta
    * @params array 	$trans
    * @params array 	$data
    */
    View::render($viewName, $meta, $trans, $data);
  }

  protected function after()
  {
  }

  //END-Class
}