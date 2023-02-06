<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BisaWeb - Tecnologia</title>

    <link rel="web icon" type="png" href="<?= url("public/img/Bisa.png");?>">
    <link rel="stylesheet" href="<?= url("public/css/_main.css");?>">
</head>
<body>

<nav class="main_nav">
    <?php 

    if($this->section("sidebar")):
        echo $this->section("sidebar");

    else:
    ?>
        <a title="" href="<?= url();?>">Home</a>
        <a title="" href="<?= url("contato");?>">Contato</a>
        <a title="" href="<?= url("error");?>">Teste</a>
    <?php

    endif; 
    ?>
</nav>

<main class="main_content">
    <?= $this->section("content"); ?>
</main>


<footer class="main_footer">
    Developed by <a href="https://github.com/felipeflorianof" target="_blank">felipeflorianof</a>
</footer>


<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>    
<?= $this->section("scripts"); ?>
</body>
</html>