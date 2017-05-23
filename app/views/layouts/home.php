<DOCTYPE html></DOCTYPE>
<html>

    <head>
        <title>my&lt;style&gt;.com</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="<?php echo base_url(); ?>includes/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>includes/css/header-footer-style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>includes/css/main-style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>includes/css/magnific-popup.css" type="text/css">
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/jquery-2.2.0.min.js"> </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/jscolor.js"> </script>
        <script src="<?php echo base_url(); ?>includes/js/jquery.magnific-popup.min.js"> </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/index.js"> </script>
    </head>

    <body>
        <header>
            <img src="<?php echo base_url(); ?>includes/img/mystyle.png" />
            <?php $this->load->view('usuarios/login'); ?>
        </header>
        <content>
            <?php $this->load->view('usuarios/cad_usuario'); ?> 
            <?php $this->load->view($main_content); ?> <!-- Carrega o conteúdo da página main declarado no controller -->
        </content>
        
    </body>

</html>
