<?php 

namespace App\Controllers;

use App\Models\Emplois;
use App\Models\Immobilier;
use App\Models\Marche;
use App\Models\Services;
use App\Models\Travailavecnous;
use App\Models\Vehicules;

class CoreController
{

    // constructeur, méthode appelée automatiquement dès que l'un des contrôleurs est instancié par AltoDispatcher
    // public function __construct($router)
    // {
    //     $this->router = $router;
    //     global $match;

    // }

    protected function show(string $templateName, $dataForView = [])
    {
        $baseUrl = $_SERVER['BASE_URI'];
        $imageUrl = $_SERVER['BASE_URI'] . '/';
        
        global $router;

        $allVehicules = Vehicules::allVehicules();
        $bestVehicules = Vehicules::bestVehicules();
        $allPriceFilterVehicules = Vehicules::categoryfilterprice();
        $allService = Services::allServices();
        $allEmploi = Emplois::allEmplois();
        $allTravailavecnous = Travailavecnous::allTravailavecnous();
        $allImmobilier = Immobilier::allImmobilier();
        $allMarche = Marche::allMarche();

        extract($dataForView);
        
        require __DIR__ . '/../views/includes/_header.tpl.php';
        require __DIR__ . "/../views/{$templateName}.tpl.php";
        require __DIR__ . '/../views/includes/_footer.tpl.php';
    }
}