<?

//Carrega sistema
include('../includes/autoload.php');
include('functions.php');

//Envia e-mail avisando Equipe
include(dirname(dirname(__FILE__)) . '/includes/autoload.phpmailer.php');
include(dirname(dirname(__FILE__)) . '/mails/templates/template_convite.php');

//reCAPTCHA
include('recaptchalib.php');
$secret = "6LdeXyEUAAAAAFmX0DZQhEtAka7_KdZrfmwqJCfN";

// verifique a chave secreta
$reCaptcha = new ReCaptcha($secret);

//verifica campo enviado pelo formulário
$response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"],$_POST["g-recaptcha-response"]);

if (!($response != null && $response->success)) {
  $_SESSION['msg'][0] = 'Erro de verificação humana!';
  $_SESSION['msg'][1] = 'Ocorreu um erro ao tentar verificar se você é um humano ou um robô. Caso você realmente seja um humano, procure nosso suporte.';
  header('LOCATION: ./mensagem');
  exit;
}

//die(print_r($_POST, true));

session_start();

$nome						= $_POST['nome'];
$sobrenome			= $_POST['sobrenome'];
$email					= $_POST['email'];
$telefone				= $_POST['telefone'];
$cidadeUF				= $_POST['cidadeUF'];
$motorista			= $_POST['motorista'];


//Verifica se já estou cadastrado...
$sql = 'SELECT * FROM Convites';
$sql .= " WHERE Email = '$email'";
$emails = $db->LoadObjects($sql);

if(count($emails) > 0){

  //verifica se estava cancelado
  if($emails[0]->Cancelado == 'N'){
    $_SESSION['msg'][0] = 'Você já estava cadastrado!';
    $_SESSION['msg'][1] = 'Ops! Verificamos e você já tem um convite cadastrado. Fique tranquilo que em breve entraremos em contato com você.';
    header('LOCATION: ./mensagem');
    exit;
  } else {

    $post = new girafaTablePost();
    $post->id = $emails[0]->ID;
    $post->table = 'Convites';
    $post->AddFieldString('Cancelado', 'N');
    $db->Execute($post->GetSql());

    $_SESSION['msg'][0] = 'Opa! Que bom que você voltou! :)';
    $_SESSION['msg'][1] = 'Ficamos felizes de saber que você voltou e solicitou um novo convite em nosso sistema. Fique tranquilo que já reativamos seu antigo convite e em breve entraremos em contato com você.';
    header('LOCATION: ./mensagem');
    exit;

  }

} else {

  $post = new girafaTablePost();
  $post->table = 'Convites';

  $post->AddFieldString('Nome',       $nome);
  $post->AddFieldString('Sobrenome',  $sobrenome);
  $post->AddFieldString('Email',      $email);
  $post->AddFieldString('Telefone',   $telefone);
  $post->AddFieldString('CidadeUF',   $cidadeUF);
  $post->AddFieldString('Cancelado',  'N');
  $post->AddFieldString('EhMotorista',$motorista);

  $db->Execute($post->GetSql());

  $res = mail_convite_send($nome, $email);

  $_SESSION['msg'][0] = 'Sua solicitação de convite foi enviada com sucesso! :)';
  $_SESSION['msg'][1] = 'Bacana! Já recebemos sua solicitação e em breve nossa equipe entrará em contato com você.';

  header('LOCATION: ./mensagem');

}
?>