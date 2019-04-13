<?php 
require_once('./public_files/fixed/header.php');
?>
<div class="container">
    <div class="formulario">
        <h4 class="tituloForm"><strong>Login</strong></h4>
        <form action="loginLoja.php" method="post">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">EMAIL</span>
                <input name="usuario_email" type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon1" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">SENHA</span>
                <input name="usuario_senha" type="password" class="form-control" placeholder="Senha" aria-describedby="sizing-addon2" required>
            </div>
            <hr>
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="btn-group" role="group">
                    <a role="button" class="btn btn-default" href="cadastroUsuario.php">Cadastrar</a>
                </div>
                <div class="btn-group" role="group">
                    <a role="button" class="btn btn-danger" href="index.php">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 
require_once('./public_files/fixed/footer.php');
?>