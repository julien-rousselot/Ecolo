<?php 
namespace App\Models;

use App\Utils\Database;
use PDO;

class Immobilier extends CoreModel {

    private $name;

    public static function allImmobilier(){
        $pdo = Database::getPDO();

        $sqlQuery = "SELECT `name` FROM `Immobilier-list` ORDER BY `name`";

        $pdoStatement = $pdo->query($sqlQuery);

        $allImmobilier = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $allImmobilier; 
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