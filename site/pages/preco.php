<?
site_setSubTitle('Preço');
site_setDescription('Veja como é barato ser um motorista assessorado pela Driver UP.');
site_setTags('preço, barato, investimento');

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
        <li><a href="<?= GetLink('site/convenios')?>">Preço</a></li>

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
        <h1>Preço</h1>
        <p>Veja abaixo como é barato de você se tornar um Motorista Profissional assessorado pela Driver UP. Nosso preço é único, ou seja, você paga e dispões de todos os benefícios que nossa empresa oferece. As variações de valores abaixo é somente de desconto, de acordo com o meio de pagamento que escolher ( trimestral, semestral ou anual).
        </p>

        <div id="valores">

          <div class="one_third first">

            <div class="txt_h1">Trimestral</div>

            <div class="preco-velho">
              <span>de <strike>R$20,00</strike> por</span>
            </div>
            <div class="preco-novo">
              <sup>R$</sup>
              <span class="price-value">9<sup>,90*</sup>
              </span>
              <sub class="suffix">/mês</sub>
            </div>

            <div class="desc">
              50% de desconto
              <br>Total do Trimestre: R$29,70.
            </div>

            <div class="infos">
              * Contempla todos os benefícios de um Motorista Driver UP: Sistema, Convênios, Suporte, Suporte e acesso ao Blog.
            </div>

            <a href="#" class="btn destaque">Experimente de graça*</a>
            <p class="btn-info">* por 30 dias</p>


          </div>

          <div class="one_third">

            <div class="txt_h1">Semestral</div>

            <div class="preco-velho">
              <span>de <strike>R$20,00</strike> por</span>
            </div>
            <div class="preco-novo">
              <sup>R$</sup>
              <span class="price-value">8<sup>,50*</sup>
              </span>
              <sub class="suffix">/mês</sub>
            </div>

            <div class="desc">
              58% de desconto.<br>
              Total do Trimestre: R$51,00.
            </div>

            <div class="infos">
              * Contempla todos os benefícios de um Motorista Driver UP: Sistema, Convênios, Suporte, Suporte e acesso ao Blog.
            </div>

            <a href="#" class="btn">Contratar agora!</a>


          </div>
          <div class="one_third">

            <div class="txt_h1">Anual</div>

            <div class="preco-velho">
              <span>de <strike>R$20,00</strike> por</span>
            </div>
            <div class="preco-novo">
              <sup>R$</sup>
              <span class="price-value">7<sup>,30*</sup>
              </span>
              <sub class="suffix">/mês</sub>
            </div>

            <div class="desc">
              64% de desconto.<br>
              Total do Trimestre: R$87,60.
            </div>

            <div class="infos">
              * Contempla todos os benefícios de um Motorista Driver UP: Sistema, Convênios, Suporte, Suporte e acesso ao Blog.
            </div>

            <a href="#" class="btn">Contratar agora!</a>



          </div>


        </div>

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