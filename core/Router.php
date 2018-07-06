<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 13:25
 */

namespace Core;

class Router
{

    /**
     * Allow parsing url
     * @param $url
     * @return Array of parameters
     */
    static function parse($url, $request) {
        $url = trim($url, '/');
        $params = explode('/', $url);
        $request->controller = $params[0];
        $request->action = isset($params[1]) ? $params[1] : 'index';
        $request->params = array_slice($params, 2);

        return true;
    }
}