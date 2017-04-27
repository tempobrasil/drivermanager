<?

include('../includes/autoload.php');

//pega dados
$mail = addslashes($_POST['mail']);
$pass = addslashes($_POST['pass']);

if($login->login($mail, $pass)){

  //verifica se foi espeficiada pra qual URL deve ir depois do login

  if(!empty(@$_SESSION['login_after_url'])) {
    header('LOCATION:' . $_SESSION['login_after_url']);
    unset($_SESSION['login_after_url']);
  } else
    header('LOCATION:' . GetLink('dashboard'));
} else {

  $_SESSION['login_msg'] = 'E-mail ou senha incorreta.';
  header('LOCATION:' . GetLink('login'));

}
?>