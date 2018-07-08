<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 13:07
 */

namespace Core;

use Controller\UserController;
use Controller\MessageController;


class Dispatcher
{

    public $request;

    public function __construct()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();

        call_user_func_array(array($controller,$this->request->action), $this->request->params);
        $controller->render($this->request->action);
    }

    public function loadController()
    {
        $name = ucfirst($this->request->controller).'Controller';
        $file = DIR_WEB.DS.'controller'.DS.$name.'.php';
        require  $file;
        //var_dump($file);
        //var_dump("\Controller\\".$name);die;
        $contrName = "\Controller\\".$name;
        $controller = new $contrName($this->request);

        return $controller;
    }
}