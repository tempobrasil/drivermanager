<?
function semanas_intToTime($int){

  if(empty($int))
    return null;

  $minutos = $int;

  $h = floor($minutos / 60);
  $m =  ceil($minutos - ($h * 60));

  if(strlen($h) < 2)
    $h = 0 . $h;

  if(strlen($m) < 2)
    $m = 0 . $m;

  return "$h:$m";
}
function semanas_timeToInt($str){
  $h = substr($str, 0, 2);
  $m = substr($str, 3, 2);

  $minutos = (($h * 60) + $m);

  return $minutos;
}

?>