<?php  

    require __DIR__ . "/../vendor/autoload.php";

    use Source\Models\Input;

    $input = new Input();
    $list = $input->find()->fetch(true);

    if(!empty($list)) { 
        $dados = [];
        foreach ($list as $userItem) {	
    
                $item = get_object_vars($userItem->data());
                //$item = $userItem->data();
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