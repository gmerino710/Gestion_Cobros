<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Carga por archivo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('',array('role'=>"form"));?>
            <div class="box-body">
                <div class="form-group">
                    <label for="archivo">Archivo</label>
                    <input type="file" id="archivo" name="archivo" />
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success" value="Subir" name="guardar" />
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
    <!-- /.col -->
</div>
<!-- /.row --> 