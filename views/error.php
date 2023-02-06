<?php $this->layout("_main");?>

<div class="error">
<h2>ooooooooops Erro <?= $error;?>!</h2>
Lorem, ipsum dolor sit amet consectetur adipisicing elit.
</div>

<?php $this->start("sidebar"); ?>

    <a title="voltar ao início" href="<?= url();?>">Voltar</a>

<?php $this->end("sidebar"); ?>
