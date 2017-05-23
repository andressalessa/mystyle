<img class="imgHome" src="<?php echo base_url(); ?>includes/img/mystyle.png" />
<ul class="menuN"> <!-- Esse é o 1 nivel ou o nivel principal -->
    <li class="ativo"><a href="<?php echo base_url(); ?>main?menu=criar_estilo">Novo Estilo</a></li>
    <li><a href="<?php echo base_url(); ?>main?menu=meus_estilos">Meus Estilos</a></li>
    <li><a href="#">Ranking de Estilos</a></li>
    <li><a href="#"><?php echo $this->session->userdata('nomeUsuario') ?></a>
        <ul class="submenuN-1"> <!-- Esse é o 2 nivel ou o primeiro Drop Down -->
            <li><a href="#">Configurações</a></li>
            <li><div class="divisao"></div></li>
            <li><a href="<?php echo base_url(); ?>usuarios/logout">Sair</a></li>
        </ul>
    </li>

</ul>