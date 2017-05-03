<?php
//print_r($_POST);
//print_r($_FILES);
//exit;

session_start();

$nome						= $_POST['nome'];
$sobrenome			= $_POST['sobrenome'];
$email					= $_POST['email'];
$telefone				= $_POST['telefone'];
$senha					= $_POST['senha'];
$pgto						= $_POST['pgto'];
$obs						= (empty($_POST['obs'])?'(nenhuma observação)':$_POST['obs']);

$mensagem = "Olá, sou $nome e gostaria de contratar o DriverUP. <br>
Abaixo seguem as especificações a minha solicitação: <br>
 <br>
 - <strong>Nome:</strong> $nome <br>
 - <strong>Sobrenome:</strong> $sobrenome <br>
 - <strong>E-mail:</strong> $email <br>
 - <strong>Telefone:</strong> $telefone <br>
 - <strong>Senha:</strong> $senha <br>
 - <strong>Forma de Pagamento:</strong> $pgto <br>
 - <strong>Observações:</strong> $obs <br>
 <br>
Junto a minha solicitação, segue minha foto da minha documentação. <br>
Obrigado! <br>
 <br>
*************************************************************** <br>
Esse ticket foi criado automaticamente, a partir de uma solicitação no formulário de Cadastro do site DriverUP. <br>
Caso não tenha sido você que fez o cadastro, responda a essa mensagem nos informando. <br>
Equipe DriverUP. <br>
 ";

$hesk_path= dirname(dirname(dirname(__FILE__))) . '/suporte';
//die($hesk_path);

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

  $res = hesk_dbQuery($sql);

	if(hesk_dbNumRows($res) == 0){
		$trackIdUNICO = true;
	}
}

//die('/dados/http/zbraestudio.com.br/driverup/img/a2.jpg');

//die($trackid);

/* Imagens */
$anexos = null;
foreach ($_FILES as $x=>$file) {

  $file_name = $file['name'];
  $file_size = $file['size'];
  $file_tmp_name = $file['tmp_name'];

  $ext = strtolower(strrchr($file_name, "."));

  $useChars='AEUYBDGHJLMNPQRSTVWXZ123456789';
  $tmp = $useChars{mt_rand(0,29)};

  for($j=1;$j<10;$j++) {
    $tmp .= $useChars{mt_rand(0,29)};
  }


  $file_save = substr($trackid . '_' . $x . '_' . md5($tmp . $file_name), 0, 200) . $ext;

  //move definitivo
//  die(HESK_PATH . $hesk_settings['attach_dir'] . '/' . $file_save);
  rename($file_tmp_name, HESK_PATH . $hesk_settings['attach_dir'] . '/' . $file_save);

  //registra no HESK
  $sql = "INSERT INTO `".hesk_dbEscape($hesk_settings['db_pfix'])."attachments` (`ticket_id`,`saved_name`,`real_name`,`size`) VALUES ('".hesk_dbEscape($trackid)."','".hesk_dbEscape($file_save)."','".hesk_dbEscape($file_nam)."','".intval($file_size)."')";

  hesk_dbQuery($sql);

  $anexos .= hesk_dbInsertID() . '#' . $file_name .',';
//die($tmpvar['attachments']);

}

/* MODELO - FIM */
$ticket = array();
$ticket['trackid']			= $trackid;
$ticket['name']				= $nome . ' ' . $sobrenome;
$ticket['email']			= $email;
$ticket['category']			= null;
$ticket['priority']			= 0;
$ticket['subject']			= 'Quero contratar o DriverUP';
$ticket['message']			= $mensagem;

$ticket['owner']				= null;
$ticket['attachments']	= $anexos;

$ticket['history']			= null;

if(hesk_newTicket($ticket)){
  $_SESSION['msg'][0] = 'Cadastro enviado com sucesso!';
  $_SESSION['msg'][1] = 'Opa, já recebemos seu cadastro e em breve estaremos entrando em contato com vocês para agilizar a liberação do seu acesso. Fique tranquilo, qualquer problema a gente conversa com você. Abraços!';

  //Envia e-mail avisando Equipe
  include(dirname(dirname(__FILE__)) . '/includes/autoload.phpmailer.php');
  include(dirname(dirname(__FILE__)) . '/mails/templates/template_cadastro_novo.php');
  

  $res = mail_cadastro_novo_send($nome, $email, $trackid);

} else {
  $_SESSION['msg'][0] = 'Deu erro!   :(';
  $_SESSION['msg'][1] = 'Eita! Deu problema pra gente receber seu cadastro. Tente novamente e se acontecer de novo, entre em contato com nosso suporte: <a href="mailto:suporte@zbraestudio.com.br">mailto:suporte@zbraestudio.com.br</a>.';
}

header('LOCATION: ./mensagem');