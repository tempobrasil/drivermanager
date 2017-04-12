<?
$form = new girafaREPORTFORM('Balanço Mensal', 'mensal.php');


$box = new girafaFORM_box('Filtros');

//Mês
$html  = '<label class="col-sm-2 control-label">Mês</label>';
$meses_array = array();
$sql  = 'SELECT Data FROM Semanas GROUP BY YEAR(Data), MONTH(Data)';
$meses = $db->LoadObjects($sql);

$mesAtual = false;
foreach($meses as $mes) {
  $mesObj = new girafaDate($mes->Data, ENUM_DATE_FORMAT::YYYY_MM_DD);
  $mesSeguinteObj = strtotime($mesObj->GetDate('Y-m') . '-1 +1 month');

  if($mesObj->GetDate('Y-m') == date('Y-m'))
    $mesAtual = true;
  $meses_array[$mesObj->GetDate('Y-m')] = 'Semanas de ' . $mesObj->GetMonthNameLong() . ' de ' . $mesObj->GetDate('Y');
}

$html .= '<div class="col-sm-4">' . form_field_list('MES', $meses_array, null, date('Y-m')) . '</div>';
$box->AddContent($html);

$form->AddBox($box);



$form->PrintHTML();

?>