<?
global $params;
?>
<!DOCTYPE html>
<!--
Template Name: Nodelle
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
  <title><?= get_config('SITE_TITLE'); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="icon" type="image/png" href="<?= get_config('SITE_URL'); ?>img/favicon.png" />

  <!-- Parâmetros da Página -->
  <link rel="icon" href="<?= get_config('SITE_URL'); ?>img/favicon.png">
  <meta name="keywords" content="<?= get_config('SITE_TAGS'); ?>">
  <meta name="description" content="<?= get_config('SITE_DESCRIPTION'); ?>">
  <meta name="author" content="Z.BRA Estúdio (Balneário Camboriú, SC)">

  <!-- Metas do Facebook -->
  <meta property="og:locale" content="pt_BR">
  <meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
  <meta property="og:title" content="<?= get_config('SITE_TITLE'); ?>">
  <meta property="og:description" content="<?= get_config('SITE_DESCRIPTION'); ?>">
  <meta property="og:site_name" content="<?= get_config('SITE_TITLE'); ?>">

  <meta property="og:image" content="<?= get_config('SITE_SHARED'); ?>">
  <meta property="og:image:width" content="<?= get_config('SITE_SHARED_W'); ?>">
  <meta property="og:image:height" content="<?= get_config('SITE_SHARED_H'); ?>">


  <link href="<?= get_config('SITE_URL')?>site/bower_components/components-font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?= get_config('SITE_URL')?>site/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?= get_config('SITE_URL')?>site/layout/styles/tihh.css" rel="stylesheet" type="text/css" media="all">

  <link href="<?= get_config('SITE_URL')?>site/bower_components/qtip2/dist/jquery.qtip.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?= get_config('SITE_URL')?>site/bower_components/jAlert/dist/jAlert.css" rel="stylesheet" type="text/css" media="all">

  <link href="<?= get_config('SITE_URL')?>site/layout/scripts/chosen/chosen.min.css" rel="stylesheet" type="text/css" media="all">

  <!-- Google reCAPTCHA -->
  <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear">
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="nospace">
        <li><a href="<?= GetLink('site'); ?>"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="http://www.zbraestudio.com.br" target="_blank" title="Z.BRA Estúdio (Balneário Camboriú, SC)">Empresa</a></li>
        <li><a href="<?= GetLink('blog'); ?>" target="_blank">Blog</a></li>
        <li><i class="fa fa-envelope-o"></i> <a href="mailto:suporte@zbraestudio.com.br">suporte@zbraestudio.com.br</a> </li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace">
        <li class="logos_apps">
          <img src="<?= get_config('SITE_URL'); ?>site/images/app_logo_uber.png" id="logo_uber" class="apps_logo" title="Assessoria especializada em UBER">
          <img src="<?= get_config('SITE_URL'); ?>site/images/app_logo_cabify.png" id="logo_uber" class="apps_logo" title="Assessoria especializada em Cabify">
          <img src="<?= get_config('SITE_URL'); ?>site/images/app_logo_willgo.png" id="logo_uber" class="apps_logo" title="Assessoria especializada em WillGo">
        </li>
        <li><a href="<?= GetLink('login');?>" class="btn btn-sm">Entrar</a> </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <a href="<?= GetLink('site'); ?>"><img src="<?= get_config('SITE_URL'); ?>site/images/logo.png" id="logo"> </a>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="<?= (GetPage() == 'home'?'active':null); ?>"><a href="<?= GetLink('site/home'); ?>">Home</a></li>
        <li class="<?= (GetPage() == 'assessoria'?'active':null); ?>"><a href="<?= GetLink('site/assessoria'); ?>">A Assessoria</a></li>
        <!--<li class="<?= (GetPage() == 'depoimentos'?'active':null); ?>"><a href="<?= GetLink('site/depoimentos'); ?>">Depoimentos</a></li>-->
        <!--<li class="<?= (GetPage() == 'convenios'?'active':null); ?>"><a href="<?= GetLink('site/convenios'); ?>">Convênios</a></li>-->
        <!--<li class="<?= (GetPage() == 'preco'?'active':null); ?>"><a href="<?= GetLink('site/preco'); ?>">Preço</a></li>-->

      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->