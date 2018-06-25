<?php
session_start();


define('DEVELOPMENT', true);
if (defined('DEVELOPMENT') && DEVELOPMENT === true)
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

require_once("./autoloader.php");


!isset($_SESSION['login'])? $_SESSION['login'] = true: $_SESSION['login'] = !$_SESSION['login'];
$user = array(
  'user' => 'user',
  'pass' => 'pass'
);
$value = '';

//test autoloader
$uploader = new UploadController();
$route = new RouteModel();
$route->pattern = '/[a-zA-z0-9]/';
echo $route->getPattern();
$options = ['size'=> 100, 'type'=>'img'];
$uploader->setOptions($options);
echo '<pre>';
var_dump($uploader->getOptions());
echo '</pre>';

/*
echo '<form method="POST" action="">
      <input type="text" name="username" value="${$value}"><?php isset($_POST['username'])?$_POST['username']:$_POST['username']=$value; ?></input>
      <input type="submit" value="submit"></input>
    </form>'
    */
echo '<form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="file" value="" ></input>
            <input type="submit" name="submit" value="submit"></input>
      </form>';

foreach($user as $key => $value){
  echo "<h2>".$user[$key]."</h2>";
  echo $user[$value];
  echo "&nbsp";
}
class Action {

  private $str;

  public function __construct(){
    $this->str = 'My_First_Function';
  }

  public function camelize($str){
   return lcfirst(str_replace(' ','',ucwords(str_replace('_', ' ',$str))));
  }

  public function call_function_by_name($name, $arg1, $arg2){
    $func =  $this->camelize($name);
    print_r("Action::".$func);
    //with paramethers
    if(method_exists($this, $func)){
      return $this -> {$func}($arg1, $arg2);
    }
    echo $this->call_user_func_array($func , [$arg1, $arg2]);
    //without paramethers
    // echo $this->call_user_func(__NAMESPACE__."\Action::".$func);

    // echo new ActionImplement()->$func.();
    // echo camelize($name)();
  }
  public function myFirstFunction($arg1, $arg2){
    return 'Success'.$arg1." ".$arg2;
  }

}
// $str = 'My_First_Function';
// echo "\n";
// $action = new Action();
// echo $action -> camelize($str);
// echo $action->call_function_by_name($str, 'hello','world');
// echo $action->myFirstFunction('hellooo','wooorld')


// $_POST['username'] = 'username';
// echo "<pre>";
// var_dump($_SERVER);
// echo"</pre>";
echo "<pre>";
var_dump($_SERVER);
echo"</pre>";

if(isset($_POST['submit'])){
  $file = $_FILES['file'];
  echo"<pre>";
  var_dump($file['name']);
  var_dump($file['tmp_name']);
  var_dump($file['size']);
  var_dump($file['error']);
  echo"</pre>";
  fileUpload($file);
}

echo parse_str($_SERVER['REQUEST_URI'], $parsedString);
print_r($parsedString);
print_r($_REQUEST);

function fileUpload($file){
  print_r($file);
  if(isset($file) && !$file['error'] && $file['size']>0){
    echo 'in if';
    $temp_name = $file['tmp_name'];
    $filename = $file['name'];
    echo "destination = $temp_name \n";
    echo "filename = $filename \n";

    $targetDestination = "uploads/".$filename;
    echo "targertdest = $targetDestination  \n";

    move_uploaded_file($temp_name , $targetDestination);
  }
}

print_r(parse_url('http://localhost/tests/test1.php?a=%22test%22&b=29999'));

$data = array('foo', 'bar', 'baz', 'boom', 'cow' => 'milk', 'php' => 'hypertext processor');

//build url string with paramethers or with our own variable name
// echo http_build_query($data) . "\n";
// echo http_build_query($data, 'myvar_');

//work with cookies
// setcookie('myCookie', json_encode($user), time()-1, '/tests/test1.php','localhost');
// $cookie = $_COOKIE['myCookie'];
// $unserialized = json_decode($cookie, false);
// echo '\n';
// print_r($cookie);
// print_r($unserialized);
// print_r($_SESSION);
// setsession('login', false, time()-1);
// echo '---';
// print_r($_SESSION);

//try curl
$url = 'http://localhost/tests/routes/RoutesController.php';
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($client, CURL_POST, $data);
$response = curl_exec($client);
echo $result;
