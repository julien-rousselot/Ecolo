<?php

namespace App\Models;

use App\Models\CoreModel;
use App\Utils\Database;

class User extends CoreModel{
    
    private $email;	
    private $motdepasse;	
    private  $prenom;	
    private  $nom;
    private $adresse;	
    private $ville;	
    private $numero;	
    private $codepostal;

    //inserer donne en database
    public function create()
    {
        $pdo = Database::getPDO();

        $sql = "
            INSERT INTO User(
               email,
               motdepasse,
               prenom,
               nom,
               adresse,
               ville,
               numero,
               codepostal
            )
            VALUES (
            :email,
            :motdepasse,
            :prenom,
            :nom,
            :adresse,
            :ville,
            :numero,
            :codepostal
            )
        ";

         $stmt = $pdo->prepare($sql);

         $stmt->bindParam(':email', $this->email);
         $stmt->bindParam(':motdepasse', $this->motdepasse);
         $stmt->bindParam(':prenom', $this->prenom);
         $stmt->bindParam(':nom', $this->nom);
         $stmt->bindParam(':adresse', $this->adresse);
         $stmt->bindParam(':ville', $this->ville);
         $stmt->bindParam(':numero', $this->numero);
         $stmt->bindParam(':codepostal', $this->codepostal);

         return $stmt->execute();
    }

   //   $pdo = Database::getPDO();

   //   // Ecriture de la requête INSERT INTO
   //   $sql = "INSERT INTO User(email)
   //           VALUES (:email)";

   //    // Execution de la requête d'insertion (exec, pas query)
   //    $stmt = $pdo->prepare($sql);

   //    $stmt->bindParam(':email', $this->email);

   //    dump($stmt);

   //   return $stmt->execute();
   
        // mettre à jour l'id du model

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of motdePasse
     */ 
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * Set the value of motdePasse
     *
     * @return  self
     */ 
    public function setMotdepasse($motdepasse)
    {
      $this->motdepasse =  password_hash($motdepasse, PASSWORD_DEFAULT);

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of codepostal
     */ 
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set the value of codepostal
     *
     * @return  self
     */ 
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }
}   