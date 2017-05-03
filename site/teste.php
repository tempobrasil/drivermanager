<?
include('../includes/autoload.php');
include(get_config('SITE_PATH') . 'mails/templates/template_cadastro_novo.php');

$res = mail_cadastro_novo_send('Tihh', 'tiago@tiago.art.br', '13123123123');

if($res === true)
	die('sucesso!');
else
	die('ops!' . $res);

?>FIM