<?php
include('../includes/autoload.php');

$login->verify();

if(!isset($_POST['SEMANA']))
  die('Erro ao emitir relatório!');

$semana = $_POST['SEMANA'];

$semanaObj = new girafaDate($semana, ENUM_DATE_FORMAT::YYYY_MM_DD);
$semana_ultimo_diaObj = new girafaDate(date('Y-m-d', strtotime($semanaObj->GetDate('Y-m-d') . '+6 days')), ENUM_DATE_FORMAT::YYYY_MM_DD);

$reg_carro = LoadRecord('Carros', $login->user_id, 'Usuario');

$sql  = 'SELECT * FROM Semanas';
$sql .= " WHERE Data = '" . $semana .  "'";
$sql .= " AND Usuario = '" . $login->user_id . "'";
$semanas = $db->LoadObjects($sql);


$semanas_lista = null;

$total_ganhos = 0.00;
$total_corridas = 0;
$total_tempo = 0;
$total_kms = 0.00;
$total_dias = 0;

foreach($semanas as $semana){

  //Grid semanas
  $html = '<tr>
      <td align="center">' . semana_getString($semana->Data) . '</td>
      <td align="center">' . semana_GetNameService($semana->Servico) . '</td>
      <td align="center">' . number_format($semana->TotalKms, 2, ',', '.') . '</td>
      <td align="center">' . intval($semana->TotalDiasTrabalhados) . '</td>
      <td align="center">' . semanas_intToTime($semana->TotalTempo) . '</td>
      <td align="center">' . intval($semana->TotalCorridas) . '</td>
      <td align="right">R$ ' . number_format($semana->TotalGanhos, 2, ',', '.') . '</td>
    </tr>';
  $semanas_lista .= $html;


  $total_ganhos           += floatval($semana->TotalGanhos);
  $total_corridas         += intval($semana->TotalCorridas);
  $total_tempo            += intval($semana->TotalTempo);
  $total_kms              += floatval($semana->TotalKms);
  $total_dias             += intval($semana->TotalDiasTrabalhados);
  $total_despesasExtras   += floatval($semana->DespesasExtrasValor);

}

// Grid footer
$semanas_lista_footer = '<tfoot>
      <tr>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center">' . number_format($total_kms, 2, ',', '.') . '</td>
        <td align="center">' . $total_dias . '</td>
        <td align="center">' . semanas_intToTime($total_tempo) . '</td>
        <td align="center">' . $total_corridas . '</td>
        <td align="right">R$ ' . number_format($total_ganhos, 2, ',', '.') . '</td>
      </tr>
    </tfoot>';


//Estatísticas



/* PDF */

$mpdf=new mPDF('', 'A4', 10, 'Tahoma, Helvetica, sans-serif',15, 15, 40, 16);
$mpdf->SetDisplayMode('fullpage');

$stylesheet = file_get_contents(get_config('SITE_PATH') . 'reports/reports.css');
$mpdf->WriteHTML($stylesheet, 1);

$tpl = new girafaTpl('semanal.tpl');

$titulo = 'Relatório Semanal<br />(de ' . $semanaObj->GetFullDateForShorten() . ' à ' . $semana_ultimo_diaObj->GetFullDateForShorten() . ') ';

$tpl->setValue('%%PAGE_TITLE%%', mb_strtoupper($titulo,'UTF-8'));
$tpl->setValue('%%CARRO%%', carro_Descricao());
$tpl->setValue('%%CARRO_PLACA%%', carro_Placa());

$tpl->setValue('%%SEMANAS_LISTA%%', $semanas_lista);
$tpl->setValue('%%SEMANAS_LISTA_FOOTER%%', $semanas_lista_footer);


$consumo_combustivel_lts = carro_consumo_combustivel_litros($total_kms);
$consumo_combustivel = carro_consumo_combustivel_valor($total_kms);
$consumo_documentacao = carro_media_documentacao_dia($total_dias);
$consumo_seguro = carro_media_seguro_dia($total_dias);
$consumo_lavacao = carro_media_lavacao_dia($total_dias);
$consumo_depreciacao = carro_media_depreciacao_dia($total_dias);
$consumo_oleo = carro_consumo_oleo_valor($total_kms);
$consumo_pneus = carro_consumo_pneus_valor($total_kms);
$consumo_pastilhas = carro_consumo_pastilhas_valor($total_kms);
$consumo_discos = carro_consumo_discos_valor($total_kms);

