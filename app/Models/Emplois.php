<?php 
namespace App\Models;

use App\Utils\Database;
use PDO;

class Emplois extends CoreModel{

    private $name;

    public static function allEmplois(){
        $pdo = Database::getPDO();

        $sqlQuery = "SELECT `name` FROM `Emplois-list` ORDER BY `name`";

        $pdoStatement = $pdo->query($sqlQuery);

        $allEmplois = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $allEmplois; 
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
  
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


}