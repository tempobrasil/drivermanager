<?
global $login;

if(isset($login->user_id))
	$identificador = $login->user_id . '_' . $login->user_mail;
else
	$identificador = 'ANONIMO';
?>
<!-- Atendimento Online // Live Helper Chat -->
<script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:400,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//atendimento.zbraestudio.com.br/index.php/por/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(hide_offline)/true/(check_operator_messages)/true/(top)/350/(units)/pixels/(department)/2/(identifier)/<?= $identificador; ?>/(theme)/1?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>