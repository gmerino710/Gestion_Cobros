<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Asignación de Accesos para el perfil <b><?php echo $dato['nombre_perfil'];?></b></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('',array('role'=>"form"));?>
            <div class="box-body">
                <?php
        foreach ($menus as $key => $value) {
          ?>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <?php echo form_checkbox('id_menu[]', $value['id_menu'],$value['tiene'],array('onClick'=>'chequear_sub_menu(\'padre_'.$value['id_menu'].'\')','id'=>'padre_'.$value['id_menu'])); ?>
                                <b><?php echo $value['nombre_menu'];?></b>
                            </label>
                            <div class="sub_menu_<?php echo $value['id_menu'];?>">
                                <?php
              if($value['hijos'])
              {
                foreach ($value['hijos'] as $key_2 => $value_2) {
                  ?>
                                    <div>
                                        <label style="margin-left: 10px;">
                                            <?php echo form_checkbox('id_menu[]', $value_2['id_menu'],$value_2['tiene']); ?>
                                            <?php echo $value_2['nombre_menu'];?>
                                        </label>
                                    </div>
                                    <?php
                }
              }
              ?>
                            </div>
                        </div>
                    </div>
                    <?php
        }
        ?>
            </div>
            <!-- /.box-body -->
            <script>
            function chequear_sub_menu(cheque) {
                if ($('#' + cheque).prop('checked')) {
                    $('.sub_menu_' + $('#' + cheque).val() + ' input[type=checkbox]').prop('checked', true);
                } else {
                    $('.sub_menu_' + $('#' + cheque).val() + ' input[type=checkbox]').prop('checked', false);
                }

                //alert($('#'+cheque).val());
            }
            </script>
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