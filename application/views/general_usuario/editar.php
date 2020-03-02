<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Registro</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('', array('role' => "form")); ?>
            <div class="box-body">
                <?php
foreach ($this->mante_usuario_model->campos as $key => $value) {
    if ($value['nombre'] != $this->mante_usuario_model->id_tabla) {
        switch ($value['tipo']) {
            case 'sino':
                $relacion = array('S' => 'Si',
                    'N'                   => 'No',
                );
                ?>
                    <div class="form-group">
                        <label>
                            <?php echo $value['mostrar']; ?>
                        </label>
                        <select class="form-control" name="<?php echo $value['nombre']; ?>">
                            <?php
foreach ($relacion as $key => $val_rela) {
                    ?>
                                <option <?php echo ($dato[$value['nombre']] == $key) ? 'selected="selected"' : ''; ?> value="<?php echo $key; ?>"><?php echo $val_rela; ?></option>
                                <?php
}
                ?>
                        </select>
                    </div>
                    <?php
break;

            case 'cata_usu':
                $relacion = $this->db->where(array('id_usuario' => $this->usuario['id_usuario']))->get($value['relacion']['tabla'])->result_array();
                ?>
                    <div class="form-group">
                        <label>
                            <?php echo $value['mostrar']; ?>
                        </label>
                        <select class="form-control" name="<?php echo $value['nombre']; ?>">
                            <?php
foreach ($relacion as $val_rela) {
                    ?>
                                <option <?php echo ($dato[$value['nombre']] == $val_rela[$value['relacion']['id_tabla_relacion']]) ? 'selected="selected"' : ''; ?> value="<?php echo $val_rela[$value['relacion']['id_tabla_relacion']]; ?>"><?php echo $val_rela[$value['relacion']['campo_descripcion']]; ?></option>
                                <?php
}
                ?>
                        </select>
                    </div>
                    <?php
break;

            case 'lista':
                $relacion = $this->db->get($value['relacion']['tabla'])->result_array();
                ?>
                    <div class="form-group">
                        <label>
                            <?php echo $value['mostrar']; ?>
                        </label>
                        <select class="form-control" name="<?php echo $value['nombre']; ?>">
                            <?php
foreach ($relacion as $val_rela) {
                    ?>
                                <option <?php echo ($dato[$value['nombre']] == $val_rela[$value['relacion']['id_tabla_relacion']]) ? 'selected="selected"' : ''; ?> value="<?php echo $val_rela[$value['relacion']['id_tabla_relacion']]; ?>"><?php echo $val_rela[$value['relacion']['campo_descripcion']]; ?></option>
                                <?php
}
                ?>
                        </select>
                    </div>
                    <?php
break;

            case 'fecha':
                ?>
                     <div class="form-group">
                            <label for="<?php echo $value['nombre']; ?>">
                                <?php echo $value['mostrar']; ?>
                            </label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right datepicker"  name="<?php echo $value['nombre']; ?>" id="<?php echo $value['nombre']; ?>"  value="<?php echo set_value($value['nombre'], $dato[$value['nombre']]); ?>" />
                            </div>
                        </div>
                    <?php
break;
            case 'hora':
                ?>
                        <div class="form-group">
                            <label><?php echo $value['mostrar']; ?></label>

                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                              <input type="text" class="form-control"  data-inputmask='"mask": "99:99:99"' data-mask="" name="<?php echo $value['nombre']; ?>" id="<?php echo $value['nombre']; ?>" value="<?php echo set_value($value['nombre'], $dato[$value['nombre']]); ?>" />
                            </div>
                            <!-- /.input group -->
                        <?php
break;
            case 'cata_usu':
                $relacion = $this->db->get_where($value['relacion']['tabla'], array('id_usuario' => $this->usuario['id_usuario']))->result_array();
                ?>
                        <div class="form-group">
                            <label><?php echo $value['mostrar']; ?></label>
                                <select class="form-control select2" style="width: 100%;" name="<?php echo $value['nombre']; ?>">
                                  <?php
foreach ($relacion as $val_rela) {
                    ?>
                                        <option <?php echo ($dato[$value['nombre']] == $val_rela[$value['relacion']['id_tabla_relacion']]) ? 'selected="selected"' : ''; ?> value="<?php echo $val_rela[$value['relacion']['id_tabla_relacion']]; ?>"><?php echo $val_rela[$value['relacion']['campo_descripcion']]; ?></option>
                                        <?php
}
                ?>
                                </select>
                        </div>
                        <?php
break;

            default:
                ?>
                        <div class="form-group">
                            <label for="<?php echo $value['nombre']; ?>">
                                <?php echo $value['mostrar']; ?>
                            </label>
                            <input name="<?php echo $value['nombre']; ?>" type="<?php echo $value['tipo']; ?>" class="form-control" id="<?php echo $value['nombre']; ?>" placeholder="<?php echo $value['mostrar']; ?>" value="<?php echo set_value($value['nombre'], $dato[$value['nombre']]); ?>">
                        </div>
                        <?php
}
        ?>
                            <?php
}
}
?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success" value="Guardar" name="guardar" />
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo site_url($this->controlador); ?>" class="btn btn-danger">Cancelar </a>
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
            </div>
            </div>
        <!-- /.box -->
            <?php
echo form_close();
?>

    </div>
</div>