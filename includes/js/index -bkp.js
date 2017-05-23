$(document).ready(function(){
    
    setInterval('trocaImagens()', 3000);
    
    $('.open-popup-link').magnificPopup({
        type:'inline',
      midClick: true 
    });
    
    $(".listaDadosMeusEstilos").click(function(){
        $.post("http://localhost/mystyle/estilos/visualizarElementosEstilo", {idEstilo: $(this).data('id')} ).done(function( data ) {
            $(".dadosMeusElementos").html("<table>"+data+"</table>");
        });
    });
    
    $('.elementosBox').click(function(){
        window.location.href = "http://localhost/mystyle/main?elem="+$(this).data('id');
    });
    
    /*Preenche propriedades box1*/
    /*$('#dadosBox1').append('<table></table>');
        var desc_prop_box1 = [];
        desc_prop_box1 = array_prop_box1('Primeiro');

        for(i = 0; i < desc_prop_box1.length; i++){
            $('#dadosBox1').find($('table')).append($("<tr><td class='desc'"+desc_prop_box1[i]+" onclick="+"linkColuna2('"+desc_prop_box1[i]+"')>"+desc_prop_box1[i]+"</td></tr>"));
    };
        
    $('.descSize').click(function(){
        for(i = 0; i < desc_prop_box1.length; i++){
            destruirElemento(desc_prop_box1[i]);
        }
        criarNovo = true;
    });
    
    $('.descColors').click(function(){
        for(i = 0; i < desc_prop_box1.length; i++){
            destruirElemento(desc_prop_box1[i]);
        }
        criarNovo = true;
    });*/
    
    normalState.txtColor =  new jscolor('btnTxtColorN',options);
    normalState.txtColor.onFineChange = "update()";
    normalState.txtColor.fromString('FFFFFF');

    normalState.brdColor =  new jscolor('btnBrdColorN',options);
    normalState.brdColor.onFineChange = "update()";
    normalState.brdColor.fromString('33FFF6');

    normalState.topColor = new jscolor('btnTopColorN',options);
    normalState.topColor.onFineChange = "update()";
    normalState.topColor.fromString('24AB1A');
    
    normalState.bottomColor = new jscolor('btnBottomColorN',options);
    normalState.bottomColor.onFineChange = "update()";
    normalState.bottomColor.fromString('3DF261');
    
    normalState.txtShadowColor = new jscolor('btnTxtShadowColorN',options);
    normalState.txtShadowColor.onFineChange = "update()";
    normalState.txtShadowColor.fromString('FFFFFF');
    
    
    
    update();
    
    /*NAVEGAÇÃO ENTRE CAIXAS DE PROPRIEDADES*/
    $('#size').click(function(){
        $('#tabOpSize').css('display','block');
        $('#tabOpFont').css('display','none');
        $('#tabOpBorder').css('display','none');
        $('#tabOpColorsNormal').css('display','none');
        $('#tabColorsHover').css('display','none');
        $('#tabColorsPressed').css('display','none');
        $('#tabColorsNormal').css('display','none');
        $('#tabColorsHover').css('display','none');
        $('#tabColorsPressed').css('display','none');
        $('#tabOpColors').css('display','none');
    });
    
    $('#font').click(function(){
        $('#tabOpFont').css('display','block');
        $('#tabOpSize').css('display','none');
        $('#tabOpBorder').css('display','none');
        $('#tabOpColorsNormal').css('display','none');
        $('#tabColorsHover').css('display','none');
        $('#tabColorsPressed').css('display','none');
        $('#tabColorsNormal').css('display','none');
        $('#tabColorsHover').css('display','none');
        $('#tabColorsPressed').css('display','none');
        $('#tabOpColors').css('display','none');
    });
    
    $('#border').click(function(){
        $('#tabOpBorder').css('display','block');
        $('#tabOpFont').css('display','none');
        $('#tabOpSize').css('display','none');
        $('#tabOpColorsNormal').css('display','none');
        $('#tabColorsHover').css('display','none');
        $('#tabColorsPressed').css('display','none');
        $('#tabColorsNormal').css('display','none');
        $('#tabColorsHover').css('display','none');
        $('#tabColorsPressed').css('display','none');
        $('#tabOpColors').css('display','none');
    });
    
    $('#colors').click(function(){
        $('#tabOpColors').css('display','block');
        $('#tabOpBorder').css('display','none');
        $('#tabOpFont').css('display','none');
        $('#tabOpSize').css('display','none');
        $('#tabColorsHover').css('display','none');
        $('#tabColorsPressed').css('display','none');
        
    });
    
    $('#normal-state').click(function(){
        $('#tabColorsNormal').css('display','block');
        $('#tabColorsHover').css('display','none');
        $('#tabColorsPressed').css('display','none');
    });
    
    $('#hover-state').click(function(){
        $('#tabColorsHover').css('display','block');
        $('#tabColorsNormal').css('display','none');
        $('#tabColorsPressed').css('display','none');
    });
    
    $('#pressed-state').click(function(){
        $('#tabColorsPressed').css('display','block');
        $('#tabColorsNormal').css('display','none');
        $('#tabColorsHover').css('display','none');
    });
    /*NAVEGAÇÃO ENTRE CAIXAS DE PROPRIEDADES*/
    
    $('#size-padding-top').on('input', function(e){
        $('#buttonView').css('padding-top', $('#size-padding-top').val());
    });
    
    $('#size-padding-right').on('input', function(e){
        $('#buttonView').css('padding-right', $('#size-padding-right').val());
    });
    
    $('#size-padding-bottom').on('input', function(e){
        $('#buttonView').css('padding-bottom', $('#size-padding-bottom').val());
    });
    
    $('#size-padding-left').on('input', function(e){
        $('#buttonView').css('padding-left', $('#size-padding-left').val());
    });
    
    $('#size-padding-left').focusout(function(){
        var css = '';
        css += 'padding-top' + $('#buttonView').css('padding-top');
        css += 'padding-right' + $('#buttonView').css('padding-right');
        css += 'padding-bottom' + $('#buttonView').css('padding-bottom');
        css += 'padding-left' + $('#buttonView').css('padding-left');
        
        alert(css);
    });
    
});



