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
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=rent-management', 'root', '');
    }

    public function connection(): PDO
    {
        return $this->pdo;
    }
}
