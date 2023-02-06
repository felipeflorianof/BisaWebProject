<?php $this->layout("_main");?>

<div class="users">
    <?php

    if($inputs): 
        foreach($inputs as $input): 
            ?>
            <article class="teste">
                <h3><?= $input->descricao?></h3>
                <p><?= $input->data_hora_entrada?></p>
            </article>
        <?php
        endforeach;


    else:
        ?>
        <h4>Dados não encontrados</h4>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolor, tempore odio labore dignissimos quisquam laborum laudantium eius accusantium libero ex, ea repudiandae corporis ab ipsam odit non consequatur maxime.
    <?php
    
    endif; ?>
</div>