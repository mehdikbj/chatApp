<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 19:16
 */

namespace Model;

use Core\Model;


class User extends Model
{
    public $tableName = 'users';

    public function findUserByUserNameAndPassword($username, $password){
        $sql = "SELECT * FROM ". $this->tableName ." WHERE username ='".$username. "' AND password ='".$password."'";

        $prep = $this->db->prepare($sql);
        $prep->execute();

        return $prep->fetchAll(\PDO::FETCH_OBJ);

    }

    public function createUser($username, $password) {
        $connected = 1;
        $sql = "INSERT INTO ".$this->tableName. "(`username`, `password`, `connected`) VALUES ('".$username."', '".$password."','".$connected."') ";

        $prep = $this->db->prepare($sql);
        $prep->execute();
    }

}