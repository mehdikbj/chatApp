<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 15:15
 */

namespace Model;

use Core\Model;

class Message extends Model
{
    public $tableName = 'messages';

    public function createMessage($username, $message){
        $createdAt = date('Y-m-d H:i:s');
        $sql = "INSERT INTO ".$this->tableName. "(`user`, `message`, `createdAt`) VALUES ('".$username."', '".$message."','".$createdAt."') " ;

        $prep = $this->db->prepare($sql);
        $prep->execute();

    }

}