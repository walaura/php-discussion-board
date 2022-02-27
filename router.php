<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('routes/thread.php');
require_once('routes/post.php');

$routes = [ThreadRoute::class, PostRoute::class];
$url = $_GET['url'];

foreach ($routes as $route) {
  if (str_contains($_GET['url'], ($route)::getPath())) {
    include('tpl/head.php');
    $routeInstance = new $route;
    echo $routeInstance->getContents();
    include('tpl/footer.php');
    break;
  }
}
