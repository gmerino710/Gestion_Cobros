<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
if (
    $this->controlador == "misusuarios"

) {
    ?>
                <div class="row">
                        <div class="col-xs-12">
                            <p>Recuerde que la URL para sus usuarios es:<b>
                                <?php
echo anchor("empresa/inicio/" . urlencode(encriptar_num($this->usuario['id_usuario'])),
        site_url("empresa/inicio/" . urlencode(encriptar_num($this->usuario['id_usuario']))),
        array(
            //'class'  => 'btn btn-info',
            'target' => '_blank',
        ));
    ?></b>
                            </p>
                        </div>
                </div>
                 <?php
}
?>
                <div class="row">
                    <div class="col-xs-2">
                        <?php
echo anchor($this->controlador . "/nuevo", 'Agregar', array('class' => 'btn btn-block btn-success'));
?>



                    </div>
                    <div class="col-xs-2">
                    <?php
if (puede_eliminar($this->controlador)) {
    echo anchor($this->controlador . "/eliminar_todo", 'Eliminar', array(
        'class'   => 'btn btn-block btn-danger',
        'onclick' => 'if (confirm(\'¿Esta seguro de eliminar todos los registros?\')) {return true;} else {return false; }',
    ));
}

?>
                    </div>

                     <div class="col-xs-2">
                    <?php
//echo anchor($this->controlador . "/exportar_todo", 'Exportar', array('class' => 'btn-block btn-default'));
?>
                    </div>

                    <div class="col-xs-4"></div>
                    <?php
if (
    $this->controlador != "misperfiles" &&
    $this->controlador != "misusuarios" &&
    $this->controlador != "alertasconfig" &&
    $this->controlador != "listas" &&
    $this->controlador != "tiposrelacion" &&
    $this->controlador != "ipspermitidas"

) {
    ?>
                    <div class="col-xs-2 text-center">
                       <a class="btn btn-app" href="<?php echo site_url($this->controlador . '/subir'); ?>">
                        <i class="fa fa-cloud-upload"></i> Subir Archivo
                      </a>
                    </div>
                    <?php
} else {
    ?>
                      <div class="col-xs-2 text-center"></div>
                      <?php
}
?>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-12">
                        <?php
echo form_open('', array('class' => 'search-form'));
?>
                            <div class="input-group">
                                <input type="text" name="buscar" class="form-control" placeholder="Buscar" value="<?php echo set_value('buscar'); ?>" />
                                <div class="input-group-btn">
                                    <button type="submit" name="envio_buscar" class="btn btn-info btn-flat"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.input-group -->
                            <?php echo form_close(); ?>
                    </div>
                </div>
                <br />
                <table id="tabla_datos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <?php
foreach ($this->mante_usuario_model->campos as $key => $value) {
    if ($value['lista']) {
        ?>
                                <th>
                                    <?php echo $value['mostrar']; ?>
                                </th>
                                <?php
}
}
?>
                                    <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
foreach ($lista as $key => $dato) {
    ?>
                            <tr>
                                <?php
foreach ($this->mante_usuario_model->campos as $key => $value) {
        if ($value['lista']) {
            if (!$value['relacion']) {
                ?>
                                    <td>
                                        <?php echo $dato[$value['nombre']]; ?>
                                    </td>
                                    <?php
} else {
                ?>
                                        <td>
<?php
if ($value['tipo'] == 'lista') {
                    echo $this->general_model->obtiene_descripcion($value['relacion']['tabla'],
                        $value['relacion']['id_tabla_relacion'],
                        $dato[$value['nombre']],
                        $value['relacion']['campo_descripcion']
                    );
                } else {
                    echo $this->mante_usuario_model->obtiene_descripcion($value['relacion']['tabla'],
                        $value['relacion']['id_tabla_relacion'],
                        $dato[$value['nombre']],
                        $value['relacion']['campo_descripcion']
                    );
                }
                ?>
                                        </td>
                                        <?php
}
        }
    }
    ?>
                                            <td>
                                                <?php
if ($this->controlador == 'alertasconfig') {
        echo " " . anchor($this->controlador . "/ejecutar_alerta/" . $dato[$this->mante_usuario_model->id_tabla], 'Ejecutar Alerta', array('class' => 'btn btn-info')) . " ";
    }

    if ($this->controlador == 'listas') {
        echo " " . anchor($this->controlador . "/asignar_cliente/" . $dato[$this->mante_usuario_model->id_tabla], 'Agregar registro', array('class' => 'btn btn-warning')) . " ";
    }

    if ($this->controlador == 'misperfiles') {
        echo " " . anchor($this->controlador . "/accesos/" . $dato[$this->mante_usuario_model->id_tabla], 'Asignar Accesos', array('class' => 'btn btn-warning')) . " ";
        echo " " . anchor($this->controlador . "/listas/" . $dato[$this->mante_usuario_model->id_tabla], 'Asignar Listas', array('class' => 'btn btn-warning')) . " ";

        if ($this->param_model->obtener_por_id(16) == '1') {

            echo " " . anchor($this->controlador . "/contadores/" . $dato[$this->mante_usuario_model->id_tabla], 'Asignar Contadores', array('class' => 'btn btn-primary')) . " ";
        }

    }
    if ($this->controlador == 'alertasconfig') {
        echo " " . anchor($this->controlador . "/criterios/" . $dato[$this->mante_usuario_model->id_tabla], 'Criterios', array('class' => 'btn btn-warning')) . " ";
    }

    //echo " " . anchor($this->controlador . "/info_ver/" . $dato[$this->mante_usuario_model->id_tabla], 'Ver', array('class' => 'btn btn-success'));
    echo " " . anchor($this->controlador . "/editar/" . $dato[$this->mante_usuario_model->id_tabla], 'Editar', array('class' => 'btn btn-primary'));

    if ($this->controlador != 'misusuarios' && $this->controlador != 'misperfiles') {
        echo " " . anchor($this->controlador . "/eliminar/" . $dato[$this->mante_usuario_model->id_tabla], 'Eliminar',
            array('class' => 'btn btn-danger',
                'onclick'     => 'if (confirm(\'¿Esta seguro de eliminar este registro?\')) {return true;} else {return false; }',
            )
        );
    }

    ?>
                                            </td>
                            </tr>
                            <?php
}
?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->