<?php
include('../includes/autoload.php');

$login->verify();

if(!isset($_POST['MES']))
  die('Erro ao emitir relatório!');

$mes = $_POST['MES'];

//$reg_carro = LoadRecord('Carros', $login->user_id, 'Usuario');

$sql  = 'SELECT * FROM Semanas';
$sql .= " WHERE DATE_FORMAT(Data, '%Y-%m') = '" . $mes . "'";
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
      <td align="center">' . number_format($semana->TotalKms, 2, ',', '.') . '</td>
      <td align="center">' . intval($semana->TotalDiasTrabalhados) . '</td>
      <td align="center">' . semanas_intToTime($semana->TotalTempo) . '</td>
      <td align="center">' . intval($semana->TotalCorridas) . '</td>
      <td align="right">R$ ' . number_format($semana->TotalGanhos, 2, ',', '.') . '</td>
    </tr>';
  $semanas_lista .= $html;


  $total_ganhos     += floatval($semana->TotalGanhos);
  $total_corridas   += intval($semana->TotalCorridas);
  $total_tempo      += intval($semana->TotalTempo);
  $total_kms        += floatval($semana->TotalKms);
  $total_dias       += intval($semana->TotalDiasTrabalhados);

}

// Grid footer
$semanas_lista_footer = '<tfoot>
      <tr>
        <td align="center"></td>
        <td align="center">' . number_format($total_kms, 2, ',', '.') . '</td>
        <td align="center">' . $total_dias . '</td>
        <td align="center">' . semanas_intToTime($total_tempo) . '</td>
        <td align="center">' . $total_corridas . '</td>
        <td align="right">R$ ' . number_format($total_ganhos, 2, ',', '.') . '</td>
      </tr>
    </tfoot>';



$mpdf=new mPDF('', 'A4', 10, 'Tahoma, Helvetica, sans-serif',15, 15, 40, 16);
$mpdf->SetDisplayMode('fullpage');

$stylesheet = file_get_contents(get_config('SITE_PATH') . 'reports/reports.css');
$mpdf->WriteHTML($stylesheet, 1);

$tpl = new girafaTpl('mensal.tpl');
$tpl->setValue('%%PAGE_TITLE%%', mb_strtoupper('Relatório do mês Março de 2017','UTF-8'));
$tpl->setValue('%%SEMANAS_LISTA%%', $semanas_lista);
$tpl->setValue('%%SEMANAS_LISTA_FOOTER%%', $semanas_lista_footer);

//die($tpl->GetHtml());

$mpdf->WriteHTML($tpl->GetHtml());

$mpdf->Output();
?>