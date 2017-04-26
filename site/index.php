<?
include('../includes/autoload.php');
include('functions.php');

//se for em branco, redireciona pro /home
if(empty($_GET['url'])){
	header('LOCATION: ' . get_config('SITE_URL') . 'site/home');
}

//divide parâmetros da URL
$params = explode('/', $_GET['url']);
include(get_config('SITE_PATH') . 'site/pages/' . GetPage(true));
?>