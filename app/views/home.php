<?php if($this->session->flashdata('cadastrado')); ?>
    <?php echo $this->session->flashdata('cadastrado'); ?>

<?php echo validation_errors('<p class="text-error">'); ?>

<div class="borderBanner">
    <div id="banner">
        <img src="<?php echo base_url(); ?>includes/img/button.jpg" class="active" />
        <img src="<?php echo base_url(); ?>includes/img/lightbox.jpg" />
        <img src="<?php echo base_url(); ?>includes/img/menu.jpg" />
        <img src="<?php echo base_url(); ?>includes/img/text.jpg" />
    </div>
</div>