<?php 
namespace App\Models;

use App\Utils\Database;
use PDO;

class Marche extends CoreModel {

    private $name;

    public static function allMarche(){
        $pdo = Database::getPDO();

        $sqlQuery = "SELECT `name` FROM `Marche-list` ORDER BY `name`";

        $pdoStatement = $pdo->query($sqlQuery);

        $allMarche = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $allMarche; 
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