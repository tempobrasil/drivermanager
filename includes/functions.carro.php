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

function carro_media_documentacao_dia(){

  global $carro_db;
  carro_load();

  $valor = $carro_db->DocumentacaoValor;
  $valor = floatval($valor / 365);


  return decimalFromDB($valor);

}

function carro_media_seguro_dia(){

  global $carro_db;
  carro_load();

  $valor = $carro_db->SeguroValor;
  $valor = floatval($valor / 365);


  return decimalFromDB($valor);

}

function carro_media_lavacao_dia(){

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


    return decimalFromDB($valor);

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

function carro_media_depreciacao_dia(){

  global $carro_db;
  carro_load();

  $valor = $carro_db->ValorFIPE;
  $taxa = $carro_db->DepreciacaoAnual;
  $valorAno = (($valor / 100) * $taxa);
  $valorDia = floatval($valorAno / 365);


  return $valorDia;

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



  $saldo = 0.00;
  $saldo += carro_consumo_combustivel_valor($kms);

  $saldo += floatval($semana_db->DespesasExtrasValor); //Extras

  $saldo += carro_media_documentacao_dia();
  $saldo += carro_media_seguro_dia();
  $saldo += carro_media_lavacao_dia();
  $saldo += carro_media_depreciacao_dia();
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