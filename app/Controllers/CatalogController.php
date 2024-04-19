<?php 

namespace App\Controllers;
use App\Models\Vehicules;

class CatalogController extends CoreController {

    public function categorieVehiculeAction(){

        $allVehicules = Vehicules::allVehicules();
        $bestVehicules = Vehicules::bestVehicules();
        $allPriceFilterVehicules = Vehicules::categoryfilterprice();

        $this->show('catalogue/vehicules',
        [
            'allVehicules'=> $allVehicules,
            'bestVehicules'=> $bestVehicules,
            'allPriceFilterVehicules'=> $allPriceFilterVehicules,
        ]);
    }

    public function filtercategorieVehiculeAction(){

        $this->show('catalogue/vehiculesPrice');
    }

    public function filterBrandAction(){

        $brand = filter_input(INPUT_GET, 'brand', FILTER_SANITIZE_SPECIAL_CHARS);
        
        if(!empty($brand)){
            $allBrand = Vehicules::categoryfilterbrand($brand);
        }
            
        $this->show('catalogue/vehiculesBrand',
            [
                'allBrand' => $allBrand,
            ]
        );
    }
}

