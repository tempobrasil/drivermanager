<?

template_getHeader();

$form = new girafaFORM('Jornadas', 'semanas.action.php', 'Jornadas', 'Data');

/* DADOS PESSOAIS */
$box = new girafaFORM_box('Dados Gerias', 'Informe abaixo as informações que correspondem ao carro.');

//Kms
$html  = '<label class="col-sm-2 control-label">Km rodados</label>';
$html .= '<div class="col-sm-2">';
global $options_carros;
$html .= form_field_number('Kms', @$form->reg->Kms);
$html .= '</div>';
$box->AddContent($html);

//Tempo Online
$html  = '<label class="col-sm-2 control-label">Tempo Online</label>';
$html .= '<div class="col-sm-2">' . form_field_string('Tempo', @jornadas_intToTime($form->reg->Tempo), 5, '00:00', true, '99:99') .'</div>';
$box->AddContent($html);

//Data
$html  = '<label class="col-sm-2 control-label">Data</label>';
$html .= '<div class="col-sm-2">' . form_field_date('Data', @$form->reg->Data, 'NOW') .'</div>';
$box->AddContent($html);

$box->AddContentBreakLine();

//Corridas
$html  = '<label class="col-sm-2 control-label">Corridas</label>';
$html .= '<div class="col-sm-2">' . form_field_integer('Corridas', @$form->reg->Corridas, null, 1) .'</div>';
$box->AddContent($html);

//Ganhos
$html  = '<label class="col-sm-2 control-label">Ganhos (R$)</label>';
$html .= '<div class="col-sm-2">' . form_field_number('Ganhos', @$form->reg->Ganhos) .' * que você receberá do UBER.</div>';
$box->AddContent($html);

$form->AddBox($box);

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
                <td> <span class="label label-success">R$ ' . number_format(decimalFromDB($form->reg->Ganhos), 2, ',', '.') . '</span></td>
            </tr>';

  $combustivel_lts = carro_consumo_combustivel_litros($form->reg->Kms);
  $combustivel_valor = carro_consumo_combustivel_valor($form->reg->Kms);
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
                <td><span class="label label-danger">R$ ' . number_format(carro_consumo_oleo_valor($form->reg->Kms), 2, ',', '.') . '</span></td>
             </tr>';

  $html .= '<tr><td>Pneus</td>
                <td>O jogo</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_consumo_pneus_valor($form->reg->Kms), 2, ',', '.') . '</span></td>
             </tr>';

  $html .= '<tr><td>Pastilhas de Freio</td>
                <td>O jogo</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_consumo_pastilhas_valor($form->reg->Kms), 2, ',', '.') . '</span></td>
             </tr>';

  $html .= '<tr><td>Discos de Freio</td>
                <td>O jogo</td>
                <td><span class="label label-danger">R$ ' . number_format(carro_consumo_discos_valor($form->reg->Kms), 2, ',', '.') . '</span></td>
             </tr>';

  $jornada_saldo = carro_jornada_saldo($form->reg->ID);
  $jornada_provisoes = carro_jornada_provisoes($form->reg->Kms);


  $html .= '
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td><strong>Saldo do Dia</strong></td>
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
            ['Combustível', <?= carro_consumo_combustivel_valor($form->reg->Kms); ?>],
            ['Documentação', <?= carro_media_documentacao_dia(); ?>],
            ['Seguro', <?= carro_media_seguro_dia(); ?>],
            ['Lavação', <?= carro_media_lavacao_dia(); ?>],
            ['Depreciação', <?= carro_media_depreciacao_dia(); ?>],
            ['Óleo', <?= carro_consumo_oleo_valor($form->reg->Kms); ?>],
            ['Pneus', <?= carro_consumo_pneus_valor($form->reg->Kms); ?>],
            ['Pastilhas', <?= carro_consumo_pastilhas_valor($form->reg->Kms); ?>],
            ['Discos', <?= carro_consumo_discos_valor($form->reg->Kms); ?>]
          ],

          type: 'pie'
        }
      });

    });

  </script>

<?
}
  ?>