<?php 
require_once('./public_files/fixed/header.php');
?>
<div class="container">
    <div class="formulario">
        <h4 class="tituloForm"><strong>Formulário de Cadastro</strong></h4>
        <form action="cadastrar.php" method="post">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">EMAIL</span>
                <input name="usuario_email" type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">SENHA</span>
                <input name="usuario_senha" type="password" class="form-control" placeholder="Senha" aria-describedby="sizing-addon2">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon3">NOME COMPLETO</span>
                <input name="usuario_nome" type="text" class="form-control" placeholder="Nome completo" aria-describedby="sizing-addon3">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon3">CPF</span>
                <input name="usuario_cpf" type="number" class="form-control" placeholder="CPF" aria-describedby="sizing-addon3">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon3">CEP</span>
                <input name="usuario_cep" type="number" class="form-control" placeholder="CEP" aria-describedby="sizing-addon3">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon3">RUA</span>
                <input name="usuario_rua" type="text" class="form-control" placeholder="Rua, Avenida, Travessa.." aria-describedby="sizing-addon3">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon3">Nº</span>
                <input name="usuario_numero_casa" type="number" class="form-control" placeholder="Número" aria-describedby="sizing-addon3">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon3">COMPLEMENTO</span>
                <input name="usuario_complemento" type="text" class="form-control" placeholder="Algo a mais?" aria-describedby="sizing-addon3">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon3">BAIRRO</span>
                <input name="usuario_bairro" type="text" class="form-control" placeholder="Bairro" aria-describedby="sizing-addon3">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon3">CIDADE</span>
                <input name="usuario_cidade" type="text" class="form-control" placeholder="Cidade" aria-describedby="sizing-addon3">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon3">ESTADO</span>
                <input name="usuario_estado" type="text" class="form-control" placeholder="Estado" aria-describedby="sizing-addon3">
            </div>
            
            <hr>
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
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