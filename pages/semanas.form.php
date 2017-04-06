<?

template_getHeader();

$form = new girafaFORM('Semanas', 'semanas.action.php', 'Semanas', 'Data');
$form->class = 'form_semana';

/* DADOS PESSOAIS */
$box = new girafaFORM_box('Dados Gerias');


//Data
$html  = '<label class="col-sm-2 control-label">Semana</label>';
//$html .= '<div class="col-sm-4"><div class="input-group date"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="week" id="calendarioSemanas" placeholder="Select Week" /></div></div>';
$html .= '<div class="col-sm-4">' . form_field_date('Data', @$form->reg->Data, null, true, 'week') . '</div>';
$box->AddContent($html);

$box->AddContentBreakLine();

$html = '<table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">Dia</th>
                                    <th style="text-align: center;">Kms</th>
                                    <th style="text-align: center;">Corridas</th>
                                    <th style="text-align: center;">Tempo</th>
                                    <th style="text-align: center;">Ganhos (R$)</th>
                                </tr>
                                </thead>
                                <tbody>';

$dias = array(
    '0' => array('Segunda-feira', 'Seg'),
    '1' => array('Terça-feira', 'Ter'),
    '2' => array('Quarta-feira', 'Qua'),
    '3' => array('Quinta-feira', 'Qui'),
    '4' => array('Sexta-feira', 'Sex'),
    '5' => array('Sábado', 'Sab'),
    '6' => array('Domingo', 'Dom'),
);

foreach($dias as $dia){
    $html .= '<tr>';
    $html .= '    <td style="padding-top: 15px;text-align: center;"><strong>' . $dia[1] . '</strong></td>';
    $fieldname = $dia[1] . 'Kms';
    $html .= '    <td>' . form_field_number($fieldname, @$form->reg->$fieldname, null, null, 9999, false) . '</td>';
    $fieldname = $dia[1] . 'Corridas';
    $html .= '    <td>' . form_field_integer($fieldname, @$form->reg->$fieldname, null, 0, 9999, false) . '</td>';
    $fieldname = $dia[1] . 'Tempo';
    $html .= '    <td>' . form_field_string($fieldname, @semanas_intToTime($form->reg->$fieldname), 5, null, false, '99:99') . '</td>';
    $fieldname = $dia[1] . 'Ganhos';
    $html .= '    <td>' . form_field_number($fieldname, @$form->reg->$fieldname, null, 0.00, 9999, false) . '</span></td>';
    $html .= '</tr>';
}

$html .= '</tbody>';

if(!empty($form->reg->ID)) {

    $html .= '<tfoot>';
    $html .= '<tr>';
    $html .= '    <td style="padding-top: 15px;text-align: center;"><strong>TOTAL</strong></td>';
    $html .= '    <td style="padding-top: 15px; text-align: right"><span class="label label-default">' . number_format($form->reg->TotalKms, 2, ',', '.') . 'km</span></td>';
    $html .= '    <td style="padding-top: 15px; text-align: right"><span class="label label-default">' . intval($form->reg->TotalCorridas) . '</span></td>';
    $html .= '    <td style="padding-top: 15px; text-align: right"><span class="label label-default">' . semanas_intToTime($form->reg->TotalTempo) . '</span></td>';
    $html .= '    <td style="padding-top: 15px; text-align: right"><span class="label label-default">R$ ' . number_format($form->reg->TotalGanhos, 2, ',', '.') . '</span></td>';
    $html .= '</tr>';
    $html .= '</tfoot>';
}

$html .= '</table>';

$box->AddContent($html);

$form->AddBox($box);



$box = new girafaFORM_box('Despesas Extras', 'Registre abaixo despesas extras dessa semana.');

//Despesas Extra Descricao
$html  = '<label class="col-sm-2 control-label">Semana</label>';
$html .= '<div class="col-sm-10">' . form_field_textarea('DespesasExtrasDescricao', @$form->reg->DespesasExtrasDescricao, null, false) . '</div>';
$box->AddContent($html);

$box->AddContentLine();

//Despesas Extra Valor
$html = '<label class="col-sm-2 control-label">Valor</label>';
$html .= '<div class="col-sm-3">' . form_field_number('DespesasExtrasValor', @$form->reg->DespesasExtrasValor, null, 0.00, 9999, false) .'</div>';
$box->AddContent($html);

$form->AddBox($box);



/* Estatísticas */


