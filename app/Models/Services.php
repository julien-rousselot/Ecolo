<?php 
namespace App\Models;

use App\Utils\Database;
use PDO;

class Services extends CoreModel{

    private $name;

    public static function allServices(){
        $pdo = Database::getPDO();

        $sqlQuery = "SELECT `name` FROM `Services-list` ORDER BY `name`";

        $pdoStatement = $pdo->query($sqlQuery);

        $allServices = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $allServices; 
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