//$provisao
$provisao = 0.00;
$provisao += $consumo_combustivel;
$provisao += $total_despesasExtras;
$provisao += $consumo_documentacao;
$provisao += $consumo_seguro;
$provisao += $consumo_lavacao;
$provisao += $consumo_depreciacao;
$provisao += $consumo_oleo;
$provisao += $consumo_pneus;
$provisao += $consumo_pastilhas;
$provisao += $consumo_discos;

$saldo_semana = floatval($total_ganhos - $provisao);

$tpl->setValue('%%DESPESA_GANHOS%%', number_format($total_ganhos, 2, ',', '.'));

$tpl->setValue('%%DESPESA_EXTRAS%%', number_format($total_despesasExtras, 2, ',', '.'));
$tpl->setValue('%%DESPESA_EXTRAS_PERC%%', getPerc($total_despesasExtras, $total_ganhos));

$tpl->setValue('%%DESPESA_COMBUSTIVEL_LITROS%%', number_format($consumo_combustivel_lts, 2, ',', '.'));

$tpl->setValue('%%DESPESA_COMBUSTIVEL%%', number_format($consumo_combustivel, 2, ',', '.'));
$tpl->setValue('%%DESPESA_COMBUSTIVEL_PERC%%', getPerc($consumo_combustivel, $total_ganhos));

$tpl->setValue('%%DESPESA_DOCUMENTACAO%%', number_format($consumo_documentacao, 2, ',', '.'));
$tpl->setValue('%%DESPESA_DOCUMENTACAO_PERC%%', getPerc($consumo_documentacao, $total_ganhos));

$tpl->setValue('%%DESPESA_SEGURO%%', number_format($consumo_seguro, 2, ',', '.'));
$tpl->setValue('%%DESPESA_SEGURO_PERC%%', getPerc($consumo_seguro, $total_ganhos));

$tpl->setValue('%%DESPESA_LAVACAO%%', number_format($consumo_lavacao, 2, ',', '.'));
$tpl->setValue('%%DESPESA_LAVACAO_PERC%%', getPerc($consumo_lavacao, $total_ganhos));

$tpl->setValue('%%DESPESA_LAVACAO_FREQUENCIA%%', carro_lavacaofrequencia_string());

$tpl->setValue('%%DESPESA_DEPRECIACAO_TAXA%%', number_format($reg_carro->DepreciacaoAnual, 1, ',', '.'));

$tpl->setValue('%%DESPESA_DEPRECIACAO%%', number_format($consumo_depreciacao, 2, ',', '.'));
$tpl->setValue('%%DESPESA_DEPRECIACAO_PERC%%', getPerc($consumo_depreciacao, $total_ganhos));

$tpl->setValue('%%DESPESA_OLEO%%', number_format($consumo_oleo, 2, ',', '.'));
$tpl->setValue('%%DESPESA_OLEO_PERC%%', getPerc($consumo_oleo, $total_ganhos));

$tpl->setValue('%%DESPESA_PNEUS%%', number_format($consumo_pneus, 2, ',', '.'));
$tpl->setValue('%%DESPESA_PNEUS_PERC%%', getPerc($consumo_pneus, $total_ganhos));

$tpl->setValue('%%DESPESA_PASTILHAS%%', number_format($consumo_pastilhas, 2, ',', '.'));
$tpl->setValue('%%DESPESA_PASTILHAS_PERC%%', getPerc($consumo_pastilhas, $total_ganhos));

$tpl->setValue('%%DESPESA_DISCOS%%', number_format($consumo_discos, 2, ',', '.'));
$tpl->setValue('%%DESPESA_DISCOS_PERC%%', getPerc($consumo_discos, $total_ganhos));


$tpl->setValue('%%SALDO_SEMANA%%', number_format($saldo_semana, 2, ',', '.'));
$tpl->setValue('%%SALDO_SEMANA_PERC%%', getPerc($saldo_semana, $total_ganhos));

$tpl->setValue('%%LUCRO%%', number_format($saldo_semana, 2, ',', '.'));
$tpl->setValue('%%PROVISAO%%', number_format($provisao, 2, ',', '.'));


//die($tpl->GetHtml());
$mpdf->WriteHTML($tpl->GetHtml());

if($_POST['Action'] == 'DOW')
  $mpdf->Output('drivermanagar_' . GeraLinkAmigavel($titulo) . '.pdf', 'D');
else
  $mpdf->Output();


function getPerc($valorItem, $ganhos){
  return number_format((($valorItem*100) / $ganhos), 2, ',', '.') . '%';
}
?>