<?php 
namespace App\Models;

use App\Utils\Database;
use PDO;

class Categories extends CoreModel {

    private $name;

    public static function allCategories(){
        $pdo = Database::getPDO();

        $sqlQuery = "SELECT * FROM `AllCategories`";

        $pdoStatement = $pdo->query($sqlQuery);

        $allcategories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $allcategories; 
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