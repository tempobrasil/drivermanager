<?

template_getHeader();

$form = new girafaFORM('Calculadora de Corridas', 'calculadora.php', null, null);

$form->linkNovo = '#';

/* PREVISAO */
$box = new girafaFORM_box('Previsão de Corrida', 'Informe abaixo os parâmetros da sua corrida.', 8);

//Distância
$html  = '<label class="col-lg-3 control-label">Distância (km)</label>';
$html .= '<div class="col-lg-3">';
$html .= form_field_number('KM', @$_GET['KM'], null);
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
$html .= form_field_number('ValorKM', (isset($_GET['ValorKM'])?$_GET['ValorKM']:'1.10'), null, null);
$html .= '</div>';
$box->AddContent($html);

//Tempo
$html  = '<label class="col-lg-6 control-label">Valor por Minuto</label>';
$html .= '<div class="col-lg-6">';
$html .= form_field_number('ValorMIN', (isset($_GET['ValorMIN'])?$_GET['ValorMIN']:'0.20'), null, null);
$html .= '</div>';
$box->AddContent($html);

$form->AddBox($box);

$form->PrintHTML();

template_getFooter();
?>