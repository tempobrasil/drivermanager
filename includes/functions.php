<?
function GetPage($extension = false)
{
  global $params;
  $page = $params[0];

  if($extension)
    $page .= '.php';

  return $page;
}

function GetLink($link){
  return get_config('SITE_URL') . $link;
}

function GetParamsArray(){
  global $params;

  if(count($params) >= 1) {
    $p = $params;
    array_shift($p);
    return $p;
  } else {
    return null;
  }

}

function GetParam($key){
  $p = GetParamsArray();
  return @$p[$key];
}

function GetParamsCount(){
  $p = GetParamsArray();
  return intval(count($p));
}

function nl2p($string)
{
  $string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);

    return '<p>'.preg_replace("/([\n]{1,})/i", "</p>\n<p>", trim($string)).'</p>';
}

function template_getHeader(){
  include(get_config('SITE_PATH') . 'includes/html.head.php');
  include(get_config('SITE_PATH') . 'includes/html.header.php');
}

function template_getFooter(){
  include(get_config('SITE_PATH') . 'includes/html.footer.php');
  include(get_config('SITE_PATH') . 'includes/html.foot.php');
}

function GeraLinkAmigavel($texto)
{

  $texto = trim($texto);

  //Tira acentos
  $comAcento = array('O','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','&');
  $semAcento = array('o','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','e');
  $texto = str_replace($comAcento, $semAcento, $texto);

  //Anula alguns acaracters
  $texto = str_replace(array('?', '!', ':', ';', '~', '`', '�', '{', '}', '[', ']', '/', '\\', ',', '(', ')', '"'), '', $texto);

  //Substitui espaços
  $texto = str_replace(' ', '-', $texto);

  //Eleminia Ífens duplicados
  $texto = str_replace('--', '-', $texto);

  //Passa pra minúsculo
  $texto = strtolower($texto);

  return $texto;
}

function dataDDMMYYYYtoYYYYMMDD($data){

  if(empty($data))
    return null;

  return substr($data, 6, 4) . '-' . substr($data, 3, 2) . '-' . substr($data, 0, 2);

}

function dataYYYYMMDDtoDDMMYYYY($data){
  if(empty($data))
    return null;

  return substr($data, 8, 2) . '/' . substr($data, 5, 2) . '/' . substr($data, 0, 4);

}

function decimalToDB($var){

  if(empty($var))
    return null;

  $var = str_replace(',', '.', $var);
  return number_format($var, 2, '.', '');
}

function decimalFromDB($var){

  if(!empty($var))
    return number_format($var, 3, '.', '');
  else
    return null;
}

function integerToDB($int){

  if(empty($int))
    return null;

  return intval($int);
}

function LoadRecord($table, $value, $fieldName = 'ID'){
  global $db, $login;

  $sql = 'SELECT * FROM ' . $table;
  $sql .= " WHERE Usuario = '" . $login->user_id . "' AND " . $fieldName . " = '" . $value . "'";
  //die($sql);
  $res = $db->LoadObjects($sql);

  if(count($res) <= 0)
    return false;
  else
    return $res[0];
}

function StartOfDayWeek($nroSemana, $ano, $comecaSeg = false){

  $day = strtotime($ano . '-01-01 +' . ($nroSemana-1) .  ' week');

  if($comecaSeg)
    $day = strtotime(date('Y-m-d', $day) .  ' + 1 day');

  return $day;

  die($day);
}

function tempo_corrido($time) {

  $now = strtotime(date('m/d/Y H:i:s'));
  $time = strtotime($time);
  $diff = $now - $time;


  $seconds = $diff;
  $minutes = round($diff / 60);
  $hours = round($diff / 3600);
  $days = round($diff / 86400);
  $weeks = round($diff / 604800);
  $months = round($diff / 2419200);
  $years = round($diff / 29030400);

  if ($seconds <= 60) return"1 min atrás";
  else if ($minutes <= 60) return $minutes==1 ?'1 min atrás':$minutes.' min atrás';
  else if ($hours <= 24) return $hours==1 ?'1 hrs atrás':$hours.' hrs atrás';
  else if ($days <= 7) return $days==1 ?'1 dia atras':$days.' dias atrás';
  else if ($weeks <= 4) return $weeks==1 ?'1 semana atrás':$weeks.' semanas atrás';
  else if ($months <= 12) return $months == 1 ?'1 mês atrás':$months.' meses atrás';
  else return $years == 1 ? 'um ano atrás':$years.' anos atrás';
}


function newTicket(){

  $sql  = 'INSERT INTO `hesk_tickets` ';
  $sql .= " (`trackid`,     `name`,             `email`,              `category`, `priority`, `subject`,                     `message`,                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     `dt`,                 `lastchange`,           `firstreply`, `closedat`, `articles`, `ip`,               `language`, `status`, `openedby`, `firstreplyby`, `closedby`, `replies`, `staffreplies`, `owner`, `time_worked`, `lastreplier`, `replierid`, `archive`, `locked`, `attachments`, `merged`, `history`, `custom1`, `custom2`, `custom3`, `custom4`, `custom5`, `custom6`, `custom7`, `custom8`, `custom9`, `custom10`, `custom11`, `custom12`, `custom13`, `custom14`, `custom15`, `custom16`, `custom17`, `custom18`, `custom19`, `custom20`, `custom21`, `custom22`, `custom23`, `custom24`, `custom25`, `custom26`, `custom27`, `custom28`, `custom29`, `custom30`, `custom31`, `custom32`, `custom33`, `custom34`, `custom35`, `custom36`, `custom37`, `custom38`, `custom39`, `custom40`, `custom41`, `custom42`, `custom43`, `custom44`, `custom45`, `custom46`, `custom47`, `custom48`, `custom49`, `custom50`)";
  $sql .= " VALUES";
  $sql .= " ('SJN-X6Q-W3RB', 'Tiago Gonçalves', 'tiago@tiago.art.br', 8,           '1',        'Quero contratar o DriverUP', 'Olá, sou TIAGO.<br />\r\n<br />\r\nQuero contratar o DriverUP. Segue abaixo minhas informações de cadastro:<br />\r\n<br />\r\n - Nome:<br />\r\n - Sobrenome:<br />\r\n - E-mail:<br />\r\n - Telefone:<br />\r\n - Senha:<br />\r\n - Observações:<br />\r\n<br />\r\nGostaria de pagar no plano: TRIMESTRAL.<br />\r\n<br />\r\nEm anexo segue cópia dos meus documentos. <br />\r\n<br />\r\n<br />\r\n********************************<br />\r\nEsse ticket foi criado automaticamente através do site:<br />\r\n<a href=\"http://driverup.zbraestudio.com.br\">http://driverup.zbraestudio.com.br</a>', '2017-04-28 20:09:25', '2017-04-28 20:09:25', NULL,          NULL,       NULL,       '191.187.226.151', NULL,        0,        1,          NULL,           NULL,       0,        0,                0,      '00:00:00',   '0',            NULL,        '0',       '0',      '116#18157195_10213158211579538_4447922057951099216_n.jpg,', '', '<li class="smaller"> 28/04/2017 21:09:25 | ticket criado por Tiago Gonçalves (tihhgoncalves) </li>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')"
'
}


?>