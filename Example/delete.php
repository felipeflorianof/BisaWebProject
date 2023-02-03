<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\Input;


$input = (new Input())->findById(1);

if($input){
    $input->destroy();
}else{
    print_r($input);
}

