<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\Input;

$input = new Input();
$input->id_tipo_entrada = 1;
$input->descricao = "Example add by Felipe Floriano";
$input->data_hora_entrada = date("Y-m-d H:i:s");
$input->save();

print_r($input);