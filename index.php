<?php
function __autoload($class){ 
  require 'application/lib/'.$class.'.php';
}
//load default libraries
// require 'application/lib/common.php';
// require 'application/lib/basecontroller.php';
// require 'application/lib/basemodel.php';
// require 'application/lib/baseview.php';
// require 'application/lib/database.php';
// require 'application/lib/session.php';

//load config files by default use test
//echo $url[1];exit;
Session::init();
$browserurl1 = isset($_GET["url"])?rtrim($_GET["url"]):null;
$url1= explode('/',$browserurl1);

if(isset($url1[2])){
	//if(!isset($_SESSION["urlparameter1"])){
 		Session::set('urlparameter1',$url1[2]);
	//}
}
if(isset($url1[3])){
	//if(!isset($_SESSION["urlparameter2"])){
 		Session::set('urlparameter2',$url1[3]);
	//}
}
if(isset($url1[1])){
Session::set('controllerfunctionname',$url1[1]);
}
require 'application/config/config.php';
$app =new common();
?>
