<?

template_getHeader();

$form = new girafaFORM('Carros', 'carro.action.php', 'Carros', 'Marca');

$form->linkNovo = '#';

/* DADOS PESSOAIS */
$box = new girafaFORM_box('Dados Gerias', 'Informe abaixo as informações que correspondem ao carro.');

//Marca
$html  = '<label class="col-sm-2 control-label">Marca</label>';
$html .= '<div class="col-sm-3">';
global $options_carros;
$html .= form_field_list('Marca', $options_carros, @$form->reg->Marca);
$html .= '</div>';
$box->AddContent($html);

//Modelo
$html  = '<label class="col-sm-1 control-label">Modelo</label>';
$html .= '<div class="col-sm-4">' . form_field_string('Modelo', @$form->reg->Modelo, 75) .'</div>';
$box->AddContent($html);

$box->AddContentBreakLine();

//Ano
$html  = '<label class="col-sm-2 control-label">Ano Modelo</label>';
$html .= '<div class="col-sm-2">' . form_field_integer('Ano', @$form->reg->Ano, null, 2008) .'</div>';
$box->AddContent($html);

//Valor FIPE
$html  = '<label class="col-sm-2 control-label">Valor FIPE</label>';
$html .= '<div class="col-sm-2">' . form_field_number('ValorFIPE', @$form->reg->ValorFIPE);
$html .= '<small>Consulte seu carro na <a href="http://veiculos.fipe.org.br/" target="_blank">Tabela FIPE</a></small>';
$html .= '</div>';
$box->AddContent($html);

$box->AddContentBreakLine();
$box->AddContentLine();

//Placa
$html  = '<label class="col-sm-2 control-label">Placa</label>';
$html .= '<div class="col-sm-2">' . form_field_string('Placa', @$form->reg->Placa, 7, null, true, 'AAA9999') .'</div>';
$box->AddContent($html);

//Renavam
$html  = '<label class="col-sm-2 control-label">Renavam</label>';
$html .= '<div class="col-sm-2">' . form_field_string('Renavam', @$form->reg->Renavam, 9, null, true, '999999999') .'</div>';
$box->AddContent($html);


//UF
$html  = '<label class="col-sm-2 control-label">Estado de Registro</label>';
global $options_ufs;
$html .= '<div class="col-sm-2">' . form_field_list('UF', $options_ufs, @$form->reg->UF) .'</div>';
$box->AddContent($html);

if($form->isEdit) {

  if($form->reg->UF == 'SC')
    $detranURL = 'http://consultas.detrannet.sc.gov.br/servicos/consultaveiculo.asp?placa=' . $form->reg->Placa . '&renavam=' . $form->reg->Renavam;

  if(!empty($detranURL)) {

    $box->AddContentBreakLine();

    $html = '<div class="col-sm-offset-2 col-sm-10"><small>Consulte a <a href="' . $detranURL . '" target="_blank">documentação do seu carro</a></small></div>';
    $box->AddContent($html);
  }
}

$box->AddContentBreakLine();
$box->AddContentLine();

//Taxa Depreciação Anual
$html  = '<label class="col-sm-2 control-label">Depreciação (%)</label>';
$html .= '<div class="col-sm-2">' . form_field_number('DepreciacaoAnual', @$form->reg->DepreciacaoAnual, 10) . '</div>';
$box->AddContent($html);

$html = '<div class="col-sm-8"> * A Taxa de Depreciação Anual é o percentual médio de desvalorização do valor do carro a cada ano.<br>Veja nosso manual de <a href="http://wiki.zbraestudio.com.br/index.php/Publico/DriverManager/carro_taxa_depreciacao_anual" target="_blank">como descobrir a Taxa Anual de Depreciação do seu carro</a>.</div>';
$box->AddContent($html);


$form->AddBox($box);


/* Despesas de Uso */
$box = new girafaFORM_box('Despesas de Uso', 'Informe abaixo os custos de uso do carro.', 6);

/* COMBUSTÍVEL */
$box->AddContent('<h5>Combustível</h5>');

//Óleo - Valor
$html  = '<label class="col-sm-2 control-label">Valor (lt)</label>';
$html .= '<div class="col-sm-3">' . form_field_number('CombustivelValor', @$form->reg->CombustivelValor) .'</div>';
$box->AddContent($html);

//Óleo - Vida Útil
$html  = '<label class="col-sm-4 control-label">Rendimento (lt/km)</label>';
$html .= '<div class="col-sm-3">' . form_field_number('CombustivelRendimento', @$form->reg->CombustivelRendimento) .'</div>';
$box->AddContent($html);

$box->AddContentLine();

