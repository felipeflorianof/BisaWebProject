<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <a href="create.php">Create</a>
        <a href="#">update</a>
        <a href="#">Delete</a>
    </main>
<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\Input;

$input = new Input();
$list = $input->find()->fetch(true);
?>
<table>
    <thead>
        <tr>
            <th>ID da entrada</th>
            <th>Tipo de entrada</th>
            <th>Descrição</th>
            <th>Data/Hora da entrada</th>
        </tr>
    </thead>
    <tbody>
        <?php 

        // require __DIR__ . "/../vendor/autoload.php";

        // use Source\Models\Input;
        // $input = new Input();
        // $list = $input->find()->fetch(true);

        // foreach ($list as $userItem) {	
        //     print_r($userItem->data());

        //     foreach ($userItem->InputTypes() as $input){
        //         print_r($input->data()); 
        //     }
        // }
        
        foreach ($list as $userItem): ?>
            <tr>
                <td><?= $userItem->id_entrada; ?></td>
                <td>
                    <?php foreach ($userItem->InputTypes() as $input): ?>
                        <?= $input->nome; ?>
                    <?php endforeach; ?>
                </td>
                <td><?= $userItem->descricao; ?></td>
                <td><?= $userItem->data_hora_entrada; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>


    <!-- use CoffeeCode\DataLayer\Connect;

    $conn = Connect::getInstance();
    $error = Connect::getError();

    if($error) {
        echo $error->getMessage();
        die();
    }

    $query = $conn->query("SELECT * FROM entradas");
    print_r($query->fetchAll()); -->