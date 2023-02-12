<?php

/*
use Illuminate\Database\Eloquent\Model;

include(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/TenantDetails.php');

class User extends Model {

    protected $table = 'user';

    protected $fillable = ['name', 'phone_number', 'password'];

    public $timestamps = false;

    public function details()
    {
        return $this->hasOne(TenantDetails::class);
    }

    public function rent()
    {
        return $this->hasOne("\Models\Rent");
    }

}
*/

class User {

    public static function queryById(int $id, PDO $db){
        return $db->query("SELECT * FROM user WHERE id = " . $id);
    }
}
