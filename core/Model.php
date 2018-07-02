<?php
/**
 * Created by IntelliJ IDEA.
 * User: I.T
 * Date: 30/06/2018
 * Time: 15:14
 */

class Model
{

    static $connections = [];
    public $tableName = false;
    public $db;

    public function __construct()
    {
        $config = Config::$config['database'];
        if (isset(Model::$connections['database'])) {
            $this->db = Model::$connections['database'];
            return true;
        }
        try{
            $pdo = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['username'], $config['password']);
            Model::$connections['database'] = $pdo;
            $this->db = $pdo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function findAll() {
        $sql = 'SELECT * FROM '. $this->tableName;
        $prep = $this->db->prepare($sql);
        $prep->execute();

        return $prep->fetchAll(PDO::FETCH_OBJ);

    }
}