/* ÓLEO DE FILTRO */
$box->AddContent('<h5>Óleo e Filtro</h5>');

//Óleo - Valor
$html  = '<label class="col-sm-1 control-label">Valor</label>';
$html .= '<div class="col-sm-4">' . form_field_number('OleoValor', @$form->reg->OleoValor) .'</div>';
$box->AddContent($html);

//Óleo - Vida Útil
$html  = '<label class="col-sm-3 control-label">Vida Útil (km)</label>';
$html .= '<div class="col-sm-4">' . form_field_number('OleoVidaUtil', @$form->reg->OleoVidaUtil) .'</div>';
$box->AddContent($html);

/* PASTILHAS DE FREIO */
$box->AddContentLine();
$box->AddContent('<h5>Pastilhas de Freio (jogo)</h5>');

//Óleo - Valor
$html  = '<label class="col-sm-1 control-label">Valor</label>';
$html .= '<div class="col-sm-4">' . form_field_number('PastilhasValor', @$form->reg->PastilhasValor) .'</div>';
$box->AddContent($html);

//Óleo - Vida Útil
$html  = '<label class="col-sm-3 control-label">Vida Útil (km)</label>';
$html .= '<div class="col-sm-4">' . form_field_number('PastilhasVidaUtil', @$form->reg->PastilhasVidaUtil) .'</div>';
$box->AddContent($html);

/* DISCOS DE FREIO */
$box->AddContentLine();
$box->AddContent('<h5>Discos de Freio (jogo)</h5>');

//Óleo - Valor
$html  = '<label class="col-sm-1 control-label">Valor</label>';
$html .= '<div class="col-sm-4">' . form_field_number('DiscosValor', @$form->reg->DiscosValor) .'</div>';
$box->AddContent($html);

//Óleo - Vida Útil
$html  = '<label class="col-sm-3 control-label">Vida Útil (km)</label>';
$html .= '<div class="col-sm-4">' . form_field_number('DiscosVidaUtil', @$form->reg->DiscosVidaUtil) .'</div>';
$box->AddContent($html);


/* PNEUS */
$box->AddContentLine();
$box->AddContent('<h5>Pneus (jogo)</h5>');

//Óleo - Valor
$html  = '<label class="col-sm-1 control-label">Valor</label>';
$html .= '<div class="col-sm-4">' . form_field_number('PneusValor', @$form->reg->PneusValor) .'</div>';
$box->AddContent($html);

//Óleo - Vida Útil
$html  = '<label class="col-sm-3 control-label">Vida Útil (km)</label>';
$html .= '<div class="col-sm-4">' . form_field_number('PneusVidaUtil', @$form->reg->PneusVidaUtil) .'</div>';
$box->AddContent($html);

$form->AddBox($box);


/* Outras Despesas */
$box = new girafaFORM_box('Outras Despesas', null, 6);

//Lavação
$html  = '<label class="col-sm-4 control-label">Lavação (completa)</label>';
$html .= '<div class="col-sm-4">' . form_field_number('LavacaoValor', @$form->reg->LavacaoValor) .'</div>';

$lavacao_frequencia = array(
                        'DIA' => 'Todo dia',
                        'SEM' => '1x por semana',
                        '2XS' => '2x por semana',
                        'MES' => '1x por mês'
);
$html .= '<div class="col-sm-4">' . form_field_list('LavacaoFrequencia', $lavacao_frequencia, @$form->reg->LavacaoFrequencia, 'SEM') .'</div>';
$box->AddContent($html);

//Documentação Anual
$html  = '<label class="col-sm-4 control-label">Documentação (anual)</label>';
$html .= '<div class="col-sm-4">' . form_field_number('DocumentacaoValor', @$form->reg->DocumentacaoValor) .'</div>';
$box->AddContent($html);

$box->AddContentBreakLine();

//Seguro Anual
$html  = '<label class="col-sm-4 control-label">Seguro Completo (anual)</label>';
$html .= '<div class="col-sm-4">' . form_field_number('SeguroValor', @$form->reg->SeguroValor) .'</div>';
$box->AddContent($html);

$form->AddBox($box);

/* Atendimento */
$box = new girafaFORM_box('Serviços', 'Especifiquei quais atendimentos vocês fazer hoje', 6);

$html  = '<label class="col-sm-4 control-label">' . form_field_check('AtendeParticular', @$form->reg->AtendeParticular) . ' Particular</label>';
$box->AddContent($html);

$html  = '<label class="col-sm-4 control-label">' . form_field_check('AtendeUber', @$form->reg->AtendeUber) . ' Uber</label>';
$box->AddContent($html);

$form->AddBox($box);

$form->PrintHTML();

template_getFooter();
?>