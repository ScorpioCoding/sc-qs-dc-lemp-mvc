<?php

namespace App\Modules\Site\Controllers;

use App\Core\Controller;
use App\Core\View;

use App\Modules\Site\Utils\Translation;

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

    $viewTemplatePath = PATH_MODULES;
    $viewTemplatePath .= 'Site/Views';

    $viewName = $viewTemplatePath . DS;
    $viewName .= strtolower($args['controller']);

    //TODO GET META DATA FROM DATABASE
    //$meta = MetaSite::getMeta($args);

    //TODO GET TRANSLATION FROM DATABASE
    //$trans = Translation::getTranslation($args['lang']);

    /*
    * render the view
    * @params int 		$renderOption  (1, 2, 3)
    * @params string 	$path
    * @params string 	$name
    * @params array 	$data
    * @params array 	$trans
    *
    * render options are
    *   1 - no includes
    *   2 - include header and footer
    *   3 - include header, navigation and footer
    */
    View::render(1, $viewTemplatePath, $viewName, $meta, $trans, $data);
  }

  protected function after()
  {
  }

  //END-Class
}