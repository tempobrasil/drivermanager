<?
global $login;

if(isset($login->user_id)){

	$identificador = $login->user_id . '_' . $login->user_mail;


	?>
<!-- Atendimento Online // Live Helper Chat -->
<script type="text/javascript">


var LHCChatOptions = {};

/*LHCChatOptions.attr = new Array();
LHCChatOptions.attr.push({'name':'Bet ID','value':'bet_id','type':'text','size':6,'req':true});
LHCChatOptions.attr.push({'name':'Transaction ID','value':'','type':'text','size':6});
LHCChatOptions.attr.push({'name':'Bet ID 2','value':'bet_id 2','type':'hidden','size':0});
LHCChatOptions.attr.push({'name':'Transaction ID 2','value':'','type':'text','size':12,'show':'on'});*/
LHCChatOptions.attr_prefill = new Array();
LHCChatOptions.attr_prefill.push({'name':'email','value':'<?= $login->user_mail ?>','hidden':false});
LHCChatOptions.attr_prefill.push({'name':'username','value':'<?= $login->user_name ?>','hidden':true});

LHCChatOptions.opt = {widget_height:400,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//atendimento.zbraestudio.com.br/index.php/por/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(hide_offline)/true/(check_operator_messages)/true/(top)/350/(units)/pixels/(department)/2/(identifier)/ID_<?= $login->user_id; ?>/(theme)/1?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>

<?
}
?>