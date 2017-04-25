<?
include('../includes/autoload.php');
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



        <form action="#" method="post" class="form">

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
            <h4>Documentação</h4>
            <p>Agora precisamos da cópia de uns documentos seus. É simples! Tire uma foto (com seu celular mesmo) e anexe nos campos abaixo.</p>
          </div>

          <div class="one_third first">
            <label for="name">CNH <span>*</span></label>
          </div>
          <div class="two_third">
            <input name="arquivo_cnh" id="arquivo_cnh"  required="" type="file">
          </div>

          <div class="one_third first">
            <label for="name">Comprovante Residencial <span>*</span></label>
          </div>
          <div class="two_third">
            <input name="arquivo_residencial" id="arquivo_residencial"  required="" type="file">
          </div>

          <div class="one_third first">
            <label for="name">Documento Veículo - CRLV<span>*</span></label>
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
            <label for="name">CNH <span>*</span></label>
          </div>
          <div class="two_third">
            <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
          </div>



          <div style="text-align: right">
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
?>