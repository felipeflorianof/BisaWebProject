<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\Input;
use Source\Models\InputType;

$input = new Input();
$input->descricao = "yooo it works!";
$input->data_hora_entrada = date("Y-m-d H:i:s");

$input->save();

print_r($input);
