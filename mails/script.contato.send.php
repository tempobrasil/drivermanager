<?
include('../includes/autoload.php');
include(SITE_PATH . 'mails/templates/template_contato.php');

$nome =     $_POST['nome'];
$email =    $_POST['email'];
$assunto =  $_POST['assunto'];
$mensagem =  $_POST['msg'];

mail_contato_send($nome, $email, $assunto, $mensagem);

?>