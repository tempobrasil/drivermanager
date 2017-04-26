<?
function site_setSubTitle($subtitle){
	$t = get_config('SITE_TITLE');
	set_config('SITE_TITLE', $subtitle . ' — ' . $t);
}
function site_setTags($tags){
	set_config('SITE_TAGS', $tags);
}
function site_setDescription($descrption){
	set_config('SITE_DESCRIPTION', $descrption);
}
?>