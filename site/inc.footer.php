
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear">
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="title">Acompanhe</h6>
      <p>Acompanhe abaixo todos os canais oficiais de nossa empreesa.</p>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Localização</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
            Balneário Camboriú, SC<br>Blumenau, SC
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +55 (47) 9 9650-6687</li>
        <li><i class="fa fa-envelope-o"></i> suporte@zbraestudio.com.br</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Últimas do Blog</h6>
      <ul class="nospace linklist" id="blog">

        <li>
          Carregando...
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear">
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2017 - Todos os direitos reservados a <a href="http://www.zbraestudio.com.br" target="_blank" title="Z.BRA Estúdio (Balneário Camboriú, SC)">Z.BRA Estúdio</a>.</p>
    <!--<p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>-->
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="<?= get_config('SITE_URL')?>site/layout/scripts/jquery.min.js"></script>
<script src="<?= get_config('SITE_URL')?>site/layout/scripts/jquery.backtotop.js"></script>
<script src="<?= get_config('SITE_URL')?>site/layout/scripts/jquery.mobilemenu.js"></script>

<script src="<?= get_config('SITE_URL')?>site/bower_components/qtip2/dist/jquery.qtip.min.js"></script>
<script src="<?= get_config('SITE_URL')?>site/bower_components/jAlert/dist/jAlert.min.js"></script>
<script src="<?= get_config('SITE_URL')?>site/bower_components/jAlert/dist/jAlert-functions.min.js"></script>

<script src="<?= get_config('SITE_URL')?>site/layout/scripts/tihh.js"></script>


<script src="<?= get_config('SITE_URL')?>site/layout/scripts/chosen/chosen.jquery.js"></script>

</body>
</html>

<!-- Últimas do Blog - rodapé -->
<script>

  $(document).ready(function(){
    $('ul#blog').load('<?= GetLink('site/ajax.widget.posts.php'); ?>');

  });

</script>

<!-- Atendimento Online -->
<script type="text/javascript">
  var LHCChatOptions = {};
  LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500,domain:'zbraestudio.com.br'};
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
    var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
    po.src = '//atendimento.zbraestudio.com.br/index.php/por/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(hide_offline)/true/(top)/350/(units)/pixels/(leaveamessage)/true/(department)/1/(prod)/2/(theme)/3/(prod)/2?r='+referrer+'&l='+location;
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

