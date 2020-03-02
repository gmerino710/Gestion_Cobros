<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Datos de tu cuenta</h3>
            </div>
            <div class="box-body">
                <?php echo img(array('src'=>url_logo($this->usuario['logo']),'class'=>'profile-user-img img-responsive img-circle'));?>
                <h3 class="profile-username text-center"><?php echo $this->usuario['nombre'];?></h3>
                <p class="text-muted text-center">
                    <?php echo ($this->usuario['rol']['nombre_rol']);?>
                </p>
            </div>
        </div>
        <!-- /.box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Cambio de Contraseña y logo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('',array('role'=>"form"));?>
            <div class="box-body">
                <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input name="clave" type="password" class="form-control" id="clave" placeholder="Clave" value="<?php echo set_value('clave',desencriptar($this->usuario['clave']));?>">
                </div>
               <!-- <div class="form-group">
                    <label for="archivo_logo">Subir archivo</label>
                    <input type="file" id="archivo_logo" name="archivo_logo" />
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success" value="Guardar" name="guardar" />
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
            </div>
            <?php
    echo form_close();
    ?>
        </div>
    </div>
</div>