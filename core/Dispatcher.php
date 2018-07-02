<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 13:07
 */

class Dispatcher
{

    var $request;

    function __construct()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();

        call_user_func_array(array($controller,$this->request->action), $this->request->params);
        $controller->render($this->request->action);
    }

    function loadController(){
        $name = ucfirst($this->request->controller).'Controller';
        $file = DIR_WEB.DS.'controller'.DS.$name.'.php';
        require  $file;
        $controller = new $name($this->request);

        return $controller;
    }
}