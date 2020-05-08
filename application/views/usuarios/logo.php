<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cambio de Logo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('',array('role'=>"form"));?>
            <div class="box-body">
                <div class="form-group">
                    <label for="logo_actual">Logo Actual:</label>
                    <br />
                    <?php echo img(url_logo($dato['logo']));?>
                </div>
                <div class="form-group">
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
                        <a href="<?php echo site_url($this->controlador);?>" class="btn btn-danger">Cancelar </a>
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
            </div>
            <?php
    echo form_close();
    ?>
        </div>
        <!-- /.box -->
    </div>
</div>