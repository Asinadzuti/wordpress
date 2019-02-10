<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'woocomerce');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?}JJDv-.v}?G)H|g3f&+SX>e#f}[FR;*qm)hlkR|Cx$^S~(}nn2k+ftcY&ii!w=+');
define('SECURE_AUTH_KEY',  'p;!DfKF$F$y`Do}KZ.+hfUzw,X@),sb|$~A<ohde0S,NLiz?eY@_@;,bHnLupU,}');
define('LOGGED_IN_KEY',    'JQ8*m5aeZf`TA^Z8AV^-a~^H:#~%BZPu0#2f2M]Uh)]b#20Sb*Iqy2z;x~NlIG32');
define('NONCE_KEY',        '1^`9Bl=_G!J|8KzOa7Tc(<|wQT5{dLX~h5,5oxVN65}?RyU<g(~kyO8mNC(24tx`');
define('AUTH_SALT',        ';(ExNz=Bv#l.oqW0?rT98.`f1bzKk/2SqH;9<se_F+ -lyBF.f@0[]c1>?0a5l>a');
define('SECURE_AUTH_SALT', '{vMa]#$`#R99yax/cka0`X>u]P&!,I7TRCGar(~BS;uV,HZJ]L#~p%7Yy;.mOrP5');
define('LOGGED_IN_SALT',   'WN-5 {=J.&bTQl?:zFFOonizPh>d+bfu^u0l(31j=,t!`[Z?:rJqS@&5SQhE8]~5');
define('NONCE_SALT',       '~V!%%L8qZyh&>&!*M3~^jLVms2<j9^<pq?_;tHf@[q^h,8AS<IXaACVD0fY7yd@E');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
// 00ATFqh3DVPB