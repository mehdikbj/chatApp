<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 13:48
 */

namespace Controller;

use Core\Controller;

class MessageController extends Controller
{
    public function index()
    {

        if(!isset($_SESSION['user']))
        {
            $this->redirectToPage('user/login');
        }

        $this->loadModal('Message');

        if (isset($_POST["message"]) && $_POST["message"] != "") {
            $this->Message->createMessage($_SESSION['user']->username, $_POST["message"]);
        }

        $messages = $this->Message->findAll();
        $this->set('messages', $messages);

        unset($_POST["message"]);

        $this->render('index');

    }

}