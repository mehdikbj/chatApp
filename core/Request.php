<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 13:14
 */

class Request
{
    public $url; // URL called by the user

    function __construct()
    {
        $this->url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    }

}