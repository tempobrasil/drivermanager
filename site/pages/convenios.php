<?
site_setSubTitle('Convênios');
site_setDescription('Conheça quem são os parceiro da Driver UP que você pode contar na sua carreira como Motorista Profissional.');
site_setTags('convênio, parceria, benefício');

include('inc.header.php');
?>

  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear">
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?= GetLink('site/home')?>">Home</a></li>
        <li><a href="<?= GetLink('site/convenios')?>">Convênios</a></li>

      </ul>
      <!-- ################################################################################################ -->
    </div>
  </div>


  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row3">
    <main class="hoc container clear">
      <!-- main body -->
      <!-- ################################################################################################ -->
      <div class="content">
        <!-- ################################################################################################ -->
        <h1>Convênios</h1>
        <p>Somos mais do que um aplicativo para administrar a carreira de um motorista profissional.
          Somos uma assessoria que irá ajudar a você crescer profissionalmente e, consequentemente, financeiramente.
          Com isso, estamos firmando parcerias por diversas cidades do Brasil e em breve teremos alguns convênios para oferecer a você.</p>
        <p>Fique de olho! O que já é bom vai ficar ainda melhor.</p>
        <p>Abraços,<br>
          <a href="<?= GetLink('site/home'); ?>">Equipe Driver UP</a></p>
        </p>

        <!-- ################################################################################################ -->
      </div>
      <!-- ################################################################################################ -->
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
<?
include('inc.footer.php');
?>