<?php
namespace App\Models;

use App\Utils\Database;
use PDO;

class Travailavecnous extends CoreModel {

    private $name;

    public static function allTravailavecnous(){
        $pdo = Database::getPDO();

        $sqlQuery = "SELECT `name` FROM `Travailavecnous-list` ORDER BY `name`";

        $pdoStatement = $pdo->query($sqlQuery);

        $allTravailavecnous = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $allTravailavecnous; 
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