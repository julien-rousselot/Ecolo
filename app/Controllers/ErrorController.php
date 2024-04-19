<?php 

namespace App\Controllers;

class ErrorController extends CoreController {

    public function page404Action(){

        // header('HTTP/1.0 404 Not Found');

        $this->show('error/err404');

    }

}