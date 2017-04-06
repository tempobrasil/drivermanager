<?
class girafaLOGIN{

  public $user_name;
  public $user_mail;
  public $user_id;

  function girafaLOGIN(){
    $this->loadSession();
  }
  private function saveSession(){

    $_SESSION['SM_login'] = array(
      'user_id'     => $this->user_id,
      'user_mail'   => $this->user_mail,
      'user_name'   => $this->user_name
    );
  }

  private function loadSession(){
    //print_r($_SESSION['SM_login']);
    if(isset($_SESSION['SM_login'])){

      $this->user_id =      $_SESSION['SM_login']['user_id'];
      $this->user_mail =    $_SESSION['SM_login']['user_mail'];
      $this->user_name =    $_SESSION['SM_login']['user_name'];

    }
  }

  private function destroySession(){
    unset($_SESSION['SM_login']);
  }

  public function login($mail, $pass){

    global $db;

    //criptografa senha
    $pass = md5($pass);

    $sql = 'SELECT * FROM Usuarios';
    $sql .= " WHERE Email = '$mail' AND Senha = '$pass' AND Ativo = 'S'";

    $res = $db->LoadObjects($sql);

    if(count($res) > 0){

      $reg = $res[0];

      $this->user_id = $reg->ID;
      $this->user_mail = $reg->Email;
      $this->user_name = $reg->Nome;

      $this->saveSession();

      return true;

    } else
      return false;

  }

  public function logout(){
    $this->user_id = null;
    $this->user_mail = null;
    $this->user_name = null;

    $this->destroySession();
  }

  public function verify($redirect = true){

    global $login;

    if(!isset($_SESSION['SM_login']['user_id'])){

      $login->logout();
      $_SESSION['login_msg'] = 'Você não está logado para acessar esse link';

      if($redirect)
        header('LOCATION: ' . GetLink('login'));

      return false;
    }

    return true;

  }


}


?>