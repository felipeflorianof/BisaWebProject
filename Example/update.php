<?php

require __DIR__ . "/../vendor/autoload.php";
use Source\Models\Input;

    try {
        $input = (new Input())->findById(3);
            $input->id_tipo_entrada = null;
            $input->descricao = "test for tomorrow";
            $input->data_hora_entrada = date('Y-m-d H:i:s');
            $input->save();
            echo "Registro Atualizado";
               
    }
    catch(Exception $e) {
        echo $e->getMessage();
    }
    