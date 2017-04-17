<?
include('../includes/autoload.php');

$vars = $_POST;
$vars_get = null;

foreach($vars as $x=>$var){

  if(!empty($vars_get))
    $vars_get .= '&';

  $vars_get .= $x . '=' . $var;
}

header('LOCATION:' . GetLink('calculadora?' . $vars_get));
?>