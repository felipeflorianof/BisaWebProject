<?php $this->layout("_main");?>

<div class="contact">
    <h2>Criar novo registro</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, nemo.</p>

    <form action="<?= url("contact")?>" method="">

        <input type="text" name="ex1" placeholder="Exemplo">
        <input type="text" name="ex2" placeholder="Exemplo">
        <input type="text" name="descricao" placeholder="Descrição">

            <button>Enviar Mensagem!</button>


    </form>
</div>


<?php $this->start("scripts"); ?>
    <script>
        $(function() {
            $("button").after('<button type="reset">Limpar</button>');
        })
    </script>
<?php $this->end("scripts"); ?>