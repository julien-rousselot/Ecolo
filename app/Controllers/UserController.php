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
         //verifier true or false
        if (is_string($prenom) === false)  {
            $errors[] = 'le champs prenom doit etre des lettres';
        }
        if (is_string($nom) === false)  {
            $errors[] = 'le champs nom doit etre des lettres';
        }
        if (is_string($ville) === false)  {
            $errors[] = 'le champs ville doit etre des lettres';
        }

        //confirm password

        function verifierMotDePasse($motdepasse) {
            // Vérifier si le mot de passe contient au moins un caractère spécial
            $contientCaractereSpecial = preg_match('/[^a-zA-Z0-9]/', $motdepasse);
        
            // Vérifier si le mot de passe contient au moins une majuscule
            $contientMajuscule = preg_match('/[A-Z]/', $motdepasse);
        
            // Vérifier si le mot de passe contient au moins un chiffre
            $contientChiffre = preg_match('/[0-9]/', $motdepasse);
        
            // Vérifier si le mot de passe respecte les critères
            if ($contientCaractereSpecial && $contientMajuscule && $contientChiffre) {
                return true;
            } else {
                return false;
            }
        }

        if (strlen($motdepasse) < 8 || verifierMotDePasse($motdepasse) === false) {
            $errors[] = 'Le mot de passe doit contenir au moins 1 majuscule, 1 caractere special et 8 lettres';
        }
        if (count($errors) > 0) {
            dump($errors);
            exit();
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

        $newUser->create();
        
        if($newUser->create()){
            header('Location: ' . $router->generate('main-home'));
            exit();
        }
    }
    
    //autre code fonctionnel
    // if(!empty($email)){
    //     $newUser = new User;
    //     $newUser->setEmail($email);
    //     $newUser->create();
    // }
}