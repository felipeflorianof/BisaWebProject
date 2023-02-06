<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\Input;

try {
    $input = (new Input())->findById(5);

    if ($input) {
        $input->destroy();
        echo "Deletado com sucesso.";
    } else {
        throw new Exception("Erro, registro não encontrado.");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}