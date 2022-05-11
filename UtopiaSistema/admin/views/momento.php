<link rel="stylesheet" href="./assets/css/momento.css?<?php print(time());?>">

<div class="momento">
    <form id="formMomento">
        <input type="text" name="nombre" placeholder="Nombre del momento">
        <input type="color" name="color">
        <input type="submit" value="crear">
    </form>
    <div id="mostrarMomentos" class="mostarMomentos"></div>
    <div id="mensaje" class="mensaje"></div>
</div>


<script src="./assets/js/momento.js?<?php print(time());?>" type="module"></script>