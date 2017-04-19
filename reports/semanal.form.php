<?
$form = new girafaREPORTFORM('Balanço Semanal', 'semanal.php');
$form->class = 'form_relatorio';


$box = new girafaFORM_box('Filtros');

//Mês
$html  = '<label class="col-sm-2 control-label">Semana</label>';
$meses_array = array();
$sql  = 'SELECT Data FROM Semanas';
$sql .= " WHERE Usuario = '" . $login->user_id . "'";
$sql .= ' GROUP BY Data ';
$sql .= ' ORDER BY Data DESC';
$semanas = $db->LoadObjects($sql);

foreach($semanas as $semana) {
  $semanaObj = new girafaDate($semana->Data, ENUM_DATE_FORMAT::YYYY_MM_DD);

  $semana_ultimo_diaObj = new girafaDate(date('Y-m-d', strtotime($semanaObj->GetDate('Y-m-d') . '+7 days')), ENUM_DATE_FORMAT::YYYY_MM_DD);

  $semanas_array[$semanaObj->GetDate('Y-m-d')] = $semanaObj->GetFullDateForLong() . ' à ' . $semana_ultimo_diaObj->GetFullDateForLong();
}

$html .= '<div class="col-sm-4">' . form_field_list('SEMANA', $semanas_array, null, date('Y-m')) . '</div>';
$box->AddContent($html);

$box->AddContentBreakLine();

$html  = '<label class="col-sm-3 col-sm-offset-2 control-label">' . form_field_check('DOW', 'Y', 'N', 'download') . ' Baixar PDF</label>';
$box->AddContent($html);

$box->AddContent(form_field_hidden('Action', 'DOW', 'download'));


$form->AddBox($box);

$form->PrintHTML();

?>

<script>

  $(document).ready(function(){

    $('.download').click(function(){

      if ($(this).is(':checked')) {

        $('form.form_relatorio').attr('target', '');
        $('.download').val('DOW');
      } else {
        $('form.form_relatorio').attr('target', '_blank');
        $('.download').val('VIW');
      }

    });

  });

</script>
