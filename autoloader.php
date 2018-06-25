<?php

$dirs = ['controllers', 'models', 'routes', 'interfaces'];
$classes = ['UploadController', 'RouteModel'];

function createStructure($dirs){
  echo "In create structure \n";

  foreach($dirs as $dir){
    echo "$dir \n";

      if(!is_dir($dir)){
         try{
           mkdir("./$dir/", 0777, true);
         } catch(Exception $e){
           echo "Failed to create folder $dir:" ,  $e->getMessage(), "\n";

         }
       }
  }//endforeach
}
createStructure($dirs);

function autoload($dir, $className){

    if(strpos($className, ucfirst(substr($dir, 0, -1)))){
         $filename = "./$dir/".$className.'.php';
         echo $filename;

         if(file_exists($filename)){
           require_once($filename);
         }else{
           echo "class $className doesn't exist!\n";
         }
    }//endif
}

function loader(){

}
// spl_autoload_register(function($classes){
//   echo 'in autoload_register';
//
//   foreach($classes as $class){
//     autoload($class);
//   }
// });
foreach($dirs as $dir){
  foreach($classes as $class){
    if(strpos($class, ucfirst(substr($dir, 0, -1)))!==false){
      autoload($dir, $class);
    }
  }
}
