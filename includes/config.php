<?
$version = '1.0.beta';

function set_config($key, $val){
  $GLOBALS[$key] = $val;
}

function get_config($key){
  return $GLOBALS[$key];
}


/* Caminhos */
if(isLocalhost()){

  set_config('SITE_URL'         , 'http://localhost/github/driverup/');
  set_config('SITE_PATH'        , 'D:/github/driverup/');

} else {

  set_config('SITE_URL'         , 'http://driverup.zbraestudio.com.br/');
  set_config('SITE_PATH'        , '/dados/http/zbraestudio.com.br/driverup/');

}

set_config('TITLE',                   '');
set_config('SYSTEM_TITLE',            '[Driver UP]');
set_config('FOOTER_TEXT',            '<strong>Driver UP</strong> v' . $version . ' - &copy; 2017 - Todos os Direitos Reservados.');

set_config('SITE_TITLE',              'Driver UP (Sistema para Motorista Profissional)');
set_config('SITE_DESCRIPTION',        'Sistema para Motorista Profissional');
set_config('SITE_TAGS',               'sistema, motorista, UEBR, 99');

/* Banco de Dados */
if(isLocalhost())
  set_config('DB_HOST'          , 'nbz.net.br');
else
  set_config('DB_HOST'          , 'localhost');

set_config('DB_USER'          , 'root');
set_config('DB_PASS'          , 'polly');
set_config('DB_DB'            , 'zbraestudio.com.br_driverup');




$options_carros = array(
                        'Acura' => 'Acura',
                        'Agrale' => 'Agrale',
                        'Alfa Romeo' => 'Alfa Romeo',
                        'AM Gen' => 'AM Gen',
                        'Asia Motors' => 'Asia Motors',
                        'ASTON MARTIN' => 'ASTON MARTIN',
                        'Audi' => 'Audi',
                        'BMW' => 'BMW',
                        'BRM' => 'BRM',
                        'Buggy' => 'Buggy',
                        'Bugre' => 'Bugre',
                        'Cadillac' => 'Cadillac',
                        'CBT Jipe' => 'CBT Jipe',
                        'CHANA' => 'CHANA',
                        'CHANGAN' => 'CHANGAN',
                        'CHERY' => 'CHERY',
                        'Chrysler' => 'Chrysler',
                        'Citroën' => 'Citroën',
                        'Cross Lander' => 'Cross Lander',
                        'Daewoo' => 'Daewoo',
                        'Daihatsu' => 'Daihatsu',
                        'Dodge' => 'Dodge',
                        'EFFA' => 'EFFA',
                        'Engesa' => 'Engesa',
                        'Envemo' => 'Envemo',
                        'Ferrari' => 'Ferrari',
                        'Fiat' => 'Fiat',
                        'Fibravan' => 'Fibravan',
                        'Ford' => 'Ford',
                        'FOTON' => 'FOTON',
                        'Fyber' => 'Fyber',
                        'GEELY' => 'GEELY',
                        'GM - Chevrolet' => 'GM - Chevrolet',
                        'GREAT WALL' => 'GREAT WALL',
                        'Gurgel' => 'Gurgel',
                        'HAFEI' => 'HAFEI',
                        'Honda' => 'Honda',
                        'Hyundai' => 'Hyundai',
                        'Isuzu' => 'Isuzu',
                        'JAC' => 'JAC',
                        'Jaguar' => 'Jaguar',
                        'Jeep' => 'Jeep',
                        'JINBEI' => 'JINBEI',
                        'JPX' => 'JPX',
                        'Kia Motors' => 'Kia Motors',
                        'Lada' => 'Lada',
                        'LAMBORGHINI' => 'LAMBORGHINI',
                        'Land Rover' => 'Land Rover',
                        'Lexus' => 'Lexus',
                        'LIFAN' => 'LIFAN',
                        'LOBINI' => 'LOBINI',
                        'Lotus' => 'Lotus',
                        'Mahindra' => 'Mahindra',
                        'Maserati' => 'Maserati',
                        'Matra' => 'Matra',
                        'Mazda' => 'Mazda',
                        'Mercedes-Benz' => 'Mercedes-Benz',
                        'Mercury' => 'Mercury',
                        'MG' => 'MG',
                        'MINI' => 'MINI',
                        'Mitsubishi' => 'Mitsubishi',
                        'Miura' => 'Miura',
                        'Nissan' => 'Nissan',
                        'Peugeot' => 'Peugeot',
                        'Plymouth' => 'Plymouth',
                        'Pontiac' => 'Pontiac',
                        'Porsche' => 'Porsche',
                        'RAM' => 'RAM',
                        'RELY' => 'RELY',
                        'Renault' => 'Renault',
                        'Rolls-Royce' => 'Rolls-Royce',
                        'Rover' => 'Rover',
                        'Saab' => 'Saab',
                        'Saturn' => 'Saturn',
                        'Seat' => 'Seat',
                        'SHINERAY' => 'SHINERAY',
                        'smart' => 'smart',
                        'SSANGYONG' => 'SSANGYONG',
                        'Subaru' => 'Subaru',
                        'Suzuki' => 'Suzuki',
                        'TAC' => 'TAC',
                        'Toyota' => 'Toyota',
                        'Troller' => 'Troller',
                        'Volvo' => 'Volvo',
                        'VW - VolksWagen' => 'VW - VolksWagen',
                        'Wake' => 'Wake',
                        'Walk' => 'Walk'

);

$options_ufs = array(
                        'AC'=>'Acre',
                        'AL'=>'Alagoas',
                        'AP'=>'Amapá',
                        'AM'=>'Amazonas',
                        'BA'=>'Bahia',
                        'CE'=>'Ceará',
                        'DF'=>'Distrito Federal',
                        'ES'=>'Espírito Santo',
                        'GO'=>'Goiás',
                        'MA'=>'Maranhão',
                        'MT'=>'Mato Grosso',
                        'MS'=>'Mato Grosso do Sul',
                        'MG'=>'Minas Gerais',
                        'PA'=>'Pará',
                        'PB'=>'Paraíba',
                        'PR'=>'Paraná',
                        'PE'=>'Pernambuco',
                        'PI'=>'Piauí',
                        'RJ'=>'Rio de Janeiro',
                        'RN'=>'Rio Grande do Norte',
                        'RS'=>'Rio Grande do Sul',
                        'RO'=>'Rondônia',
                        'RR'=>'Roraima',
                        'SC'=>'Santa Catarina',
                        'SP'=>'São Paulo',
                        'SE'=>'Sergipe',
                        'TO'=>'Tocantins'
);