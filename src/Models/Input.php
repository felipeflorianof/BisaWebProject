<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Input extends DataLayer
{
    public function __construct()
    {
        parent::__construct("entrada", ["id_entrada", "id_tipo_entrada", "descricao","data_hora_entrada"], "id_entrada");
    }
    
    public function InputTypes()
    {
        return (new InputType())->find("id_tipo_entrada = :uid", "uid={$this->id_tipo_entrada}")->fetch(true);
    }
}