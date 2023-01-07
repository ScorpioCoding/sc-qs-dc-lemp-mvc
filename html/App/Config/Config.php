<?php

namespace App\Config;

class Config
{
  private $modules = array();
  private $routes = array();

  public function __construct()
  {
    self::setDatabase();
    self::setModules();
  }

  private function setDatabase()
  {
    include_once('database.php');
  }

  private function setModules()
  {
    $mods = include_once('modules.php');

    foreach ($mods as $mod => $params) {
      $this->modules[$mod] = $params;
    };
    //var_dump($this->modules);
  }


  /** Routes
   * 
   */
  public function setRoutes()
  {
    //foreach module get the routes

    foreach ($this->modules as $mod) {
      //echo $mod['routes'] . '<br>';
      $this->routes = include_once(PATH_MODULES . $mod['routes']);
    };
  }
  public function getRoutes()
  {
    return $this->routes;
  }





  //END-Class
}