if(!empty($form->reg->ID)) {


    $box = new girafaFORM_box('Extrato dessa Jornada', 'Veja abaixo algumas informações de custos para essa jornada.', 8);

    $html = '<table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Observações</th>
                                    <th>Valor</th>

                                </tr>
                                </thead>
                                <tbody>';

    $html .= '<tr><td>Ganhos do UBER</td>
                <td></td>
                <td> <span class="label label-success">R$ ' . number_format(decimalFromDB($form->reg->TotalGanhos), 2, ',', '.') . '</span></td>
            </tr>';

    $combustivel_lts = carro_consumo_combustivel_litros($form->reg->TotalKms);
    $combustivel_valor = carro_consumo_combustivel_valor($form->reg->TotalKms);
    $html .= '<tr><td>Combustível</td>
                <td> ' . number_format($combustivel_lts, 2, ',', '.') . ' litros</td>
                <td> <span class="label label-danger">R$ ' . number_format($combustivel_valor, 2, ',', '.') . '</span></td>
            </tr>';

    $html .= '<tr><td>Documentação do Carro</td>
                <td>Anual</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_media_documentacao_dia(), 2, ',', '.') . '</span></td>
             </tr>';

    $html .= '<tr><td>Seguro do Carro</td>
                <td>Anual</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_media_seguro_dia(), 2, ',', '.') . '</span></td>
             </tr>';

    $html .= '<tr><td>Lavação do Carro</td>
                <td>Semanal</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_media_lavacao_dia(), 2, ',', '.') . '</span></td>
             </tr>';

    $html .= '<tr><td>Depreciação</td>
                <td>' . number_format($carro_db->DepreciacaoAnual, 1, ',', '.') . '% a.a.</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_media_depreciacao_dia(), 2, ',', '.') . '</span></td>
            </tr>';


    $html .= '<tr><td>Óleo + Filtro</td>
                <td></td>
                <td><span class="label label-danger">R$ ' . number_format(carro_consumo_oleo_valor($form->reg->TotalKms), 2, ',', '.') . '</span></td>
             </tr>';

    $html .= '<tr><td>Pneus</td>
                <td>O jogo</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_consumo_pneus_valor($form->reg->TotalKms), 2, ',', '.') . '</span></td>
             </tr>';

    $html .= '<tr><td>Pastilhas de Freio</td>
                <td>O jogo</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_consumo_pastilhas_valor($form->reg->TotalKms), 2, ',', '.') . '</span></td>
             </tr>';

    $html .= '<tr><td>Discos de Freio</td>
                <td>O jogo</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_consumo_discos_valor($form->reg->TotalKms), 2, ',', '.') . '</span></td>
             </tr>';

    $jornada_saldo = carro_jornada_saldo($form->reg->ID);
    $jornada_provisoes = carro_jornada_provisoes($form->reg->TotalKms);


    $html .= '
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td><strong>Saldo da Semana</strong></td>
                                       <td></td>
                                       <td><span class="label label-primary">R$ ' . number_format($jornada_saldo, 2, ',', '.') . '</span></td>
                                    </tr>
                                </tfoot>
                            </table>';


    $box->AddContent($html);

    $form->AddBox($box);


    $box = new girafaFORM_box('Saldo do Dia', '', 4);

    $html = '<div class="alert alert-success"><strong>R$ ' . number_format($jornada_saldo, 2, ',', '.') . '</strong> - Lucro</div>';
    $html .= '<div class="alert alert-danger"><strong>R$ ' . number_format($jornada_provisoes, 2, ',', '.') . '</strong> - Provisões para o Carro</div>';

    $box->AddContent($html);

    $form->AddBox($box);

    $box = new girafaFORM_box('Distribuição de Ganhos', '', 4);

    $html = '<div><div id="pie"></div></div>';
    $box->AddContent($html);

    $form->AddBox($box);

}

$form->PrintHTML();

template_getFooter();

if(!empty($form->reg->ID)) {
    ?>
    <script>

        $(document).ready(function () {

            c3.generate({
                bindto: '#pie',
                data: {
                    columns: [
                        ['Lucro', <?= carro_jornada_saldo($form->reg->ID); ?>],
                        ['Combustível', <?= carro_consumo_combustivel_valor($form->reg->TotalKms); ?>],
                        ['Documentação', <?= carro_media_documentacao_dia(); ?>],
                        ['Seguro', <?= carro_media_seguro_dia(); ?>],
                        ['Lavação', <?= carro_media_lavacao_dia(); ?>],
                        ['Depreciação', <?= carro_media_depreciacao_dia(); ?>],
                        ['Óleo', <?= carro_consumo_oleo_valor($form->reg->TotalKms); ?>],
                        ['Pneus', <?= carro_consumo_pneus_valor($form->reg->TotalKms); ?>],
                        ['Pastilhas', <?= carro_consumo_pastilhas_valor($form->reg->TotalKms); ?>],
                        ['Discos', <?= carro_consumo_discos_valor($form->reg->TotalKms); ?>]
                    ],

                    type: 'pie'
                }
            });

        });

    </script>

    <?
}
?>


