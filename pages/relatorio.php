<?
$login->verify();

template_getHeader();

$rep = $params[1];

$rep_file = get_config('SITE_PATH') . 'reports/' . $rep . '.form.php';

if(file_exists($rep_file)) {
  include($rep_file);
} else {
  echo('<p>O relatório que você tenteou acessar não está disponível.</p>');
}

template_getFooter();
?>