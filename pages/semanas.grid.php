<?
template_getHeader();

$grid = new girafaGRID('Semanas', 'Semanas');

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