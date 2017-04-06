<?
template_getHeader();

$grid = new girafaGRID('Jornadas', 'Jornadas');

$primeiroDiaDessaSemana = date('Y-m-d', StartOfDayWeek(date('W'), date('Y')));
$primeiroDiaDaSemanaPassada = date('Y-m-d', StartOfDayWeek(date('W')-1, date('Y')));

$grid->AddFilter('Essa semana', "Data >= '$primeiroDiaDessaSemana'", true);
$grid->AddFilter('Semana passada', "Data >= '$primeiroDiaDaSemanaPassada' AND Data < '$primeiroDiaDessaSemana'");

$field_data = new girafaGRID_field('Data');
$field_data->isDate();
$field_data->orderDesc();

$field_kms = new girafaGRID_field('Kms');
$field_kms->isDecimal();

$field_tempo = new girafaGRID_field('TEMPO', 'Tempo');
$field_tempo->isCustom();
$field_tempo->alignCenter();

$field_corridas = new girafaGRID_field('Corridas');
$field_corridas->isInteger();
$field_corridas->alignCenter();
$field_corridas->width = 100;

$field_ganhos = new girafaGRID_field('Ganhos');
$field_ganhos->isMoney();


$grid->addFields(array($field_data, $field_kms, $field_tempo, $field_corridas, $field_ganhos));

$grid->PrintHTML();



function macro_grid_before($fieldname, $reg){

  if($fieldname == 'TEMPO'){
    //return intval($reg->MembrosAdultos + $reg->MembrosCriancas);
    return jornadas_intToTime($reg->Tempo);
  }

}

template_getFooter();
?>