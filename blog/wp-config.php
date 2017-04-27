<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'zbraestudio.com.br_driverup_blog');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'polly');

/** Nome do host do MySQL */
define('DB_HOST', 'nbz.net.br');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=/3%dv,QdO($W= QP2^7op.mG^]yoz+(%<e<Dr:%=X=9&y>/z2`_v+}(+=HQ$rE8');
define('SECURE_AUTH_KEY',  'jrix]VWjxP!p]Y4N;e~*[8{cp)`sbVd^&J2Bey4e<i6fq64Mj~i5px<7J+z5.9ko');
define('LOGGED_IN_KEY',    'WPPp^X0,.@WJEtss1lTGp04Z-?b}Z.aiGc^$R)lK3]Y=_F<vZDsOLk)W^xv#RJjN');
define('NONCE_KEY',        'Sp*6oO^9pziHM4c[*?}n&25?cI1^/!sI|4rp_`Ms}+87,xo^w9:S05EC[xGMg3>G');
define('AUTH_SALT',        '.{fm, pv-VIE`OK?NZc#~jg9I4>ev;+;x)~$M-WB<@t_os3Atq)2AfWAmy(=C7S^');
define('SECURE_AUTH_SALT', '2LTULo{3eTnw@y8c]*o!N1Kf^,6Hg@aDaV>YpkrQ 6mM(R02##!,,H>zcqaO=54I');
define('LOGGED_IN_SALT',   'lG(*eOMx{eakC]gkTPusTm7{kAd[l:SIkp1fMm/:h|J,juyM $5{/GCLfQICUto_');
define('NONCE_SALT',       'Zdw,9di6$ono)(K6NEC//m*4`k&WnHYOzS&l A<``9D0Cd#N#^4|jX=os32+`yk/');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