<script>
    $(document).ready(function() {

      var startDate
      var endDate;

      <?
      $sql  = 'SELECT Data FROM Semanas WHERE Usuario = ' . $login->user_id;

      if($form->isEdit)
        $sql .= ' AND ID <> ' . $form->reg->ID;

      $semanas = $db->LoadObjects($sql);

      $dias = array();

      foreach($semanas as $semana){

        $data = new girafaDate($semana->Data, ENUM_DATE_FORMAT::YYYY_MM_DD);

          $dias[] = '"' . $data->GetDate('d/m/Y') . '"';
          $dias[] = '"' . date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +1 day')) . '"';
          $dias[] = '"' . date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +2 day')) . '"';
          $dias[] = '"' . date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +3 day')) . '"';
          $dias[] = '"' . date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +4 day')) . '"';
          $dias[] = '"' . date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +5 day')) . '"';
          $dias[] = '"' . date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +6 day')) . '"';

      }
      ?>
      var semanasJaCadastradas = [<?= implode(', ', $dias); ?>];


      $('.input-group.date.week').datepicker('remove');
      $('.input-group.date.week').datepicker({
        autoclose: true,
        weekStart: 1,
        format: "dd/MM/yyyy",
        forceParse: false,
        beforeShowDay: function (day) {

          var d = forceZeros(day.getDate(),2) + '/' + forceZeros(day.getMonth() +1,2) + '/' + forceZeros(day.getFullYear(),4);
          if(semanasJaCadastradas.indexOf(d) > -1) {
            console.log(' ---- ' + d + ' ---- Semana já cadastrada');
            return {
              enabled: false
            }
          }

        },

        todayBtn: "linked",
        keyboardNavigation: false,
        calendarWeeks: true,
        currentText: 'Hoje',
        language: "pt-BR"


      }).on("changeDate", function (e) {
        var date = e.date;

        GetDateDisplay(date);

      }).on("onSelect", function (e) {

        console.log(' >>>>>>>>>> OnSelect');

      }).on('show', function (e) {
        $('.datepicker').find('.active').parent().addClass('active');
        if($('.datepicker .day.active')){
          $('.datepicker .day.active').parent().find('.day').addClass('active');
        }

        //verifica se essa semana (atual) já está utilizada e desativa o botão "HOJE"
        if(semanasJaCadastradas.indexOf('<?= date('d/m/Y'); ?>') > -1) {
          $('.datepicker th.today').click(function(){
            alert('A semana atual já está cadastrada.');
            return false;
          });
        }


      })

      var date = $('.input-group.date.week').datepicker("getDate");

      if(date != 'Invalid Date')
        GetDateDisplay(date);

    })

  function GetDateDisplay(date){


    startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay()+1);
    endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 7);

    $('.input-group.date.week').datepicker('update', startDate);
    $('.input-group.date.week input').val(forceZeros(startDate.getDate(), 2) + '/' + forceZeros(startDate.getMonth() + 1, 2) + '/' + forceZeros(startDate.getFullYear(), 4) + ' até ' + forceZeros(endDate.getDate(), 2) + '/' + forceZeros(endDate.getMonth() + 1, 2) + '/' + forceZeros(endDate.getFullYear(), 4));
  }

    $('.input-group.date.week input').attr('readonly', 'true').keydown(function(){ return false; });



  $('.form_semana').submit(function(){

    var date = $('.input-group.date.week').datepicker("getDate");
    if(date == 'Invalid Date'){

      alert('Você precisa especificar qual a semana a qual deseja controlar.');
      $('.input-group.date.week').datepicker('show');

      var deslocamento = $('.input-group.date.week').offset().top - 200;
      $('html, body').animate({ scrollTop: deslocamento }, 'slow');


      return false;
    }

  });

</script>

<style type="text/css">
    .datepicker  table tbody tr:hover {
        background-color: #eee;
    }
    .datepicker  table tbody tr.active {
        background-color: #3276b1;
    }
    .datepicker  table tbody tr.active td {
      border-radius: 0 !important;
    }
</style>