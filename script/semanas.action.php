<?
include('../includes/autoload.php');

//print_r($_POST);exit;

$login->verify();

$Data                       = $_POST['Data'];
$d = explode(' ', $Data);
$Data = $d[0];
$Data                       = dataDDMMYYYYtoYYYYMMDD($Data);
$Servico                    = trim($_POST['Servico']);

$SegKms                     = decimalToDB($_POST['SegKms']);
$SegCorridas                = integerToDB($_POST['SegCorridas']);
$SegTempo                   = semanas_timeToInt($_POST['SegTempo']);
$SegGanhos                  = decimalToDB($_POST['SegGanhos']);

$TerKms                     = decimalToDB($_POST['TerKms']);
$TerCorridas                = integerToDB($_POST['TerCorridas']);
$TerTempo                   = semanas_timeToInt($_POST['TerTempo']);
$TerGanhos                  = decimalToDB($_POST['TerGanhos']);

$QuaKms                     = decimalToDB($_POST['QuaKms']);
$QuaCorridas                = integerToDB($_POST['QuaCorridas']);
$QuaTempo                   = semanas_timeToInt($_POST['QuaTempo']);
$QuaGanhos                  = decimalToDB($_POST['QuaGanhos']);

$QuiKms                     = decimalToDB($_POST['QuiKms']);
$QuiCorridas                = integerToDB($_POST['QuiCorridas']);
$QuiTempo                   = semanas_timeToInt($_POST['QuiTempo']);
$QuiGanhos                  = decimalToDB($_POST['QuiGanhos']);

$SexKms                     = decimalToDB($_POST['SexKms']);
$SexCorridas                = integerToDB($_POST['SexCorridas']);
$SexTempo                   = semanas_timeToInt($_POST['SexTempo']);
$SexGanhos                  = decimalToDB($_POST['SexGanhos']);

$SabKms                     = decimalToDB($_POST['SabKms']);
$SabCorridas                = integerToDB($_POST['SabCorridas']);
$SabTempo                   = semanas_timeToInt($_POST['SabTempo']);
$SabGanhos                  = decimalToDB($_POST['SabGanhos']);

$DomKms                     = decimalToDB($_POST['DomKms']);
$DomCorridas                = integerToDB($_POST['DomCorridas']);
$DomTempo                   = semanas_timeToInt($_POST['DomTempo']);
$DomGanhos                  = decimalToDB($_POST['DomGanhos']);

$DespesasExtrasDescricao    = trim($_POST['DespesasExtrasDescricao']);
$DespesasExtrasValor        = decimalToDB($_POST['DespesasExtrasValor']);

$TotalKms                   = floatval($SegKms) + floatval($TerKms) + floatval($QuaKms) + floatval($QuiKms) + floatval($SexKms) + floatval($SabKms) + floatval($DomKms);
$TotalCorridas              = intval($SegCorridas) + intval($TerCorridas) + intval($QuaCorridas) + intval($QuiCorridas) + intval($SexCorridas) + intval($SabCorridas) + intval($DomCorridas);
$TotalTempo                 = intval($SegTempo) + intval($TerTempo) + intval($QuaTempo) + intval($QuiTempo) + intval($SexTempo) + intval($SabTempo) + intval($DomTempo);
$TotalGanhos                = floatval($SegGanhos) + floatval($TerGanhos) + floatval($QuaGanhos) + floatval($QuiGanhos) + floatval($SexGanhos) + floatval($SabGanhos) + floatval($DomGanhos);


//calcula Dias Trabalhados..
$diasTrabalhados = 0;

if($SegKms > 0)
  $diasTrabalhados++;
if($TerKms > 0)
  $diasTrabalhados++;
if($QuaKms > 0)
  $diasTrabalhados++;
if($QuiKms > 0)
  $diasTrabalhados++;
if($SexKms > 0)
  $diasTrabalhados++;
if($SabKms > 0)
  $diasTrabalhados++;
if($DomKms > 0)
  $diasTrabalhados++;

$post = new girafaTablePost();
$post->table = 'Semanas';

if(isset($_POST['id']) > 0){
  $post->id = intval($_POST['id']);
  $id = intval($_POST['id']);
}

$post->AddFieldInteger('Usuario',     $login->user_id);
$post->AddFieldInteger('Carro',       carro_ID());

$post->AddFieldString('Data',                     $Data);
$post->AddFieldString('Servico',                  $Servico);

$post->AddFieldString('SegKms',                   $SegKms);
$post->AddFieldInteger('SegTempo',                $SegTempo);
$post->AddFieldInteger('SegCorridas',             $SegCorridas);
$post->AddFieldString('SegGanhos',                $SegGanhos);

$post->AddFieldString('TerKms',                   $TerKms);
$post->AddFieldInteger('TerTempo',                $TerTempo);
$post->AddFieldInteger('TerCorridas',             $TerCorridas);
$post->AddFieldString('TerGanhos',                $TerGanhos);

$post->AddFieldString('QuaKms',                   $QuaKms);
$post->AddFieldInteger('QuaTempo',                $QuaTempo);
$post->AddFieldInteger('QuaCorridas',             $QuaCorridas);
$post->AddFieldString('QuaGanhos',                $QuaGanhos);

$post->AddFieldString('QuiKms',                   $QuiKms);
$post->AddFieldInteger('QuiTempo',                $QuiTempo);
$post->AddFieldInteger('QuiCorridas',             $QuiCorridas);
$post->AddFieldString('QuiGanhos',                $QuiGanhos);

$post->AddFieldString('SexKms',                   $SexKms);
$post->AddFieldInteger('SexTempo',                $SexTempo);
$post->AddFieldInteger('SexCorridas',             $SexCorridas);
$post->AddFieldString('SexGanhos',                $SexGanhos);

$post->AddFieldString('SabKms',                   $SabKms);
$post->AddFieldInteger('SabTempo',                $SabTempo);
$post->AddFieldInteger('SabCorridas',             $SabCorridas);
$post->AddFieldString('SabGanhos',                $SabGanhos);

$post->AddFieldString('DomKms',                   $DomKms);
$post->AddFieldInteger('DomTempo',                $DomTempo);
$post->AddFieldInteger('DomCorridas',             $DomCorridas);
$post->AddFieldString('DomGanhos',                $DomGanhos);

$post->AddFieldString('DespesasExtrasDescricao',  $DespesasExtrasDescricao);
$post->AddFieldString('DespesasExtrasValor',      $DespesasExtrasValor);

$post->AddFieldString('TotalKms',                 $TotalKms);
$post->AddFieldInteger('TotalTempo',              $TotalTempo);
$post->AddFieldInteger('TotalCorridas',           $TotalCorridas);
$post->AddFieldString('TotalGanhos',              $TotalGanhos);
$post->AddFieldInteger('TotalDiasTrabalhados',    $diasTrabalhados);

$sql = $post->GetSql();

//die($sql);

$db->Execute($sql);

if(!isset($id)){
  $id = $db->GetLastIdInsert();
  $_SESSION['form_msg'] = 'O registro foi adicionado com sucesso     :)';
} else {
  $_SESSION['form_msg'] = 'O registro foi atualizado com sucesso     :)';
}

header('LOCATION:' . GetLink('semanas/edit/' . base64_encode($id)));

?>