<?
include('../includes/autoload.php');

$login->verify();

$sql  = 'SELECT Data FROM Semanas WHERE Usuario = ' . $login->user_id . ' AND Servico ="' . $_POST['Servico'] . '"';
//die($sql);
if($form->isEdit)
	$sql .= ' AND ID <> ' . $form->reg->ID;

$semanas = $db->LoadObjects($sql);

$dias = array();

foreach($semanas as $semana){

	$data = new girafaDate($semana->Data, ENUM_DATE_FORMAT::YYYY_MM_DD);

	$dias[] = $data->GetDate('d/m/Y');
	$dias[] = date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +1 day'));
	$dias[] = date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +2 day'));
	$dias[] = date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +3 day'));
	$dias[] = date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +4 day'));
	$dias[] = date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +5 day'));
	$dias[] = date('d/m/Y', strtotime($data->GetDate('Y-m-d') . ' +6 day'));

}

echo implode('|', $dias);

?>