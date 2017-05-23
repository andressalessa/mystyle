$(document).ready(function(){
    
    $('.menuN li > a').click(function(){
        $('.menuN li').removeClass('ativo');
       
        var $parent = $(this).parent();
        if (!$parent.hasClass('ativo')) {
            $parent.addClass('ativo');
        }
    });
    
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
    
    normalState.txtColorN =  new jscolor('btnTxtColorN',options);
    normalState.txtColorN.onFineChange = "update()";
    normalState.txtColorN.fromString('FFFFFF');

    normalState.brdColorN =  new jscolor('btnBrdColorN',options);
    normalState.brdColorN.onFineChange = "update()";
    normalState.brdColorN.fromString('33FFF6');

    normalState.topColorN = new jscolor('btnTopColorN',options);
    normalState.topColorN.onFineChange = "update()";
    normalState.topColorN.fromString('24AB1A');
    
    normalState.bottomColorN = new jscolor('btnBottomColorN',options);
    normalState.bottomColorN.onFineChange = "update()";
    normalState.bottomColorN.fromString('3DF261');
    
    normalState.txtShadowColorN = new jscolor('btnTxtShadowColorN',options);
    normalState.txtShadowColorN.onFineChange = "update()";
    normalState.txtShadowColorN.fromString('FFFFFF');
    
    /*HOVER*/
    hoverState.txtColorH =  new jscolor('btnTxtColorH',options);
    hoverState.txtColorH.onFineChange = "update()";
    hoverState.txtColorH.fromString('FFFFFF');

    hoverState.brdColorH =  new jscolor('btnBrdColorH',options);
    hoverState.brdColorH.onFineChange = "update()";
    hoverState.brdColorH.fromString('33FFF6');

    hoverState.topColorH = new jscolor('btnTopColorH',options);
    hoverState.topColorH.onFineChange = "update()";
    hoverState.topColorH.fromString('24AB1A');
    
    hoverState.bottomColorH = new jscolor('btnBottomColorH',options);
    hoverState.bottomColorH.onFineChange = "update()";
    hoverState.bottomColorH.fromString('3DF261');
    
    hoverState.txtShadowColorH = new jscolor('btnTxtShadowColorH',options);
    hoverState.txtShadowColorH.onFineChange = "update()";
    hoverState.txtShadowColorH.fromString('FFFFFF');
    
    /*PRESSED*/
    pressedState.txtColorP =  new jscolor('btnTxtColorP',options);
    pressedState.txtColorP.onFineChange = "update()";
    pressedState.txtColorP.fromString('FFFFFF');

    pressedState.brdColorP =  new jscolor('btnBrdColorP',options);
    pressedState.brdColorP.onFineChange = "update()";
    pressedState.brdColorP.fromString('33FFF6');

    pressedState.topColorP = new jscolor('btnTopColorP',options);
    pressedState.topColorP.onFineChange = "update()";
    pressedState.topColorP.fromString('24AB1A');
    
    pressedState.bottomColorP = new jscolor('btnBottomColorP',options);
    pressedState.bottomColorP.onFineChange = "update()";
    pressedState.bottomColorP.fromString('3DF261');
    
    pressedState.txtShadowColorP = new jscolor('btnTxtShadowColorP',options);
    pressedState.txtShadowColorP.onFineChange = "update()";
    pressedState.txtShadowColorP.fromString('FFFFFF');
    
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
    
    /*PREENCHIMENTO/ALTERAÇÃO DE PROPRIEDADES*/
    
    /*SIZE*/
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
    
    /*FONT*/
    $('#font-size').on('input', function(e){
        $('#buttonView').css('font-size', $('#font-size').val());
    });
    
    $('#font-family').change(function(){
        $('#buttonView').css('font-family', $('#font-family').val());
    });
    
    $('#font-style').change(function(){
        $('#buttonView').css('font-style', $('#font-style').val());
    });
    
    $('#font-weigth').change(function(){
        $('#buttonView').css('font-weight', $('#font-weigth').val());
    });
    
    $('#border-radius').on('input', function(e){
        $('#buttonView').css('border-radius', $('#border-radius').val() + 'px');
    });
    
    $('#border-width').on('input', function(e){
        $('#buttonView').css('border-width', $('#border-width').val());
    });
    
    $('#border-style').change(function(){
        $('#buttonView').css('border-style', $('#border-style').val());
    });
    
    /*GERA OS CÓDIGOS HTML, CSS E JS*/
    
    $('#btnSalvarElemento').click(function(){
        geraHTML();
        geraCSS();
        alert(html + '\n' + '***********************' + '\n' + css);
    });
    
    $('#btnGerarHtml').click(function(){
        alert('<a href="#" id="buttonView">Button</a>');
    });
    
    $('#btnGerarCss').click(function(){
        css += '#buttonView{\n'; /*LEMBRAR DE FECHAR AS CHAVES*/
        /*SIZE*/
        css += 'padding-top:' + $('#buttonView').css('padding-top') + ';\n';
        css += 'padding-right:' + $('#buttonView').css('padding-right') + ';\n';
        css += 'padding-bottom:' + $('#buttonView').css('padding-bottom') + ';\n';
        css += 'padding-left:' + $('#buttonView').css('padding-left') + ';\n';
        /*FONT*/
        css += 'font-size:' + $('#buttonView').css('font-size') + ';\n';
        css += 'font-family:' + $('#buttonView').css('font-family') + ';\n';
        css += 'font-style:' + $('#buttonView').css('font-style') + ';\n';
        css += 'font-weigth:' + $('#buttonView').css('font-weigth') + ';\n';
        
        /*BORDER*/
        css += 'border-radius:' + $('#buttonView').css('border-radius') + ';\n';
        css += 'border-width:' + $('#buttonView').css('border-width') + ';\n';
        css += 'border-style:' + $('#buttonView').css('border-style') + ';\n';
        
        /*CORES NORMAL STATE*/
        css += 'color:' + normalState.txtColorN.toHEXString() + ';\n';
        css += 'border-color:' + normalState.brdColorN.toHEXString() + ';\n';
        css += 'background-image:' + '-moz-linear-gradient(top,' + normalState.topColorN.toHEXString() + ',' + normalState.bottomColorN.toHEXString() + ')' + ';\n';
        css += 'text-shadow:' + normalState.txtShadowColorN.toHEXString() + ';\n';
        css += '}\n';
        
        /*CORES HOVER STATE*/
        css += '#buttonView:hover{'
        css += 'color:' + hoverState.txtColorH.toHEXString() + ';\n';
        css += 'border-color:' + hoverState.brdColorH.toHEXString() + ';\n';
        css += 'background-image:' + '-moz-linear-gradient(top,' + hoverState.topColorH.toHEXString() + ',' + hoverState.bottomColorH.toHEXString() + ')' + ';\n';
        css += 'text-shadow:' + hoverState.txtShadowColorH.toHEXString() + ';\n';
        css += '}\n';
        
        /*CORES PRESSED STATE*/
        css += '#buttonView:active{'
        css += 'color:' + pressedState.txtColorP.toHEXString() + ';\n';
        css += 'border-color:' + pressedState.brdColorP.toHEXString() + ';\n';
        css += 'background-image:' + '-moz-linear-gradient(top,' + pressedState.topColorP.toHEXString() + ',' + pressedState.bottomColorP.toHEXString() + ')' + ';\n';
        css += 'text-shadow:' + pressedState.txtShadowColorP.toHEXString() + ';\n';
        css += '}';
        
        alert(css);
    });
    
});

