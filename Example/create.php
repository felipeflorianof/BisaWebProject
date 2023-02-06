<?php

require __DIR__ . "/../vendor/autoload.php";
use Source\Models\Input;

    try {

        $input = new Input();
        $input->descricao = "Apenas um teste";
        $input->data_hora_entrada = date("Y-m-d H:i:s");
        $input->save();

        header("Content-Type: application/json");
        echo json_encode($input->data());
    }
    catch(Exception $e) {
        echo $e->getMessage();
    }