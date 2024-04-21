<?php
namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\User;

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

        global $router;

        $errors = [];

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $motdepasse = filter_input(INPUT_POST, 'motdepasse');	
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);	
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $adresse = filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_SPECIAL_CHARS);	
        $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_SPECIAL_CHARS);	
        $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);	
        $codepostal = filter_input(INPUT_POST, 'codepostal', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$email || !$motdepasse || !$prenom || !$nom || !$adresse || !$ville)  {
            $errors[] = 'Tous les champs sont obligatoires';
        }
    
        // ici, on veut empêcher la fonction de continuer normalement si une erreur a eu lieu, 
        // c'est à dire si le tableau $errors n'est pas vide
        if (count($errors) > 0) {
            // on affiche les erreurs rencontrées
           $this->show('user/addUser',
        [
            'errors' => $errors,
        ]);
        }

        $newUser = new User;
        $newUser->setEmail($email);
        $newUser->setMotdePasse($motdepasse);
        $newUser->setPrenom($prenom);
        $newUser->setNom($nom);
        $newUser->setAdresse($adresse);
        $newUser->setVille($ville);
        $newUser->setNumero($numero);
        $newUser->setCodepostal($codepostal);

        // on sauvegarde le model
        $newUser->create();
        
        header('Location: ' . $router->generate('main-home'));
        exit();
    }
    // if(!empty($email)){
    //     $newUser = new User;
    //     $newUser->setEmail($email);
    //     $newUser->create();
    // }
}