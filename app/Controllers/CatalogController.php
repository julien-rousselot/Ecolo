<?php 

namespace App\Controllers;
use App\Models\Vehicules;

class CatalogController extends CoreController {

    public function categorieVehiculeAction(){

        $this->show('catalogue/vehicules');
    }

    public function filtercategorieVehiculeAction(){

        $this->show('catalogue/vehiculesPrice');
    }

    // public function filterBrandAction(){

    //     $brand = filter_input(INPUT_GET, 'brand', FILTER_SANITIZE_SPECIAL_CHARS);
        
    //     if(!empty($brand)){
    //         $allBrand = Vehicules::categoryfilterbrand($brand);
    //     }
            
    //     $this->show('catalogue/vehiculesBrand',
    //         [
    //             'allBrand' => $allBrand,
    //         ]
    //     );
    // }
}

