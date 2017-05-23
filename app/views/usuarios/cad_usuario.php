<div class="borderCadastro">
    <h1>Crie uma conta</h1>
    <div class="contentCadastro">
        <?php echo validation_errors('<p class="text-error">'); ?>
        <!--<form action="index.php/usuarios/cadastrarUsuario" method="post" id="f_cad_usuario">-->
        <?php $atributos = array('id' => 'f_cad_usuario'); ?>
        <?php echo form_open('usuarios/cadastrarUsuario', $atributos); ?>
            <label for="nomeCad">Nome completo:</label>
            <input class="inputText" type="text" id="nomeCad" name="nomeCad" required="required">
            <label for="emailCad">E-mail:</label>
            <input class="inputText" type="email" id="emailCad" name="emailCad" required="required">
            <label for="senhaCad">Senha:</label>
            <input class="inputText" type="password" id="senhaCad" name="senhaCad" required="required">
            <input type="submit" class="inputButton" id="btnCadUsuario" name="btnCadUsuario" value="Cadastre-se">
        <!--</form>-->
    </div>
</div>