<?

template_getHeader();

$form = new girafaFORM('Calculadora de Corridas', 'calculadora.php', null, null);

$form->linkNovo = '#';

/* PREVISAO */
$box = new girafaFORM_box('Previsão de Corrida', 'Informe abaixo os parâmetros da sua corrida.', 8);

//Distância
$html  = '<label class="col-lg-3 control-label">Distância (km)</label>';
$html .= '<div class="col-lg-3">';
$html .= form_field_number('KMS', @$_GET['KMS'], null);
$html .= '</div>';
$box->AddContent($html);

//Tempo
$html  = '<label class="col-lg-2 control-label">Tempo</label>';
$html .= '<div class="col-lg-3">';
$html .= form_field_string('TEMPO', @$_GET['TEMPO'], 5, null, true, '99:99');
$html .= '</div>';
$box->AddContent($html);


$html  = '<p class="col-lg-12 ">Recomenda-se como base a valocidade de 50km/h (0,84kms/minuto) dentro de cidades e 80km/h (1,33kms/minuto) em rodovias. Para descobrir o tempo da viagem, divida o número de quilômetros da viagem pelo valor de km/minuto.</span>';
$box->AddContent($html);

$form->AddBox($box);


/* VALORES */
$box = new girafaFORM_box('Valores', null, 4);

//Distância
$html  = '<label class="col-lg-6 control-label">Valor por Quilômetro</label>';
$html .= '<div class="col-lg-6">';
$html .= form_field_number('ValorKMS', (isset($_GET['ValorKMS'])?$_GET['ValorKMS']:'1.10'), null, null);
$html .= '</div>';
$box->AddContent($html);

//Tempo
$html  = '<label class="col-lg-6 control-label">Valor por Minuto</label>';
$html .= '<div class="col-lg-6">';
$html .= form_field_number('ValorMIN', (isset($_GET['ValorMIN'])?$_GET['ValorMIN']:'0.20'), null, null);
$html .= '</div>';
$box->AddContent($html);

$form->AddBox($box);


/* ESTATÍSTICAS */
if(isset($_GET['KMS'])) {

  $kms = $_GET['KMS'];
  $provisoes = 0.00;


  $box = new girafaFORM_box('Custo da Viagem', 'Veja abaixo algumas informações de custos para essa corrida.', 8);

  $html = '<table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Observações</th>
                                    <th>Valor</th>

                                </tr>
                                </thead>
                                <tbody>';


  $combustivel_lts = carro_consumo_combustivel_litros($kms);
  $combustivel_valor = carro_consumo_combustivel_valor($kms);
  $provisoes += $combustivel_valor;
  $html .= '<tr><td>Combustível</td>
                <td> ' . number_format($combustivel_lts, 2, ',', '.') . ' litros</td>
                <td> <span class="label label-danger">R$ ' . number_format($combustivel_valor, 2, ',', '.') . '</span></td>
            </tr>';

  $oleo = carro_consumo_oleo_valor($kms);
  $provisoes += $oleo;
  $html .= '<tr><td>Óleo + Filtro</td>
                <td></td>
                <td><span class="label label-danger">R$ ' . number_format($oleo, 2, ',', '.') . '</span></td>
             </tr>';

  $pneus = carro_consumo_pneus_valor($kms);
  $provisoes += $pneus;
  $html .= '<tr><td>Pneus</td>
                <td>O jogo</td>
                <td><span class="label label-danger">R$ ' . number_format($pneus, 2, ',', '.') . '</span></td>
             </tr>';

  $pastilhas = carro_consumo_pastilhas_valor($kms);
  $provisoes += $pastilhas;
  $html .= '<tr><td>Pastilhas de Freio</td>
                <td>O jogo</td>
                <td><span class="label label-danger">R$ ' . number_format($pastilhas, 2, ',', '.') . '</span></td>
             </tr>';

  $discos = carro_consumo_discos_valor($kms);
  $provisoes += $discos;
  $html .= '<tr><td>Discos de Freio</td>
                <td>O jogo</td>
                <td><span class="label label-danger">R$ ' . number_format($discos, 2, ',', '.') . '</span></td>
             </tr>';

  $valorProvisoes = $provisoes;


  $html .= '
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td><strong>Total dos custos da viagem</strong></td>
                                       <td></td>
                                       <td><span class="label label-info">R$ ' . number_format($valorProvisoes, 2, ',', '.') . '</span></td>
                                    </tr>
                                </tfoot>
                            </table>';


  $box->AddContent($html);

  $form->AddBox($box);


  $box = new girafaFORM_box('Saldo do Dia', '', 4);

  $valorCobrado = ( (floatval($_GET['KMS']) * floatval($_GET['ValorKMS'])) + (floatval(semanas_timeToInt($_GET['TEMPO'])) * floatval($_GET['ValorMIN'])) );
  $valorLucro = floatval($valorCobrado - $valorProvisoes);
  $html = '<div class="alert alert-success" style="font-size: 20px;"><strong>R$ ' . number_format($valorCobrado, 2, ',', '.') . '</strong> - Valor à cobrar</div>';
  $html .= '<div class="alert alert-danger"><strong>R$ ' . number_format($valorProvisoes, 2, ',', '.') . '</strong> - Provisões para o Carro</div>';
  $html .= '<div class="alert alert-info"><strong>R$ ' . number_format($valorLucro, 2, ',', '.') . '</strong> - Lucro do motorista</div>';

  $box->AddContent($html);

  $form->AddBox($box);

}

$form->PrintHTML();

template_getFooter();
?>