<?php 

namespace App\Controllers;

use App\Models\Services;
use App\Models\Vehicules;

class CoreController
{
    protected $router;

    // constructeur, méthode appelée automatiquement dès que l'un des contrôleurs est instancié par AltoDispatcher
    public function __construct($router)
    {
        $this->router = $router;
    }

    protected function show(string $templateName, $dataForView = [])
    {
        
        $baseUrl = $_SERVER['BASE_URI'];
        $imageUrl = $_SERVER['BASE_URI'] . '/';

        $allVehicules = Vehicules::allVehicules();
        $bestVehicules = Vehicules::bestVehicules();
        $allPriceFilterVehicules = Vehicules::categoryfilterprice();
        $allVehicules = [];

        $allService = Services::allServices();
        $allService = [];

        $allEmplois = Emplois::allEmplois();
        $allEmplois = [];

        $allEmplois = Services::allServices();
        $allMarche = [];

        $allEmplois = Services::allServices();
        $allTravailavecnous = [];
        $allImmobilier = [];

        extract($dataForView);

        $router = $this->router;

        require __DIR__ . '/../views/includes/_header.tpl.php';
        require __DIR__ . "/../views/{$templateName}.tpl.php";
        require __DIR__ . '/../views/includes/_footer.tpl.php';
    }
}