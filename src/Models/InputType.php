<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class InputType extends DataLayer
{
    public function __construct()
    {
        parent::__construct("tipo_entrada", ["id_tipo_entrada"], "id_tipo_entrada", false);
    }

    public function add(Input $input, string $nome): InputType
    {
        $this->id_tipo_entrada = $input->id_entrada;

        
        return $this;
    }
}