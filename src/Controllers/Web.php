<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Input;

class Web
{

    private $view;

    public function __construct()
    {
        $this->view = new Engine( __DIR__."/../../views", "php" );
    }

        

    public function home(): void
    {
     
        $inputs = (new Input())->find()->fetch(true);
        echo $this->view->render("home", [
            "inputs" => $inputs
        ]);

    }


    public function contact(): void
    {
    
        echo $this->view->render("contact");

    }




    public function error(array $data): void
    {
        
        echo $this->view->render("error", [
            "error" => $data["errcode"],
        ]);
    }
}