var css = '';
var html = '';

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
var hoverState = {};
var pressedState = {};

var estado = 'inicial';
var criarNovo = true;
var elementosCores = false;

/*ESSA FUNÇÃO ALTERA A COR DO ELEMENTO A SER CONFIGURADO*/
function update(){
    /*NORMAL STATE*/
    $('#buttonView').css('color', normalState.txtColorN.toHEXString());
    $('#buttonView').css('border-color',normalState.brdColorN.toHEXString());
    $('#buttonView').css('background-image','-moz-linear-gradient(top,' + normalState.topColorN.toHEXString() + ',' + normalState.bottomColorN.toHEXString() + ')');
    $('#buttonView').css('text-shadow',normalState.txtShadowColorN.toHEXString());

    $('#buttonView').on('mouseleave', function(){
        $('#buttonView').css('color', normalState.txtColorN.toHEXString());
        $('#buttonView').css('border-color',normalState.brdColorN.toHEXString());
        $('#buttonView').css('background-image','-moz-linear-gradient(top,' + normalState.topColorN.toHEXString() + ',' + normalState.bottomColorN.toHEXString() + ')');
        $('#buttonView').css('text-shadow',normalState.txtShadowColorN.toHEXString());
    });
    
    /*HOVER STATE*/
    $('#buttonView').on('mouseover', function(){
        $('#buttonView').css('color',hoverState.txtColorH.toHEXString());
    });

    $('#buttonView').on('mouseover', function(){
        $('#buttonView').css('border-color',hoverState.brdColorH.toHEXString());
    });

    $('#buttonView').on('mouseover', function(){
        $('#buttonView').css('background-image','-moz-linear-gradient(top,' + hoverState.topColorH.toHEXString() + ',' + hoverState.bottomColorH.toHEXString() + ')');
    });

    $('#buttonView').on('mouseover', function(){
        $('#buttonView').css('text-shadow',hoverState.txtShadowColorH.toHEXString());
    });
    
    /*PRESSED STATE*/
    $('#buttonView').click(function(){
        $('#buttonView').css('color',pressedState.txtColorP.toHEXString());
    });

    $('#buttonView').click(function(){
        $('#buttonView').css('border-color',pressedState.brdColorP.toHEXString());
    });

    $('#buttonView').click(function(){
        $('#buttonView').css('background-image','-moz-linear-gradient(top,' + pressedState.topColorP.toHEXString() + ',' + pressedState.bottomColorP.toHEXString() + ')');
    });

    $('#buttonView').click(function(){
        $('#buttonView').css('text-shadow',pressedState.txtShadowColorP.toHEXString());
    });
    
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

function geraHTML(){
    html = '<a href="#" id="buttonView">Button</a>';
}

function geraCSS(){
    css += '#buttonView{\n'; /*LEMBRAR DE FECHAR AS CHAVES*/
    /*SIZE*/
    css += 'padding-top:' + $('#buttonView').css('padding-top') + ';\n';
    css += 'padding-right:' + $('#buttonView').css('padding-right') + ';\n';
    css += 'padding-bottom:' + $('#buttonView').css('padding-bottom') + ';\n';
    css += 'padding-left:' + $('#buttonView').css('padding-left') + ';\n';
    /*FONT*/
    css += 'font-size:' + $('#buttonView').css('font-size') + ';\n';
    css += 'font-family:' + $('#buttonView').css('font-family') + ';\n';
    css += 'font-style:' + $('#buttonView').css('font-style') + ';\n';
    css += 'font-weigth:' + $('#buttonView').css('font-weigth') + ';\n';

    /*BORDER*/
    css += 'border-radius:' + $('#buttonView').css('border-radius') + ';\n';
    css += 'border-width:' + $('#buttonView').css('border-width') + ';\n';
    css += 'border-style:' + $('#buttonView').css('border-style') + ';\n';

    /*CORES NORMAL STATE*/
    css += 'color:' + normalState.txtColorN.toHEXString() + ';\n';
    css += 'border-color:' + normalState.brdColorN.toHEXString() + ';\n';
    css += 'background-image:' + '-moz-linear-gradient(top,' + normalState.topColorN.toHEXString() + ',' + normalState.bottomColorN.toHEXString() + ')' + ';\n';
    css += 'text-shadow:' + normalState.txtShadowColorN.toHEXString() + ';\n';
    css += '}\n';

    /*CORES HOVER STATE*/
    css += '#buttonView:hover{'
    css += 'color:' + hoverState.txtColorH.toHEXString() + ';\n';
    css += 'border-color:' + hoverState.brdColorH.toHEXString() + ';\n';
    css += 'background-image:' + '-moz-linear-gradient(top,' + hoverState.topColorH.toHEXString() + ',' + hoverState.bottomColorH.toHEXString() + ')' + ';\n';
    css += 'text-shadow:' + hoverState.txtShadowColorH.toHEXString() + ';\n';
    css += '}\n';

    /*CORES PRESSED STATE*/
    css += '#buttonView:active{'
    css += 'color:' + pressedState.txtColorP.toHEXString() + ';\n';
    css += 'border-color:' + pressedState.brdColorP.toHEXString() + ';\n';
    css += 'background-image:' + '-moz-linear-gradient(top,' + pressedState.topColorP.toHEXString() + ',' + pressedState.bottomColorP.toHEXString() + ')' + ';\n';
    css += 'text-shadow:' + pressedState.txtShadowColorP.toHEXString() + ';\n';
    css += '}';
}

function geraJS(){
    
}
