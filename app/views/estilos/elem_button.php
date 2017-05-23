<div class="vBorder">
    <div class="vInner">
        <div class="vContent">
            <a href='#' id='buttonView'>Button</a>
        </div>
    </div>
</div>

<div class="boxConfigBoxes">
    <div id="configBoxes">
        <h2> Opções </h2>
        <div class="spacer"> </div>
        <div class="dadosBox1">
            <table>
                <tr>
                    <td id="size">Size</td>
                </tr>
                <tr>
                    <td id="font">Font</td>
                </tr>
                <tr>
                    <td id="border">Border</td>
                </tr>
                <tr>
                    <td id="colors">Colors</td>
                </tr>
                <tr>
                    <td id="shadow-light">Shadow/Light</td>
                </tr>
            </table>  
        </div>                  
    </div>
    <div id="configBoxes">
        <h2 id="titulo2"> Configurações </h2>
        <div class="spacer"> </div>
        <div id="dadosBox2">
            <table id='tabOpColors'>
                <tr><td id='normal-state'>Normal State</td></tr>
                <tr><td id='hover-state'>Hover State</td></tr>
                <tr><td id='pressed-state'>Pressed State</td></tr>
            </table>
            <table id="tabOpSize">
                <!--<tr>
                    <td class="esquerda">Width</td>
                    <td><input type="text" id="size-width"></td>
                </tr>
                <tr>
                    <td class="esquerda">Height</td>
                    <td><input type="text" id="size-heigth"></td>
                </tr>-->
                <tr>
                    <td class="esquerda">Padding top</td>
                    <td><input type="text" id="size-padding-top"></td>
                </tr>
                <tr>
                    <td class="esquerda">Padding right</td>
                    <td><input type="text" id="size-padding-right"></td>
                </tr>
                <tr>
                    <td class="esquerda">Padding bottom</td>
                    <td><input type="text" id="size-padding-bottom"></td>
                </tr>
                <tr>
                    <td class="esquerda">Padding left</td>
                    <td><input type="text" id="size-padding-left"></td>
                </tr>
            </table>

            <table id="tabOpFont">
                <tr>
                    <td class="esquerda">Font size</td>
                    <td><input type="text" id="font-size"></td>
                </tr>
                <tr>
                    <td class="esquerda">Font family</td>
                    <td>
                        <select id="font-family">
                            <option value="Times New Roman">Times New Roman</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Arial">Arial</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Courier New">Courier New</option>
                            <option value="Lucida Console">Lucida Console</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="esquerda">Font style</td>
                    <td><select id="font-style">
                            <option value="normal">Normal</option>
                            <option value="italic">Italic</option>
                        </select></td>
                </tr>
                <tr>
                    <td class="esquerda">Font weigth</td>
                    <td><select id="font-weigth">
                            <option value="normal">Normal</option>
                            <option value="bold">Bold</option>
                        </select></td>
                </tr>
            </table>

            <table id="tabOpBorder">
                <tr>
                    <td class="esquerda">Border radius</td>
                    <td><input type="text" id="border-radius"></td>
                </tr>
                <!--<tr>
                    <td class="esquerda">Radius top</td>
                    <td><input type="text" id="border-radius-top"></td>
                </tr>
                <tr>
                    <td class="esquerda">Radius right</td>
                    <td><input type="text" id="border-radius-right"></td>
                </tr>
                <tr>
                    <td class="esquerda">Radius bottom</td>
                    <td><input type="text" id="border-radius-bottom"></td>
                </tr>
                <tr>
                    <td class="esquerda">Radius left</td>
                    <td><input type="text" id="border-radius-left"></td>
                </tr>-->
                <tr>
                    <td class="esquerda">Border Width</td>
                    <td><input type="text" id="border-width"></td>
                </tr>
                <tr>
                    <td class="esquerda">Border style</td>
                    <td><select id="border-style">
                            <option value="Solid">Solid</option>
                            <option value="Dotted">Dotted</option>
                            <option value="Double">Double</option>
                            <option value="Dashed">Dashed</option>
                            <option value="None">None</option>
                            <option value="Hidden">Hidden</option>
                            <option value="Groove">Groove</option>
                            <option value="Ridge">Ridge</option>
                            <option value="Inset">Inset</option>
                            <option value="Outset">Outset</option>
                            <option value="Initial">Initial</option>
                        </select></td>
                </tr>
            </table>

        </div>
    </div>
    <div id="configBoxes">
        <h2 id="titulo3"> Configurações </h2>
        <div class="spacer"> </div>
        <div id="dadosBox3">
            <table id='tabColorsNormal'>
                <tr>
                    <td class='esquerda'>Text Color</td>
                    <td><input type='button' id='btnTxtColorN' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Border Color</td>
                    <td><input type='button' id='btnBrdColorN' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Top Gradient Color</td>
                    <td><input type='button' id='btnTopColorN' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Bottom Gradient Color</td>
                    <td><input type='button' id='btnBottomColorN' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Text Shadow Color</td>
                    <td><input type='button' id='btnTxtShadowColorN' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
            </table>
            <table id='tabColorsHover'>
                <tr>
                    <td class='esquerda'>Text Color</td>
                    <td><input type='button' id='btnTxtColorH' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Border Color</td>
                    <td><input type='button' id='btnBrdColorH' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Top Gradient Color</td>
                    <td><input type='button' id='btnTopColorH' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Bottom Gradient Color</td>
                    <td><input type='button' id='btnBottomColorH' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Text Shadow Color</td>
                    <td><input type='button' id='btnTxtShadowColorH' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
            </table>
            <table id='tabColorsPressed'>
                <tr>
                    <td class='esquerda'>Text Color</td>
                    <td><input type='button' id='btnTxtColorP' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Border Color</td>
                    <td><input type='button' id='btnBrdColorP' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Top Gradient Color</td>
                    <td><input type='button' id='btnTopColorP' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Bottom Gradient Color</td>
                    <td><input type='button' id='btnBottomColorP' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
                <tr>
                    <td class='esquerda'>Text Shadow Color</td>
                    <td><input type='button' id='btnTxtShadowColorP' class="jscolor {onFineChange:'update()'}"></td>
                </tr>
            </table>
        </div>
    </div>

    <div id="btsGerarSalvar">
        <!--Acrescentar o form-->
        <input type="button" id="btnGerarHtml" value="Gerar HTML">
        <input type="button" id="btnGerarCss" value="Gerar CSS">
        <input type="button" id="btnGerarJS" value="Gerar JavaScript">
        <input type="submit" id="btnSalvarElemento" name="btnSalvarElemento" value="Salvar Elemento">
    </div>
</div> 