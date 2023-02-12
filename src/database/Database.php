<?php
/*
use Illuminate\Database\Capsule\Manager as Capsule;
 
class Database 
{
    public function __construct() 
    {
        $capsule = new Capsule;
        $capsule->addConnection([
             'driver' => "mysql",
             'host' => "localhost",
             'database' => "rent-management",
             'username' => "root",
             'password' => "",
             'prefix' => "",
        ]); 
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
*/

class Database
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=rent-management', 'root', '', array(
            PDO::ATTR_PERSISTENT => true
        ));
    }

    public function connection()
    {
        return $this->db;
    }
}
