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

function semana_getString($date, $labelShow = true){

  if(empty($date))
    return null;

  $inicio_time = strtotime($date);
  $seg = StartOfDayWeek(date('W', $inicio_time), date('Y', $inicio_time), true);

  $dom = strtotime(date('Y-m-d', $seg) .  ' + 6 day');

  $str  =  date('d/m/Y', $seg)  . ' à ' . date('d/m/Y', $dom);

  if($labelShow){
    if(StartOfDayWeek(date('W'), date('Y'), true) == $seg)
      $str .= ' <span class="label label-info">semana atual</span>';
  }

  return $str;
}

?>