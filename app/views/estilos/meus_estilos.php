<div class="boxElemEstilos">
    <div id="boxMeusEstilos" class="layoutBoxes">
        <h2> Meus Estilos </h2>
        <div class="spacer"> </div>
        
        <div class="dadosMeusEstilos">            
            <?php echo $texto ?>
        </div>
    </div>
    <div id="boxMeusElementos" class="layoutBoxes">
        <h2> Meus Elementos </h2>
        <div class="spacer"> </div>
        
        <div class="dadosMeusElementos">
            
                <?php 
                    if($menu == ''){
                        echo $elementos;
                    }
                    
                ?>
        
        </div>
    </div>
</div>