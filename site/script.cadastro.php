<?php
print_r($_POST);exit;
$hesk_path= dirname(dirname(dirname(__FILE__))) . '/suporte';


define('IN_SCRIPT',1);
define('HESK_PATH', $hesk_path . '/');


require(HESK_PATH . 'hesk_settings.inc.php');
require(HESK_PATH . 'inc/common.inc.php');
require(HESK_PATH . 'inc/pipe_functions.inc.php');
//require(HESK_PATH . 'inc/mail/pop3.php');

// Connect to the database
hesk_dbConnect();


/* Track ID */
$trackIdUNICO = false;
for($x=1; (!$trackIdUNICO); $x++){

	$trackid = 'DRV-' . date('ym-') . (strlen($x) == 1 ? '0'.$x : $x);

	$sql = "SELECT * FROM `".hesk_dbEscape($hesk_settings['db_pfix'])."tickets` WHERE `trackid`='".$trackid."' LIMIT 1";
	if($nx == 2)
		die($sql);
//	die($sql);
	$res = hesk_dbQuery($sql);

//	die('x:' . hesk_dbNumRows($res));

	if(hesk_dbNumRows($res) == 0){
		$trackIdUNICO = true;
	}
}

//die('/dados/http/zbraestudio.com.br/driverup/img/a2.jpg');

//die($trackid);

/* Imagens */

//EXEMPLOS
$myatt['real_name'] = 'a2.jpg';
$v['stored_name'] = '/dados/http/zbraestudio.com.br/driverup/img/a2.jpg';

$ext = strtolower(strrchr($myatt['real_name'], "."));
$useChars='AEUYBDGHJLMNPQRSTVWXZ123456789';
$tmp = $useChars{mt_rand(0,29)};
for($j=1;$j<10;$j++) {
	$tmp .= $useChars{mt_rand(0,29)};
}

$myatt['saved_name'] = substr($tmpvar['trackid'] . '_' . md5($tmp . $myatt['real_name']), 0, 200) . $ext;

// Rename the temporary file
die($v['stored_name']);
rename($v['stored_name'],HESK_PATH.$hesk_settings['attach_dir'].'/'.$myatt['saved_name']);

// Insert into database
$sql = "INSERT INTO `".hesk_dbEscape($hesk_settings['db_pfix'])."attachments` (`ticket_id`,`saved_name`,`real_name`,`size`) VALUES ('".hesk_dbEscape($tmpvar['trackid'])."','".hesk_dbEscape($myatt['saved_name'])."','".hesk_dbEscape($myatt['real_name'])."','".intval($myatt['size'])."')";

hesk_dbQuery($sql);
$tmpvar['attachments'] .= hesk_dbInsertID() . '#' . $myatt['real_name'] .',';
//die($tmpvar['attachments']);

/* MODELO - FIM */
$ticket = array();
$ticket['trackid']			= $trackid;
$ticket['name']				= 'Motorista123';
$ticket['email']			= 'motorista@dominio.com';
$ticket['category']			= null;
$ticket['priority']			= 0;
$ticket['subject']			= 'Quero contratar o DriverUP';
$ticket['message']			= 'Teste de mensagem';

$ticket['owner']			= null;
$ticket['attachments']		= $tmpvar['attachments'];

$ticket['history']			= null;

if(hesk_newTicket($ticket)){
  die('Enviado!');
} else {
  die('ERRO!');
}