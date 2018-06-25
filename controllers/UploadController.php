<?php

class UploadController{

  private $options = [];

  public function __construct(){
    $this->options = [];
  }

  public function setOptions($options){
    foreach($options as $option){
      $this->options[]= $option;
    }
    return $this;
  }

  public function getOptions(){
    return $this->options;
  }
}
