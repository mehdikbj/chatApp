<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 12:20
 */

define('WEB', dirname(__FILE__));
define('DIR_WEB', dirname(WEB));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', DIR_WEB.DS.'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));

require DIR_WEB.DS.'/vendor/autoload.php';


//require CORE.DS.'Includes.php';

new \Core\Dispatcher();
