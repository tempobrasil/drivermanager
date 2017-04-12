<?

class girafaREPORTFORM{

  private $title;
  private $html;
  private $script_action;
  private $boxes = array();

  public $class = null;

  function girafaREPORTFORM($title, $script_action){
    global $login, $db;

    $this->script_action = $script_action;
    $this->title = $title;

    //Título
    $html = "<div class=\"row wrapper border-bottom white-bg page-heading\">";
    $html .= "  <div class=\"col-lg-12\">";
    $html .= "    <h2>" . $this->title . "</h2>";
    $html .= "    <ol class=\"breadcrumb\">";
    $html .= "      <li>Relatório</li>";
    $html .= "      <li class=\"active\">";
    $html .= "        <strong>" . $this->title . "</strong>";
    $html .= "      </li>";
    $html .= "      </ol>";
    $html .= "  </div>";
    $html .= "</div>";
    $this->html .= $html;

  }

  function AddBox($girafaFORM_box){

    $this->boxes[] = $girafaFORM_box;

  }

  function PrintHTML(){

    //Tem mensagem pra exibir?
    if(isset($_SESSION['form_msg'])) {
      $html  = "<div class=\"wrapper wrapper-content msg-form\">";
      $html .= "  <div class=\"alert alert-success\" role=\"alert\">" . $_SESSION['form_msg'] . "</div>";
      $html .= "</div>";
      $this->html .= $html;
      unset($_SESSION['form_msg']);
    }


    //Tem mensagem pra exibir?
    if(isset($_SESSION['form_msg_error'])) {
      $html  = "<div class=\"wrapper wrapper-content msg-form\">";
      $html .= "  <div class=\"alert alert-danger\" role=\"alert\">" . $_SESSION['form_msg_error'] . "</div>";
      $html .= "</div>";
      $this->html .= $html;
      unset($_SESSION['form_msg_error']);
    }


    // Content..
    $html  = "<div class=\"wrapper wrapper-content animated fadeInRight\">";
    $html .= "  <div class=\"row\">";
    $html .= "    <form method=\"post\" target=\"_blank\" class=\"$this->class form-horizontal\" action=\"" . get_config('SITE_URL') . "/reports/" . $this->script_action . "\">";

    //Se for edição, adiciona campo oculto com ID
    if(isset($this->reg->ID)){
      $html .= "<input name=\"id\" value=\"" . $this->reg->ID . "\" type=\"hidden\">";
    }

    // BOXES
    foreach($this->boxes as $box){
      $html .= $box->GetHTML();
    }


    //Ações
    $html .= "<div class=\"clearboth\"></div>";
    $html .= "<!-- ACTIONS -->";
    $html .= "<div class=\"col-lg-12\">";
    $html .= "  <div class=\"form-group\">";
    $html .= "    <div class=\"pull-right btn-actions\">";

    if(GetParam(GetParamsCount()-2) == 'edit'){

      if(empty($this->linkNovo))
        $this->linkNovo = GetLink(GetPage()) . '/add';

      $html .= "      <a href=\"" . $this->linkNovo  . "\" class=\"btn btn-info btn-xs\" type=\"submit\">Adicionar novo</a>";
    }

    $html .= "      <button class=\"btn btn-primary\" type=\"submit\">Emitir</button>";
    $html .= "    </div>";
    $html .= "  </div>";
    $html .= "</div>";


    $html .= "    </form>";
    $html .= "   </div>";
    $html .= "</div>";
    $this->html .= $html;

    echo($this->html);
  }

}
?>