<?php
function mostraAlerta($tipo) {
    if(isset($_SESSION[$tipo])) { ?>
        <p class="mostraal alert alert-<?= $tipo ?>"><?= $_SESSION[$tipo]?></p>
<?php
        unset($_SESSION[$tipo]);
    }
}
