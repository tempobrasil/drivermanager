<?
site_setSubTitle('Cadastro');
site_setDescription('Faça seu cadastro e comece sua carreira como Motorista Profissional hoje mesmo.');
site_setTags('cadastro, quero, iniciar, hoje, como, como ser, quero ser');

include('inc.header.php');
?>

  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear">
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?= GetLink('site')?>">Home</a></li>
        <li><a href="<?= GetLink('site/seja-motorista')?>">Cadastro</a></li>

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
        <h1>Faça seu cadastro</h1>
        <p>Chegou a hora de você alcançar sua independência financeira e profissional. Tanto para quem já é como para quem está pensando em começar uma carreira como motorista profissional, nosso sistema irá ajudá-lo e alcançar, muito antes do que você imagina, sua independência profissional e financeira.</p>



        <form action="<?= GetLink('site/script.cadastro.php'); ?>" method="post" class="form" enctype="multipart/form-data">

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
            <input name="email" id="email" value="" size="22" required="" placeholder="Ex.: eu@dominio.com" type="email">
          </div>

          <div class="one_third first">
            <label for="name">Telefone <span>*</span></label>
          </div>
          <div class="one_third">
            <input name="telefone" id="telefone" value="" size="22" required="" placeholder="Ex.: +55 (47) 9 9999-9999" type="text">
          </div>

          <div class="one_third first">
            <label for="name">Senha <span>*</span></label>
          </div>
          <div class="one_third">
            <input name="senha" id="senha"  required="" type="password">
          </div>

          <hr>

          <div class="one_third first"></div>
          <div class="two_third">
            <h4>Pagamento</h4>
            <p>Agora precisamos da cópia de uns documentos seus. É simples! Tire uma foto (com seu celular mesmo) e anexe nos campos abaixo.</p>
          </div>

          <div class="one_third first">

          </div>
          <div class="two_third">
            <select name="pgto" id="pgto" class="chosen" required="">
              <option value="Trimestral">Trimestral (experimente por 30 dias)</option>
              <option value="Semestral">Semestral</option>
              <option value="Anual">Anual</option>
            </select>
          </div>

          <hr>

          <div class="one_third first"></div>
          <div class="two_third">
            <h4>Documentação</h4>
            <p>Agora precisamos da cópia de uns documentos seus. É simples! Tire uma foto (com seu celular mesmo) e anexe nos campos abaixo.</p>
          </div>

          <div class="one_third first">
            <label for="name">

              <i class="fa fa-question-circle tooltip" aria-hidden="true" title="Abre o documento por completo e tire uma única foto que apareça os 2 lados do documento."></i>

              CNH <span>*</span></label>
          </div>
          <div class="two_third">
            <input name="arquivo_cnh" id="arquivo_cnh"  required="" type="file">
          </div>

          <div class="one_third first">
            <label for="name">

              <i class="fa fa-question-circle tooltip" aria-hidden="true" title="Abre seu documento por completo e tire uma única foto que apareça o comprovante inteiro. Utilize um comprovante emitido nos últimos 6 meses."></i>

              Comprovante Residencial <span>*</span></label>
          </div>
          <div class="two_third">
            <input name="arquivo_residencial" id="arquivo_residencial"  required="" type="file">
          </div>

          <div class="one_third first">
            <label for="name">
              <i class="fa fa-question-circle tooltip" aria-hidden="true" title="Abre o documento por completo e tire uma única foto que apareça os 2 lados do documento."></i>

              Documento Veículo - CRLV<span>*</span></label>
          </div>
          <div class="two_third">
            <input name="arquivo_carro" id="arquivo_carro"  required="" type="file">
          </div>


          <hr>

          <div class="one_third first"></div>
          <div class="two_third">
            <h4>Observações</h4>
            <p>Aproveite esse campo para adicionar comentários que gostaria de fazer à nossa equipe ao receber seu cadastro.</p>
          </div>

          <div class="one_third first">

          </div>
          <div class="two_third">
            <textarea name="obs" id="obs" cols="25" rows="10"></textarea>
          </div>

          <div class="one_third first"></div>
          <div class="two_third">
            <input name="submit" value="Enviar cadastro" class="btn" type="submit">
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

$maxFile = upload_max_filesize();
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

  });

</script>