<?
template_getHeader();

$grid = new girafaGRID('Semanas', 'Semanas');

$sql  = 'SELECT Data FROM Semanas GROUP BY YEAR(Data), MONTH(Data)';
$meses = $db->LoadObjects($sql);

$mesAtual = false;
foreach($meses as $mes) {
    $mesObj = new girafaDate($mes->Data, ENUM_DATE_FORMAT::YYYY_MM_DD);
    $mesSeguinteObj = strtotime($mesObj->GetDate('Y-m') . '-1 +1 month');

    if($mesObj->GetDate('Y-m') == date('Y-m'))
        $mesAtual = true;
    $grid->AddFilter('Semanas de ' . $mesObj->GetMonthNameLong() . ' de ' . $mesObj->GetDate('Y'), "Data >= '" . $mesObj->GetDate('Y-m')  . "-01' AND Data < '" . date('Y-m-d', $mesSeguinteObj) . "'", $mesAtual);
}

//caso não tenha registro ainda desse mês, adiciona
if(!$mesAtual) {
    $mesObj = new girafaDate(date('Y-m-d'), ENUM_DATE_FORMAT::YYYY_MM_DD);
    $mesSeguinteObj = strtotime($mesObj->GetDate('Y-m') . '-1 +1 month');
    $grid->AddFilter('Semanas de ' . $mesObj->GetMonthNameLong() . ' de ' . $mesObj->GetDate('Y'), "Data >= '" . $mesObj->GetDate('Y-m') . "-01' AND Data < '" . date('Y-m-d', $mesSeguinteObj) . "'", true);
}
$field_data = new girafaGRID_field('SEMANA', 'Semana');
$field_data->isCustom();

$field_kms = new girafaGRID_field('TotalKms', 'Kms');
$field_kms->isDecimal();

$field_tempo = new girafaGRID_field('TEMPO', 'Tempo');
$field_tempo->isCustom();
$field_tempo->alignCenter();

$field_corridas = new girafaGRID_field('TotalCorridas', 'Corridas');
$field_corridas->isInteger();
$field_corridas->alignCenter();
$field_corridas->width = 100;

$field_ganhos = new girafaGRID_field('TotalGanhos', 'Ganhos');
$field_ganhos->isMoney();


$grid->addFields(array($field_data, $field_kms, $field_tempo, $field_corridas, $field_ganhos));

$grid->PrintHTML();



function macro_grid_before($fieldname, $reg){

    if($fieldname == 'TEMPO'){
        //return intval($reg->MembrosAdultos + $reg->MembrosCriancas);
        return semanas_intToTime($reg->TotalTempo);
    }

    if($fieldname == 'SEMANA'){
        $inicio_time = strtotime($reg->Data);
        $seg = StartOfDayWeek(date('W', $inicio_time), date('Y', $inicio_time), true);

        $dom = strtotime(date('Y-m-d', $seg) .  ' + 6 day');

        return date('d/m/Y', $seg)  . ' à ' . date('d/m/Y', $dom);
    }

}

template_getFooter();
?>