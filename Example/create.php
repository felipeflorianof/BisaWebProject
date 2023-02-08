<?php

require __DIR__ . "/../vendor/autoload.php";
use Source\Models\Input;

    try {

        $input = new Input();

        //$input->id_tipo_entrada = 1;
        $input->numero_da_conta = rand();
        $input->valor_entrada = 2300;
        $input->descricao = "only a simple test";
        $input->data_hora_entrada = date("Y-m-d H:i:s");
        $input->save();

        header("Content-Type: application/json");
        echo json_encode($input->data());
        
    }
    catch(Exception $e) {
        echo $e->getMessage();
    }