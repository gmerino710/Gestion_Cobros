
<?= form_open('Roles/Register');?>

<?php echo form_error('usuario'); ?>
<P><input placeholder="Usuario" id="usuario"  name="usuario"></P>
    
<P><input placeholder="Nombre"  name="nombre"></P>

<button type="submit">Enviar</button>
    
<?=form_close();?>