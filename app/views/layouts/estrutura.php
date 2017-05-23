<DOCTYPE html></DOCTYPE>
<html>

    <head>
        <title>my&lt;style&gt;.com</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>includes/css/stylemenu.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>includes/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>includes/css/elem-estilos-style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>includes/css/header-footer-style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>includes/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>includes/css/magnific-popup.css" type="text/css">
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/jquery-2.2.0.min.js"> </script>
        <script src="<?php echo base_url(); ?>includes/js/jscolor.js"> </script>
        <script src="<?php echo base_url(); ?>includes/js/jquery.magnific-popup.min.js"> </script>
        <script src="<?php echo base_url(); ?>includes/js/index.js"> </script>
    </head>

    <body>
        <header>
            <?php 
                $this->load->view('layouts/menu');                
            ?>
            
        </header>
        
        <content>
            <?php 
                $this->load->view($estrutura_content);                
            ?>
            
        </content>
        
    </body>

</html>        