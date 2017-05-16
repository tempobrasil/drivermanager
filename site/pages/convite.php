<?
site_setSubTitle('Convite');
site_setDescription('Solicite seu convite para começar a testar nossos serviços.');
site_setTags('cadastro, quero, iniciar, hoje, como, como ser, quero ser, convite');

include('inc.header.php');

$maxFile = upload_max_filesize();
?>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div id="breadcrumb" class="hoc clear">
    <!-- ################################################################################################ -->
    <ul>
      <li><a href="<?= GetLink('site')?>">Home</a></li>
      <li><a href="<?= GetLink('site/convite')?>">Convite</a></li>

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
      <h1>Convite</h1>
      <p>Nossa empresa ainda está fazendo os últimos ajustes do nosso sistema e finalizando ainda mais parcerias pra você. Por isso, estamos convidando alguns poucos profissionais para participarem da nossa fase de teste, gratuitamente.</p>
      <p>Para participar da seleção, bastante preencher o formulário abaixo:</p>



      <form action="<?= GetLink('site/script.convite.php'); ?>" method="post" class="form form-convite" enctype="multipart/form-data">

        <hr>

        <div class="one_third first"></div>
        <div class="two_third">
          <h4>Informações Básicas</h4>
          <p>Queremos saber um pouco sobre você.</p>
        </div>

        <div class="one_third first">
          <label for="name">Nome <span>*</span></label>
        </div>
        <div class="two_third">
          <input name="nome" id="nome" value="" size="50" required="" type="text">
        </div>


        <div class="one_third first">
          <label for="name">Sobrenome <span>*</span></label>
        </div>
        <div class="two_third">
          <input name="sobrenome" id="sobrenome" value="" size="80" required="" type="text">
        </div>


        <div class="one_third first">
          <label for="name">E-mail <span>*</span></label>
        </div>
        <div class="one_third">
          <input name="email" id="email" value="" size="50" required="" placeholder="Ex.: eu@dominio.com" type="email">
        </div>

        <div class="one_third first">
          <label for="name">Telefone <span>*</span></label>
        </div>
        <div class="one_third">
          <input name="telefone" id="telefone" value="" size="50" required="" placeholder="Ex.: +55 (47) 9 9999-9999" type="text">
        </div>

        <div class="one_third first">
          <label for="name">Cidade / UF <span>*</span></label>
        </div>
        <div class="one_third">
          <input name="cidadeUF" id="cidadeUF" value="" size="150" required="" placeholder="Balneário Camboriu, SC" type="text">
        </div>

        <div class="one_third first">
          <label for="name">Você já é motorista? <span>*</span></label>
        </div>
        <div class="two_third">
          <select name="motorista" id="motorista" class="chosen" required="" data-placeholder="Selecione uma opção">
            <option value=""></option>
            <option value="S">Sim, já trabalho como motorista.</option>
            <option value="N">Ainda não.</option>
            <option value="Anual">Anual</option>
          </select>
        </div>

        <hr>
        <div class="one_third first">
          <label for="name" class="label-recaptcha">Você é uma pessoa?</label>
        </div>
        <div class="one_third">
          <div class="g-recaptcha" data-sitekey="6LdeXyEUAAAAAOql07vG6E101hmPZjfE0HFB5DkJ"></div>
        </div>


        <div class="one_third first"></div>
        <div class="two_third">
          <input name="submit" value="Solicitar Convite" class="btn" type="submit">
        </div>

      </form>

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

<script>

  $(document).ready(function(){

    $('input#nome').focusout(function(){
      var val = $(this).val();
      var espacoX = val.search(' ');
      if(espacoX > 0){
        infoAlert('Ops!', 'Acho que você preencheu seu nome completo onde deveria ser somente seu nome. <br><br>Tudo bem, já ajeitamos pra você! :)<br>Essa mensagem é só pra te avisar.'); //blue alert

        $('input#sobrenome').val(val.substring(espacoX+1));
        $('input#nome').val(val.substring(0, espacoX));

        $('input#email').focus();

      }

    });


    $('#arquivo_cnh, #arquivo_residencial, #arquivo_carro').bind('change', function() {

      var size = this.files[0].size;

      var max = <?= $maxFile; ?>; //<?= ini_get('upload_max_filesize') ; ?>

      if(size > max) {
        infoAlert('Ops!', 'Desculpe, mas seu arquivo ultrapassou o tamanho máximo, de <?= getFileSize($maxFile); ?>');

        $(this).val('');
      }

    });


    $('.form-convite').submit(function(){

      var reCaptcha = $('#g-recaptcha-response').val();

      if(reCaptcha.length <= 0){
        infoAlert('Ops!', 'Desculpe, mas precisamos saber se você realmente é uma pessoa.<br><br>Deixe eu te explicar o porquê dessa verificação: Diariamente recebemos muitas solicitações enviadas de robôs fingindo ser pessoas.');
        $('.label-recaptcha').css('color', 'red');
        return false;
      }

    });

  });

</script>