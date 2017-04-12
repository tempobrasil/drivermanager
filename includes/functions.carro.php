<?

$carro_db = null;

/**
 * Verifica se o usuário já tem carro cadastrado
 */
function carro_registered(){
  global $login, $db;

  $sql = 'SELECT * FROM Carros WHERE Usuario = ' . $login->user_id;
  $res = $db->LoadObjects($sql);

  return (count($res) > 0);
}

function carro_load(){
  global $login, $db, $carro_db;

  if(empty($carro_db)) {

    $sql = 'SELECT * FROM Carros WHERE Usuario = ' . $login->user_id;
    $res = $db->LoadObjects($sql);

    $carro_db = $res[0];

  }
}

function carro_media_documentacao_dia($dias = 1){

  global $carro_db;
  carro_load();

  $valor = $carro_db->DocumentacaoValor;
  $valor = floatval($valor / 365);
  $valor = floatval($valor * $dias);

  return decimalFromDB($valor);

}

function carro_media_seguro_dia($dias = 1){

  global $carro_db;
  carro_load();

  $valor = $carro_db->SeguroValor;
  $valor = floatval($valor / 365);
  $valor = floatval($valor * $dias);


  return decimalFromDB($valor);

}

function carro_media_lavacao_dia($dias = 1){

  global $carro_db;
  carro_load();

  $valor = $carro_db->LavacaoValor;

  if($carro_db->LavacaoFrequencia == 'DIA') {
    $valor = floatval($valor);

  } elseif($carro_db->LavacaoFrequencia == 'SEM') {
    $valor = floatval($valor / 7);

  } elseif($carro_db->LavacaoFrequencia == '2XS') {
    $valor = floatval(($valor *2) / 7);

  } elseif($carro_db->LavacaoFrequencia == 'MES') {
    $valor = floatval($valor / 30);

  }

  $valor = floatval($valor * $dias);


    return decimalFromDB($valor);

}

function carro_media_depreciacao_dia($dias = 1){

  global $carro_db;
  carro_load();

  $valor = $carro_db->ValorFIPE;
  $taxa = $carro_db->DepreciacaoAnual;
  $valorAno = (($valor / 100) * $taxa);
  $valorDia = floatval($valorAno / 365);

  $valorDia = floatval($valorDia * $dias);

  return $valorDia;

}

function carro_media_oleo_km(){

  global $carro_db;
  carro_load();

  $valor = $carro_db->OleoValor;
  $vidaUtil = $carro_db->OleoVidaUtil;
  //die(($valor  . ' -- ' .  $vidaUtil));
  $valor = floatval($valor / $vidaUtil);
  //die($valor);


  return decimalFromDB($valor);

}

function carro_media_pastilhas_km(){

  global $carro_db;
  carro_load();

  $valor = $carro_db->PastilhasValor;
  $vidaUtil = $carro_db->PastilhasVidaUtil;
  $valor = floatval($valor / $vidaUtil);


  return decimalFromDB($valor);

}

function carro_media_discos_km(){

  global $carro_db;
  carro_load();

  $valor = $carro_db->DiscosValor;
  $vidaUtil = $carro_db->DiscosVidaUtil;
  $valor = floatval($valor / $vidaUtil);


  return decimalFromDB($valor);

}

function carro_media_pneus_km(){

  global $carro_db;
  carro_load();

  $valor = $carro_db->PneusValor;
  $vidaUtil = $carro_db->PneusVidaUtil;
  $vidaUtil = $carro_db->PneusVidaUtil;
  $valor = floatval($valor / $vidaUtil);


  return decimalFromDB($valor);

}



function carro_consumo_combustivel_litros($km){
  global $carro_db;
  carro_load();

  $rendimento = $carro_db->CombustivelRendimento;

  return floatval($km / $rendimento);

}

function carro_consumo_combustivel_valor($km){
  global $carro_db;
  carro_load();

  $litros = carro_consumo_combustivel_litros($km);
  $combustivel_preco = $carro_db->CombustivelValor;

  return floatval($litros * $combustivel_preco);

}

function carro_consumo_oleo_valor($km){
  return floatval(carro_media_oleo_km() * $km);
}

function carro_consumo_pneus_valor($km){
  return floatval(carro_media_pneus_km() * $km);
}

function carro_consumo_pastilhas_valor($km){
  return floatval(carro_media_pastilhas_km() * $km);
}

function carro_consumo_discos_valor($km){
  return floatval(carro_media_discos_km() * $km);
}

function carro_jornada_provisoes($semanaID){

  $semana_db = LoadRecord('Semanas', $semanaID);
  $kms = $semana_db->TotalKms;
  $dias = $semana_db->TotalDiasTrabalhados;



  $saldo = 0.00;
  $saldo += carro_consumo_combustivel_valor($kms);

  $saldo += floatval($semana_db->DespesasExtrasValor); //Extras

  $saldo += carro_media_documentacao_dia($dias);
  $saldo += carro_media_seguro_dia($dias);
  $saldo += carro_media_lavacao_dia($dias);
  $saldo += carro_media_depreciacao_dia($dias);
  $saldo += carro_consumo_oleo_valor($kms);
  $saldo += carro_consumo_pneus_valor($kms);
  $saldo += carro_consumo_pastilhas_valor($kms);
  $saldo += carro_consumo_discos_valor($kms);

  return $saldo;
}

function carro_jornada_saldo($semanaID){
  $semana_db = LoadRecord('Semanas', $semanaID);

  $ganhos = $semana_db->TotalGanhos;
  $provisoes = carro_jornada_provisoes($semanaID);

  return floatval($ganhos - $provisoes);
}

function carro_ID(){
  global $carro_db;
  carro_load();

  return $carro_db->ID;
}

function carro_lavacaofrequencia_string(){

  global $carro_db;
  carro_load();
  
  switch($carro_db->LavacaoFrequencia){
    case 'DIA': return 'Todo dia';
    case 'SEM': return '1x por semana';
    case '2XS': return '2x por semana';
    case 'MES': return '1x por mês';
  }

}

function carro_Placa(){
  global $carro_db;
  carro_load();

  return $carro_db->Placa;
}
function carro_Descricao(){
  global $carro_db;
  carro_load();

  return $carro_db->Marca . ' ' . $carro_db->Modelo . ' ' . $carro_db->Ano;
}