/*ESSA VAR CONFIGURA A CAIXA DE CORES*/
var options = {
				valueElement: null,
				width: 200,
				height: 120,
				sliderSize: 20,
				position: 'top',
				borderColor: '#CCC',
				insetColor: '#CCC',
				backgroundColor: '#202020'
			};

var normalState = {};

var estado = 'inicial';
var criarNovo = true;
var elementosCores = false;

function iniciarCores(button, color){
   /* normalState.txtColor =  new jscolor('btnTxtColor',options);
    normalState.txtColor.onFineChange = "update()";
    normalState.txtColor.fromString('FFFFFF');

    normalState.brdColor =  new jscolor('btnBrdColor',options);
    normalState.brdColor.onFineChange = "update()";
    normalState.brdColor.fromString('33FFF6');

    normalState.topColor = new jscolor('btnTopColor',options);
    normalState.topColor.onFineChange = "update()";
    normalState.topColor.fromString('24AB1A');
    
    normalState.bottomColor = new jscolor('btnBottomColor',options);
    normalState.bottomColor.onFineChange = "update()";
    normalState.bottomColor.fromString('3DF261');
    
    normalState.txtShadowColor = new jscolor('btnTxtShadowColor',options);
    normalState.txtShadowColor.onFineChange = "update()";
    normalState.txtShadowColor.fromString('FFFFFF'); //esse cara tem que vir do banco
    
    update();*/
}


/*ESSA FUNÇÃO ALTERA A COR DO ELEMENTO A SER CONFIGURADO*/
function update(){
    //if(estado == "normal"){
        document.getElementById('buttonView').style.color = normalState.txtColor.toHEXString();
        document.getElementById('buttonView').style.borderColor = normalState.brdColor.toHEXString();
        document.getElementById('buttonView').style.backgroundImage = '-moz-linear-gradient(top,' + normalState.topColor.toHEXString() + ',' + normalState.bottomColor.toHEXString() + ')';
        document.getElementById('buttonView').style.textShadow = normalState.txtShadowColor.toHEXString();    
    /*}else if(estado == "hover"){
        document.getElementById('buttonView').style.color = normalState.txtColor.toHEXString();
        document.getElementById('buttonView').style.borderColor = normalState.brdColor.toHEXString();
        document.getElementById('buttonView').style.backgroundImage = '-moz-linear-gradient(top,' + normalState.topColor.toHEXString() + ',' + normalState.bottomColor.toHEXString() + ')';
        document.getElementById('buttonView').style.textShadow = normalState.txtShadowColor.toHEXString();         
    }*/
    
};

