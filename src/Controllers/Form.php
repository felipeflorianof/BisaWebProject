<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Input;
use CoffeeCode\Router\Router;

class Form
{
    private $router;
    private $view;

    public function __construct()
    {
        $this->view = new Engine( __DIR__."/../../views", "php" );

        $this->router = new Router("http://localhost/BisaWebProject/");
        $this->view->AddData(["router" => $this->router]);
    }

    public function home()
    {
        $input = new Input();
        $list = $input->find()->fetch(true);

        if(!empty($list)) { 
            $dados = [];
            foreach ($list as $userItem) {	
        
                    $item = get_object_vars($userItem->data());
                    $inputTypes = [];
                    foreach ($userItem->InputTypes() as $input){
                        $inputTypes[] = $input->data(); 
                    }
                    $item["inputTypes"] = $inputTypes;
                    $dados[] = $item;
            }
        
            header("Content-Type: application/json");
            echo json_encode($dados);
        }else {
            echo "Dados não encontrados.";
        }
    }
        
    public function create()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        
        $inputData = filter_var_array($data, FILTER_SANITIZE_STRING);
        if(in_array("", $inputData)) {
            echo "Error creating";
            return;
        }
    
        $numero_da_conta = isset($inputData['numero_da_conta']) ? $inputData['numero_da_conta'] : '';
        $descricao = isset($inputData['descricao']) ? $inputData['descricao'] : '';
        $valor_entrada = isset($inputData['valor_entrada']) ? $inputData['valor_entrada'] : '';
        
        $input = new Input();
        $input->numero_da_conta = rand();
        $input->descricao = $descricao;
        $input->valor_entrada = $valor_entrada;
        $input->data_hora_entrada = date("Y-m-d H:i:s");
        $input->save();
        
        header("Content-Type: application/json");
        echo json_encode($input->data());
    }

    public function update()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        
        $inputData = filter_var_array($data, FILTER_SANITIZE_STRING);
        $id_entrada = filter_var($inputData["id_entrada"], FILTER_VALIDATE_INT);
        
        if (!$id_entrada) {
            echo "id_entrada inválido";
            return;
        }
        
        $input = (new Input)->findById($id_entrada);
        
        if (!$input) {
            echo "Registro não encontrado";
            return;
        }
        
        $input->numero_da_conta = $inputData['numero_da_conta'] ?? $input->numero_da_conta;
        $input->descricao = $inputData['descricao'] ?? $input->descricao;
        $input->valor_entrada = $inputData['valor_entrada'] ?? $input->valor_entrada;
        
        $input->save();
        
        header("Content-Type: application/json");
        echo json_encode($input->data());
    }

    public function delete(array $data): void
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if(empty($data["id_entrada"])) {
            echo "Erro ao deletar";
            return;
        }

        $id_entrada = filter_var($data["id_entrada"], FILTER_VALIDATE_INT);
        if (!$id_entrada) {
            echo "id_entrada inválido";
            return;
        }

        $input = (new Input)->findById($id_entrada);
        if ($input) {
            if (method_exists($input, 'destroy')) {
                $input->destroy();
                echo "Deletado";
            } else {
                echo "Erro: Classe input não possui este método";
            }
        }
    }
}