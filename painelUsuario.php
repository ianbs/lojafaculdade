<?php 
session_start();
require_once('./public_files/fixed/header.php');
require_once('usuariosDAO.php');
$usuario = perfilUsuario($conn, $_SESSION['usuario_id']);

?>
    <div class="container">
        <h2 class="tituloproduto text-center">Painel do Usuário</h2>
        <nav>
            <ul class="nav nav-tabs nav-justified">
                    <li role="presentation">
                        <a href="painelUsuario.php">
                            Dados do Usuário
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="pedidosUsuario.php">
                            Pedidos do Usuário
                        </a>
                    </li>
            </ul>
        </nav>
        <div class="categoria panel panel-body">
            <h3>Dados Pessoais</h3>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">NOME COMPLETO</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_nome']?>" disabled>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">EMAIL</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_email']?>" disabled>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">CPF</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_cpf']?>" disabled>
            </div>
            <h3>Endereço</h3>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">CEP</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_cep']?>" disabled>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">LOGRADOURO</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_rua']?>" disabled>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">NÚMERO</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_numero_casa']?>" disabled>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">COMPLEMENTO</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_complemento']?>" disabled>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">BAIRRO</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_bairro']?>" disabled>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">CIDADE</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_cidade']?>" disabled>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">ESTADO</span>
                <input name="usuario_email" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?=$usuario['usuario_estado']?>" disabled>
            </div>
        </div>
    </div>
<?php 
require_once('./public_files/fixed/footer.php');
?>