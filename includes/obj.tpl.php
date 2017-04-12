<?


class girafaTpl{

  private $htmlOriginal;
  private $html;

  function girafaTpl($reportFile){
    $this->html = file_get_contents(get_config('SITE_PATH') . 'reports/' . $reportFile);
    $this->prepareHTML();

    $this->htmlOriginal = $this->html;
  }

  private function prepareHTML(){

    //Faz includes...
    $re = '/{{(.+)}}/mi';
    preg_match_all($re, $this->html, $incs, PREG_SET_ORDER, 0);

    foreach($incs as $inc){
      $html = file_get_contents(get_config('SITE_PATH') . 'reports/inc.' . strtolower($inc[1]) . '.tpl');

      $this->setValue('{{' . $inc[1] . '}}', $html);
    }


    //Carrega algumas variáveis do sistema...
    $this->setValue('%%SITE_URL%%', get_config('SITE_URL'));
    $this->setValue('%%SITE_PATH%%', get_config('SITE_PATH'));

  }

  public function setValue($key, $value){
    $this->html = str_replace($key, $value, $this->html);
  }


  public function GetHtml(){

    return $this->html;
  }

}


?>