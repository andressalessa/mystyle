<div class="camposLogin">
    
    <?php $atributos = array('id' => 'f_login'); ?>
    <?php echo form_open('usuarios/login', $atributos); ?>
    
        <label>E-mail:</label>
        <input type="email" id="emailLogin" name="emailLogin">
        <label>Senha:</label>
        <input type="password" id="senhaLogin" name="senhaLogin">
        <input type="submit" id="btnLogin" name="btnLogin" value="Entrar">
    </form>

</div>

