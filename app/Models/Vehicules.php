<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Vehicules extends CoreModel {

    private $brand;
    private $picture;
    private $title;
    private $price;
    private $rate;
    private $miseenligne;
    private $year;
    private $kilometer;
    private $localisation;
    private $brand_id;

    public static function allVehicules()
    {
        $pdo = Database::getPDO();

        $sqlQuery = "SELECT * FROM `Vehicules-list` ORDER BY `brand`";

        $pdoStatement = $pdo->query($sqlQuery);

        $allvehicules = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $allvehicules; 
    }

    public static function bestVehicules()
    {
        $pdo = Database::getPDO();

        $sqlQuery = "SELECT * FROM `Vehicules-list` ORDER BY `rate` DESC";

        $pdoStatement = $pdo->query($sqlQuery);

        $bestVehicules = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $bestVehicules; 
    }

    public static function categoryfilterprice()
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `Vehicules-list` ORDER BY `price`";

        $pdoStatement = $pdo->query($sql);

        $allPriceFilter = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $allPriceFilter; 
    }

    public static function categoryfilterbrand($brand)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `Vehicules-list` WHERE `brand` =  :brand ";

        $stmt = $pdo->prepare($sql);

        // Liaison du paramètre :email
        $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Récupération des résultats
        $resultats = $stmt->fetchObject(self::class);
        // dd($resultats);
        return $resultats; 
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
  
    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitle(){

        return $this->title;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     */
    public function setRate($rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of miseenligne
     */ 
    public function getMiseenligne()
    {
        return $this->miseenligne;
    }

    /**
     * Set the value of miseenligne
     *
     * @return  self
     */ 
    public function setMiseenligne($miseenligne)
    {
        $this->miseenligne = $miseenligne;

        return $this;
    }

    /**
     * Get the value of year
     */ 
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of kilometer
     */ 
    public function getKilometer()
    {
        return $this->kilometer;
    }

    /**
     * Set the value of kilometer
     *
     * @return  self
     */ 
    public function setKilometer($kilometer)
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    /**
     * Get the value of localisation
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set the value of localisation
     */
    public function setLocalisation($localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }
}