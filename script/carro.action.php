<?
include('../includes/autoload.php');

$login->verify();

//print_r($_POST);exit;

$Marca                  = $_POST['Marca'];
$Modelo                 = $_POST['Modelo'];
$Ano                    = $_POST['Ano'];
$Placa                  = $_POST['Placa'];
$Renavam                = $_POST['Renavam'];
$ValorFIPE              = decimalToDB($_POST['ValorFIPE']);
$DepreciacaoAnual       = decimalToDB($_POST['DepreciacaoAnual']);
$OleoValor              = decimalToDB($_POST['OleoValor']);
$OleoVidaUtil           = decimalToDB($_POST['OleoVidaUtil']);
$CombustivelValor       = decimalToDB($_POST['CombustivelValor']);
$CombustivelRendimento  = decimalToDB($_POST['CombustivelRendimento']);
$PastilhasValor         = decimalToDB($_POST['PastilhasValor']);
$PastilhasVidaUtil      = decimalToDB($_POST['PastilhasVidaUtil']);
$DiscosValor            = decimalToDB($_POST['DiscosValor']);
$DiscosVidaUtil         = decimalToDB($_POST['DiscosVidaUtil']);
$PneusValor             = decimalToDB($_POST['PneusValor']);
$PneusVidaUtil          = decimalToDB($_POST['PneusVidaUtil']);
$LavacaoValor           = decimalToDB($_POST['LavacaoValor']);
$LavacaoFrequencia      = $_POST['LavacaoFrequencia'];
$SeguroValor            = decimalToDB($_POST['SeguroValor']);
$DocumentacaoValor      = decimalToDB($_POST['DocumentacaoValor']);

$post = new girafaTablePost();
$post->table = 'Carros';

if(isset($_POST['id']) > 0){
  $post->id = intval($_POST['id']);
  $id = intval($_POST['id']);
}

$post->AddFieldString('Marca',                  $Marca);
$post->AddFieldString('Modelo',                 $Modelo);
$post->AddFieldString('Ano',                   $Ano);
$post->AddFieldString('Placa',                 $Placa);
$post->AddFieldInteger('Renavam',               $Renavam);
$post->AddFieldString('ValorFIPE',              $ValorFIPE);
$post->AddFieldString('DepreciacaoAnual',       $DepreciacaoAnual);
$post->AddFieldString('OleoValor',              $OleoValor);
$post->AddFieldString('OleoVidaUtil',           $OleoVidaUtil);
$post->AddFieldString('CombustivelValor',       $CombustivelValor);
$post->AddFieldString('CombustivelRendimento',  $CombustivelRendimento);
$post->AddFieldString('PastilhasValor',         $PastilhasValor);
$post->AddFieldString('PastilhasVidaUtil',      $PastilhasVidaUtil);
$post->AddFieldString('DiscosValor',            $DiscosValor);
$post->AddFieldString('DiscosVidaUtil',         $DiscosVidaUtil);
$post->AddFieldString('PneusValor',             $PneusValor);
$post->AddFieldString('PneusVidaUtil',          $PneusVidaUtil);
$post->AddFieldString('LavacaoValor',           $LavacaoValor);
$post->AddFieldString('LavacaoFrequencia',      $LavacaoFrequencia);
$post->AddFieldString('SeguroValor',            $SeguroValor);
$post->AddFieldString('DocumentacaoValor',      $DocumentacaoValor);

$sql = $post->GetSql();
//die($sql);
$db->Execute($sql);

if(!isset($id)){
  $id = $db->GetLastIdInsert();
  $_SESSION['form_msg'] = 'O registro foi adicionado com sucesso     :)';
} else {
  $_SESSION['form_msg'] = 'O registro foi atualizado com sucesso     :)';
}

header('LOCATION:' . GetLink('carro/edit/' . base64_encode($id)));

?>