<?php
/**
 *      [Haidao] (C)2013-2099 Dmibox Science and technology co., LTD.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      http://www.haidao.la
 *      tel:400-600-2042
 */
define('IN_APP', true);
defined('APP_ROOT') 	OR 		define('APP_ROOT', str_replace("\\","/",substr(dirname(__FILE__), 0, -6)));
defined('LIB_PATH') 	OR 		define('LIB_PATH',  APP_PATH.'library/');
defined('CORE_PATH') 	OR 		define('CORE_PATH',  APP_PATH.'core/');
defined('CONF_PATH')    OR 		define('CONF_PATH',  DOC_ROOT.'config/');
defined('CACHE_PATH') 	OR 		define('CACHE_PATH',  DOC_ROOT.'caches/');
defined('TPL_PATH') 	OR 		define('TPL_PATH',  DOC_ROOT.'template/');
defined('LANG_PATH') 	OR 		define('LANG_PATH',  APP_PATH.'language/');

defined('APP_DEBUG') 	OR 		define('APP_DEBUG', false);
/* Èë¿ÚÎÄ¼þ */
defined('__APP__') 	    OR 		define('__APP__', $_SERVER['SCRIPT_NAME']);
/* °²×°Ä¿Â¼ */
define('__ROOT__', str_replace(basename(__APP__), "", __APP__));
/* ²å¼þÄ¿Â¼ */
defined('PLUGIN_PATH') 	OR 		define('PLUGIN_PATH',  APP_PATH.'plugin/');

define('IS_CGI',(0 === strpos(PHP_SAPI,'cgi') || false !== strpos(PHP_SAPI,'fcgi')) ? 1 : 0 );
define('IS_WIN',strstr(PHP_OS, 'WIN') ? 1 : 0 );
define('IS_CLI',PHP_SAPI=='cli'? 1   :   0);
define('EXT', '.class.php');
define('FOOD_PATH','./system/plugin/food/template/static/');
define('FOOD_PATH_HTML','./system/plugin/food/template/admin/');
define('UPLOAD_PATH','./system/library/');
define('DISPLAY_PATH', PLUGIN_PATH.'food/template/');
require CORE_PATH.'hd_core'.EXT;
// require CORE_PATH.'hd_load'.EXT;
require APP_PATH.'function/function.php';

set_exception_handler(array('C', 'handleException'));
set_error_handler(array('C', 'handleError'));
register_shutdown_function(array('C', 'handleShutdown'));

if(function_exists('spl_autoload_register')) {
	spl_autoload_register(array('C', 'autoload'));
} else {
	function __autoload($class) {
		return C::autoload($class);
	}
}
C::run();
<<<<<<< HEAD

<<<<<<< HEAD
// function clear_html($array)
//  {
//         if (!is_array($array))
//             return trim(htmlspecialchars($array, ENT_QUOTES));
//         foreach ($array as $key => $value) {
//             if (is_array($value)) {
//                 clear_html($value);
//             } else {
//                 $array[$key] = trim(htmlspecialchars($value, ENT_QUOTES));
=======
function clear_html($array)
 {
        if (!is_array($array))
            return trim(htmlspecialchars($array, ENT_QUOTES));
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                clear_html($value);
            } else {
                $array[$key] = trim(htmlspecialchars($value, ENT_QUOTES));
            }
<<<<<<< HEAD
            exit();
    }
function display($a)
{
    // echo PLUGIN_PATH.'food/template/'.$_GET['p'].'/'.$a.'.php';
    // die;
    include_once PLUGIN_PATH.'food/template/'.$_GET['p'].'/'.$a.'.php';
}
=======
        }
        return $array;
 }
function dexit($data = '')
{
        if (is_array($data)) {
            echo json_encode($data);
        } else {
            echo $data;
        }
        exit();
}
// function display($a)
// {

//     include_once(DISPLAY_PATH.$_GET['p'].'/'.$a.'.php');
// }
// function assign($field, $value = '')
//     {
//         $arrays=[];
//         if (!empty($value)) {
//            $arrays[$field] = $value;
//            $arrays[$field];
//         }
//         else if (is_array($field)) {
//             foreach ($field as $key => $value) {
//                 $arrays[$key] = $value;
>>>>>>> 33cfcde23658f26aba012924b670c67bb41faa24
//             }
//         }
//         return $array;
//  }
// function dexit($data = '')
// {
//         if (is_array($data)) {
//             echo json_encode($data);
//         } else {
//             echo $data;
//         }
<<<<<<< HEAD
//         exit();
// }
=======
//     }
>>>>>>> fee989f491f109977d0fb697e66478a9685b81b9
>>>>>>> 33cfcde23658f26aba012924b670c67bb41faa24
=======
>>>>>>> 3647bb02e1d51d00de340ea8bcd1782af1c7242a
