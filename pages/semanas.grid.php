<?
template_getHeader();

$grid = new girafaGRID('Semanas', 'Semanas');
$grid->sqlOrders = 'Data DESC';

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

$field_servico = new girafaGRID_field('SERVICO', 'Serviço');
$field_servico->isCustom();

$field_kms = new girafaGRID_field('TotalKms', 'Kms');
$field_kms->isDecimal();

$field_tempo = new girafaGRID_field('TEMPO', 'Tempo');
$field_tempo->isCustom();
$field_tempo->alignCenter();

$field_corridas = new girafaGRID_field('TotalCorridas', 'Corridas');
$field_corridas->isInteger();
$field_corridas->alignCenter();
$field_corridas->width = 85;

$field_dias = new girafaGRID_field('TotalDiasTrabalhados', 'Dias Trab.');
$field_dias->isInteger();
$field_dias->alignCenter();
$field_dias->width = 85;

$field_ganhos = new girafaGRID_field('TotalGanhos', 'Ganhos');
$field_ganhos->isMoney();

$field_relatorio = new girafaGRID_field('RELATORIO', ' ');
$field_relatorio->isCustom();
$field_relatorio->alignCenter();



$grid->addFields(array($field_data, $field_servico, $field_kms, $field_tempo, $field_corridas, $field_dias, $field_ganhos, $field_relatorio));

$grid->PrintHTML();



function macro_grid_before($fieldname, $reg){

    if($fieldname == 'TEMPO'){
        //return intval($reg->MembrosAdultos + $reg->MembrosCriancas);
        return semanas_intToTime($reg->TotalTempo);
    }

    if($fieldname == 'SEMANA'){
        return semana_getString($reg->Data);
    }

    if($fieldname == 'SERVICO'){
        return semana_GetNameService($reg->Servico);
    }

    if($fieldname == 'RELATORIO'){
        return '<a href="javascript:emitirRelatorioSemanal(\'' . $reg->Data . '\')"  data-toggle="confirmation" data-popout="true" data-singleton="true"  data-title="Você irá emitir um relatório dessa semana, porém com todos os aplicativos em que trabalhou nessa mesma semana. Deseja continuar?"><i class="fa fa-print" aria-hidden="true"></i></a>';
    }

}

template_getFooter();
?>

<script>
    function emitirRelatorioSemanal(data){

        var parametros = {SEMANA: data};
        Form.send('<?= get_config('SITE_URL') . 'reports/semanal.php'; ?>', parametros, 'POST', '_blank');

    }
</script>