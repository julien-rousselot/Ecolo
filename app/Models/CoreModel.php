<?php

namespace App\Models;

// Classe mère de tous les Models
// On centralise ici toutes les propriétés et méthodes utiles pour TOUS les Models
//! on met la classe CoreModel en "abstract" (classe abstraite en français)
//! une classe abstraite NE PEUT PAS ÊTRE INSTANCIÉE !
class CoreModel
{
    /**
     * @var int
     */
    protected $id; 

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }
}