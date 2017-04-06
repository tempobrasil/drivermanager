<?
set_config('TITLE', 'Carros');
$tabela = 'Carros';

$login->verify();

if(GetParam(0) == 'add') {

  //verifica se carro já está registrado...
  if (carro_registered()) {
    header('LOCATION: ' . GetLink('carro'));
  }

}

if(GetParam(0) == 'add' || GetParam(0) == 'edit'){ // INSERIR E EDITAR

  include(get_config('SITE_PATH'). 'pages/' . GetPage() . '.form.php');

} else {

  //include(get_config('SITE_PATH'). 'pages/' . GetPage() . '.grid.php');

  $sql = 'SELECT ID FROM Carros WHERE Usuario = ' . $login->user_id;
  $carros = $db->LoadObjects($sql);

  if(count($carros) > 0){
    header('LOCATION: ' . GetLink('carro/edit/' . base64_encode(intval($carros[0]->ID))));
  } else {
    header('LOCATION: ' . GetLink('carro/add'));
  }


}

?>
