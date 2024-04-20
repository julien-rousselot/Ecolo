<?php 

namespace App\Controllers;

class MainController extends CoreController {
    
    public function homeAction(){
        $this->show('main/home');
    }
}