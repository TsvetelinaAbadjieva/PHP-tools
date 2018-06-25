<?php

class RouteModel{

  public $route;
  public $pattern;
  public $class;
  public $method;

  public function getRoute(){
    return $this->route;
  }
  public function getPattern(){
    return $this->pattern;
  }
  public function getClass(){
    return $this->class;
  }
  public function getMethod(){
    return $this->method;
  }

}
