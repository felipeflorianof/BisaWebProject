<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Input extends DataLayer
{
    public function __construct()
    {
        parent::__construct("entrada", ["descricao","data_hora_entrada"], "id_entrada", false);
    }
    
    public function InputTypes()
    {
        if (!empty($this->id_tipo_entrada)) {
            return (new InputType())->find("id_tipo_entrada = :uid", "uid={$this->id_tipo_entrada}")->fetch(true);
        } else {
            return new InputType();
        }
    }
}