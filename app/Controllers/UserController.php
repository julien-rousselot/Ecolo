<?php
namespace App\Controllers;

use App\Controllers\CoreController;

class UserController extends CoreController {

    function connexionAction(){
        $this->show('user/connexion');
    }

    function connexionActionPost(){
        //preparer les donnees
        //reception du post avec filtrage
        //envoyer a la vue ?
    }

    function inscriptionAction(){
        $this->show('user/addUser');
    }

    function inscriptionActionPost(){
        //preparer les donnees
        //envoyer a la vue ?
    }
}