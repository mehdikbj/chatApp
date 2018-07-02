<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 19:56
 */

class UserController extends Controller
{

    public function login(){

        if (isset($_POST["password"]) &&  isset($_POST["username"])) {
            $username = $_POST["username"];
            $password = sha1($_POST["password"]);

            $this->loadModal('User');
            $user = $this->User->findUserByUserNameAndPassword($username, $password);

            if (!empty($user)) {
                $_SESSION['user'] = $user[0];
                $this->setSession($user[0]);

            }

            if ($this->isUserLogged()){
                $this->redirectToPage('message/index');

            }
        }

        $this->loadModal('User');
        $users = $this->User->findAll();
        $this->set('users', $users);
    }

    public function logout(){
        if (isset($_POST['logout']))
        {
            unset($_SESSION['user']);
            $this->redirectToPage('user/login');
            session_destroy();
        }


    }

    public function register(){

        if (isset($_POST["password"]) &&  isset($_POST["username"]) && $_POST["username"] != "" &&  $_POST["password"] != "") {
            $username = $_POST["username"];
            $password = sha1($_POST["password"]);

            $this->loadModal('User');
            $user = $this->User->findUserByUserNameAndPassword($username, $password);

            if (empty($user)) {
                $this->User->createUser($username, $password);
                $this->redirectToPage('user/login');
            } else {
                $userExiste = '<h1 style="color: red; font: bold; text-align: center;">user already exist</h1>';
                $this->set('userExiste', $userExiste);
            }
        }

    }

    public function isUserLogged(){
        return isset($_SESSION['user']->id);
    }

}