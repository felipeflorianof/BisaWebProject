<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\Input;


$input = (new Input())->findById(5);
$input->descricao = "Something";
$input->data_hora_entrada = date('Y-m-d H:i:s');
$input->save();
print_r($input);
