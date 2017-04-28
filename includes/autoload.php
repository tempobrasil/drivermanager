<?

function isLocalhost(){
  return ( $_SERVER['HTTP_HOST'] == 'localhost');
}
session_start();
date_default_timezone_set('America/Sao_Paulo');

include('mpdf60/mpdf.php');

include('config.php');
include(get_config('SITE_PATH') . 'includes/functions.php');
include(get_config('SITE_PATH') . 'includes/functions.form.php');
include(get_config('SITE_PATH') . 'includes/functions.carro.php');
include(get_config('SITE_PATH') . 'includes/functions.semanas.php');

include(get_config('SITE_PATH') . 'includes/girafa.login.php');
include(get_config('SITE_PATH') . 'includes/girafa.db.php');
include(get_config('SITE_PATH') . 'includes/girafa.tablepost.php');
include(get_config('SITE_PATH') . 'includes/girafa.date.php');

include(get_config('SITE_PATH') . 'includes/obj.grid.php');
include(get_config('SITE_PATH') . 'includes/obj.form.php');
include(get_config('SITE_PATH') . 'includes/obj.reports.php');
include(get_config('SITE_PATH') . 'includes/obj.tpl.php');

/* Objetos Girafa */
$db = new girafaDB(get_config('DB_HOST'), get_config('DB_DB'), get_config('DB_USER'), get_config('DB_PASS'));
$login = new girafaLOGIN();

/* Envia E-mail */
require_once(get_config('SITE_PATH') . 'bower_components/PHPMailer/PHPMailerAutoload.php');

/* E-mails */
/*
include(SITE_PATH . '/mails/templates/template_aula_assistindo.php');
include(SITE_PATH . '/mails/templates/template_aula_respostas.php');
*/
$mailer = new PHPMailer;

$mailer->isSMTP();
$mailer->Host =             'smtp.ielbc.com.br';
$mailer->SMTPAuth =         true;
$mailer->Username =         'tiago@ielbc.com.br';
$mailer->Password =         'nw041203';
//$mailer->SMTPSecure =       'tls';
$mailer->Port =             587;

$mailer->CharSet = "UTF-8";
$mailer->addEmbeddedImage(get_config('SITE_PATH') . 'mails/templates/images/logo.png', 'logo');
$mailer->setFrom('tiago@ielbc.com.br', 'LIVRES EaD');
$mailer->isHTML(true);
?>