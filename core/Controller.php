<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 13:47
 */

namespace Core;

use Config\Config;
use Model\User;
use Model\Message;


class Controller
{
    public $request;
    private $vars = [];
    private $rendred = false;

    public $isConnected;

    public function __construct($request = null)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        if ($request){
            $this->request = $request;
        }

    }

    public function render($view) {
        if ($this->rendred){ return false; }
        extract($this->vars);
        $view = DIR_WEB.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
        ob_start();
        require $view;
        $content_for_layout = ob_get_clean();
        require DIR_WEB.DS.'view'.DS.'layout'.DS.'default_layout.php';
        $this->rendred = true;
    }

    public function set($key, $value = null) {
        if(is_array($key)){
            $this->vars += $key;
        } else {
            $this->vars[$key] = $value;
        }
    }

    public function loadModal($modalName) {
        $file = DIR_WEB.DS.'model'.DS.$modalName.'.php';
        require_once ($file);
        if (!isset($this->$modalName)) {
            $realName = "\Model\\".$modalName;
            $this->$modalName = new $realName();
        }
    }

    /**
     * allow to call controller from view
     */
    public function controllerFromView($controller, $action){
        $controller .= 'Controller';
        require_once DIR_WEB.DS.'controller'.DS.$controller.'.php';
        $controller = "\Controller\\".$controller;
        $initController = new $controller();
        return $initController->$action();

    }


    public function redirectToPage($page)
    {
        header('Location:'.Config::$config['applicationPath'].$page);

    }

    public function setSession($user){
        if ($user){
            $_SESSION['user'] = $user;
            $this->isConnected = true;
        }
    }

}