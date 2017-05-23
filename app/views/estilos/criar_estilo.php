<div id="boxNovoEstilo" class="layoutBoxes">
    <h2> Criar Estilo </h2>
    <div class="spacer"> </div>
    
    <div class="camposCriarEstilo">
        <?php $atributos = array('id' => 'f_criar_estilo'); ?>
        <?php echo form_open('estilos/criarEstilo', $atributos); ?>
            <label>Tipo do Estilo:</label>
            <input type="radio" name="rdTipo" value="publico" checked="true"><label>Público</label>
            <input type="radio" name="rdTipo" value="privado"><label>Privado</label><br>
            <label>Descrição do Estilo:</label>
            <input class="txtDescEstilo" type="text" id="descEstilo" name="descEstilo">
            <input type="submit" class="btnCriarEstilo" id="btnCriarEstilo" name="btnCriarEstilo" value="Criar Estilo">
        </form>
    </div>
</div>
