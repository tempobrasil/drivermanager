<?
global $login;

$login->verify();

?>
<body>
<div id="wrapper">
  <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element">

          <span>
              <img class="logo" src="<?= get_config('SITE_URL')?>img/logo.png" />
          </span>

            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

              <span class="clear">
                  <span class="block m-t-xs">
                      <strong class="font-bold"><?= $login->user_name; ?></strong>
                  </span> <span class="text-muted text-xs block"><?= $login->user_mail; ?> <b class="caret"></b></span>
              </span>

            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
              <li><a href="javascript:alert('Essa opção está indisponível no momento.');">Configurações</a></li>
              <li class="divider"></li>
              <li><a href="<?= get_config('SITE_URL'); ?>/script/logout.php">Sair</a></li>
            </ul>
          </div>
          <div class="logo-element">
            <img src="<?= get_config('SITE_URL');?>/img/logo_icon.png">
          </div>
        </li>

        <li <?= GetPage() == 'dashboard'?'class="active"':null; ?>>
          <a href="<?= GetLink('dashboard'); ?>" title="Painel"><i class="fa fa-th-large"></i> <span class="nav-label">Painel</span></a>
        </li>

        <li <?= GetPage() == 'semanas'?'class="active"':null; ?>>
          <a href="<?= GetLink('semanas'); ?>"><i class="fa fa-power-off" aria-hidden="true"></i> <span class="nav-label">Semanas</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li><a href="<?= GetLink('semanas'); ?>"><i class="fa fa-list" aria-hidden="true"></i> Listar</a></li>
            <li><a href="<?= GetLink('semanas/add'); ?>"><i class="fa fa-file-text-o" aria-hidden="true"></i> Adiciona Novo</a></li>
          </ul>
        </li>


        <li <?= GetPage() == 'carro'?'class="active"':null; ?>>
          <a href="<?= GetLink('carro'); ?>" title="Informações do Seu Carro"><i class="fa fa-car"></i> <span class="nav-label">Carro</span></a>
        </li>

        <li <?= GetPage() == 'relatorio'?'class="active"':null; ?>>
          <a href="<?= GetLink('semanas'); ?>"><i class="fa fa-th-large" aria-hidden="true"></i> <span class="nav-label">Relatórios</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li><a href="<?= GetLink('relatorio/mensal'); ?>"><i class="fa fa-file-o" aria-hidden="true"></i> Balanço Mensal</a></li>
            <li><a href="<?= GetLink('relatorio/semanal'); ?>"><i class="fa fa-file-o" aria-hidden="true"></i> Balanço Semanal</a></li>
          </ul>
        </li>


        <li <?= GetPage() == 'servicos'?'class="active"':null; ?>>
          <a href="<?= GetLink('servicos'); ?>"><i class="fa fa-calculator" aria-hidden="true"></i> <span class="nav-label">Servicos</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li>

              <a href="#" id="damian">UBER <span class="fa arrow"></span></a>
              <ul class="nav nav-third-level">

              <li><a href="https://www.uber.com/pt-BR/fare-estimate" target="_blank">Estimativa de viagem</a></li>

          </ul>

        </li>

            <li <?= GetPage() == 'calculadora'?'class="active"':null; ?>>
              <a href="<?= GetLink('calculadora'); ?>" title="Informações do Seu Carro">Calculadora</a>
            </li>

          </ul>
        </li>

        <li>
          <a href="<?= GetLink('blog'); ?>" target="_blank" title="Blog"><i class="fa fa-rss"></i> <span class="nav-label">Blog</span></a>
        </li>



      </ul>

    </div>
  </nav>

  <div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
      <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
          <form role="search" class="navbar-form-custom" action="search_results.html">
            <div class="form-group">
              <!--<input type="text" placeholder="Faça uma busca..." class="form-control" name="top-search" id="top-search">-->
            </div>
          </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
          <li>
            <span class="m-r-sm text-muted welcome-message">Bem vindo ao Driver UP.</span>
          </li>

          <!--
          <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
              <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
            </a>
            <ul class="dropdown-menu dropdown-messages">
              <li>
                <div class="dropdown-messages-box">
                  <a href="profile.html" class="pull-left">
                    <img alt="image" class="img-circle" src="<?= get_config('SITE_URL')?>img/a7.jpg">
                  </a>
                  <div>
                    <small class="pull-right">46h ago</small>
                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                  </div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                <div class="dropdown-messages-box">
                  <a href="profile.html" class="pull-left">
                    <img alt="image" class="img-circle" src="<?= get_config('SITE_URL')?>img/a4.jpg">
                  </a>
                  <div>
                    <small class="pull-right text-navy">5h ago</small>
                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                  </div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                <div class="dropdown-messages-box">
                  <a href="profile.html" class="pull-left">
                    <img alt="image" class="img-circle" src="<?= get_config('SITE_URL')?>img/profile.jpg">
                  </a>
                  <div>
                    <small class="pull-right">23h ago</small>
                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                  </div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                <div class="text-center link-block">
                  <a href="mailbox.html">
                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
              <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
              <li>
                <a href="mailbox.html">
                  <div>
                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                    <span class="pull-right text-muted small">4 minutes ago</span>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="profile.html">
                  <div>
                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                    <span class="pull-right text-muted small">12 minutes ago</span>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="grid_options.html">
                  <div>
                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                    <span class="pull-right text-muted small">4 minutes ago</span>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <div class="text-center link-block">
                  <a href="notifications.html">
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
          -->

          <li>
            <a href="<?= get_config('SITE_URL'); ?>script/logout.php">
              <i class="fa fa-sign-out"></i> Sair
            </a>
          </li>
          <!--
          <li>
            <a class="right-sidebar-toggle">
              <i class="fa fa-tasks"></i>
            </a>
          </li>
          -->
        </ul>

      </nav>
    </div>