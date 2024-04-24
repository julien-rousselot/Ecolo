<?php
namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\User;

class UserController extends CoreController {

    function connexionAction(){
        $this->show('user/connexion');
    }

    function connexionActionPost(){
      //essaie de inscription qui ne fonctionne pas
      //password hash non recupere

        global $router;

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $user = User::findByEmail($email);

        //pour l'email si le mail en post passé ici en parametre est egale a false...
        if($user === false) {
            exit('Utilisateur incorrect');
        }

        if(password_verify($_POST['motdepasse'], $user->getMotdepasse())){
            //on mets en session
            $_SESSION['userid'] = $user->getId();
            $_SESSION['userobject'] = $user;

            header("Location:" . $router->generate('main-home'));
            exit();

        } else {
            dump($_POST['motdepasse']);
            dump($user->getMotdepasse());

            exit('Mot de passe incorrect');
        }


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

        if (!preg_match("/[a-zA-Z]/", $prenom)) {
            $errors[] = "Le prénom ne doit contenir que des lettres alphabétiques.";
        }

        if (!preg_match("/[a-zA-Z]/", $nom)) {
            $errors[] = "Le nom ne doit contenir que des lettres alphabétiques.";
        }

        if (!preg_match("/[a-zA-Z]/", $ville)) {
            $errors[] = "La ville ne doit contenir que des lettres alphabétiques.";
        }

        // dd($email);

       

        //voir erreur duplication
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