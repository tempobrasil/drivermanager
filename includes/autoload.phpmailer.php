<?

/* Envia E-mail */
require_once(dirname(dirname(__FILE__)) . '/bower_components/PHPMailer/PHPMailerAutoload.php');

$mailer = new PHPMailer;

$mailer->isSMTP();
$mailer->Host =             'smtp.gmail.com';
$mailer->SMTPAuth =          true;
$mailer->Username =         'zbra.enviador@gmail.com';
$mailer->Password =         'zbrazbra';
$mailer->SMTPSecure =       'ssl';
$mailer->Port =             465;

$mailer->CharSet = "UTF-8";
$mailer->addEmbeddedImage(dirname(dirname(__FILE__)) . '/mails/templates/images/logo.png', 'logo');
$mailer->setFrom('driverup@zbraestudio.com.br', 'Driver UP');
$mailer->isHTML(true);
?>