function mudarEstado(id){
   /* estado = id;
    document.getElementById(id).style.visibility = 'visible';
    document.getElementById('titulo3').innerHTML = document.getElementById(id).innerHTML;
    if(id == 'normal'){
        destruirElemento('#tabCores');
        linkColuna3('normal');
    }else if(id == 'hover'){
        destruirElemento('#tabCores');
        linkColuna3('hover'); 
    }else if(id == 'pressed'){
        destruirElemento('#tabCores');
        linkColuna3('pressed'); 
    }
    */
};

function linkColuna2(opcao){
    /*if((opcao == 'Colors') && (criarNovo == true)){
        $('#dadosBox2').last().append("<table id='tabOpCores'><tr><td id='normal' onclick=" + "mudarEstado('normal')" + ">Normal State</td></tr><tr><td id='hover' onclick=" + "mudarEstado('hover')" + ">Hover State</td></tr><tr><td id='pressed' onclick=" + "mudarEstado('pressed')" + ">Pressed State</td></tr></table>");
        $('#titulo2').text("Colors");
        criarNovo = false;
    }else if((opcao == 'Size') && (criarNovo == true)){
        var desc_prop_size_box1 = [];
        desc_prop_size_box1 = array_prop_box1('Size');

        for(i = 0; i < desc_prop_size_box1.length; i++){
            $('#dadosBox2').last().append("<table><tr><td>"+desc_prop_size_box1[i]+"</td><td>Teste</td></td>");
        }
        
    }else if((opcao == '') && (criarNovo == true)){
        
    }*/
};

function linkColuna3(opcao){
   /* $('#dadosBox3').last().append("<table id='tabCores'>"+
                            "<tr>"+
                                "<td class='esquerda'>Text Color</td>"+
                                "<td><input type='button' id='btnTxtColor' class="+"jscolor {onFineChange:'update()'}"+"></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td class='esquerda'>Border Color</td>"+
                                "<td><input type='button' id='btnBrdColor' class="+"jscolor {onFineChange:'update()'}"+"></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td class='esquerda'>Top Gradient Color</td>"+
                                "<td><input type='button' id='btnTopColor' class="+"jscolor {onFineChange:'update()'}"+"></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td class='esquerda'>Bottom Gradient Color</td>"+
                                "<td><input type='button' id='btnBottomColor' class="+"jscolor {onFineChange:'update()'}"+"></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td class='esquerda'>Text Shadow Color</td>"+
                                "<td><input type='button' id='btnTxtShadowColor' class="+"jscolor {onFineChange:'update()'}"+"></td>"+
                            "</tr>"+
                        "</table>");
    iniciarCores();*/
};

function destruirElemento(elemento){
    $(elemento).remove();
    
}

function trocaImagens(){
    var $active = $('#banner .active');
    var $next = ($('#banner .active').next().length > 0) ? $('#banner .active').next() : $('#banner img:first');
    $active.fadeOut(function(){
        $active.removeClass('active');
        $next.fadeIn().addClass('active');
    });
}



function array_prop_box1(prop){
    
    /*if(prop == 'Primeiro'){
        var desc_prop_box1 = [
            'Size',
            'Font',
            'Border',
            'Colors',
            'Shadow/Light'
        ];
        return desc_prop_box1;
    }
    else if(prop == 'Colors'){
        
    }else if(prop == 'Size'){
        var desc_prop_size_box1 = [
            'Width',
            'Height',
            'Padding top',
            'Padding right',
            'Padding bottom',
            'Padding left'        
        ];
        return desc_prop_size_box1;
    };
    
    
    
    
    
    
    /*var desc_prop_box1 = new array();
    
        /*width: 'whidth',
        height: 'height',
        font_size: 'font-size',
        font_family: 'font-familly',
        font_style: 'font-style',
        font_weigth: 'font-weight',
        border_radius: 'border_radius',
        border_width: 'border_width',
        border_style: 'border_style'
    };*/

}







