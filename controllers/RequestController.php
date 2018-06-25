<?php
class RequestController{

  public resolvePath(RouteModel $route){
    $route->route = $_SERVER['REQUEST_URI'];
    $route->pattern ='';
    $route->class = '';
    $route->method= $_SERVER['REQUEST_METHOD'];
  }
}
