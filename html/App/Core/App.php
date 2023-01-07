<?php

namespace App\Core;

use App\Config\SetDb;
use App\Config\SetRoutes;


class App
{

  public function __construct()
  {
    self::setConfig();
    self::router();
  }

  private static function setConfig()
  {
    (new DotEnv(PATH_ENV . '.env-database'))->load();
    (new SetDb());
  }

  private static function router()
  {

    $routes = (new SetRoutes)->getRoutes();

    $router = new Router();

    foreach ($routes as $route => $params) {
      $router->addRoute($route, $params);
    };



    //echo '<br /> PATH_HOST  :: ' . $_SERVER['HTTP_HOST'];
    //echo '<br /> REQUEST_URI  :: ' . $_SERVER['REQUEST_URI'];



    //PARSING URL
    $tokens = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES);
    //var_dump($tokens);

    //DISPATCH
    $router->dispatch($tokens);
  }

  //END-Class
}