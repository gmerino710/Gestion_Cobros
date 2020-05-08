<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-2">
                        <?php
$usuario_ver_descargar = explode(',', $this->param_model->obtener_por_id(17));
$ver_descargar         = in_array($this->usuario['usuario'], $usuario_ver_descargar);
echo anchor($this->controlador . "/nuevo", 'Agregar', array('class' => 'btn btn-block btn-success'));
?>
                    </div>
                    <div class="col-xs-10"></div>
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
foreach ($this->general_model->campos as $key => $value) {
    if ($value['lista']) {
        ?>
                                <th>
                                    <?php echo $value['mostrar']; ?>
                                </th>
                                <?php
}
}
if ($this->controlador == 'adminpublicas') {
    ?>
    <th>Cant. Registros</th>
    <?php
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
foreach ($this->general_model->campos as $key => $value) {
        if ($value['lista']) {
            if (!$value['relacion']) {
                if ($value['tipo'] == 'sino') {
                    ?>
                                    <td>
                                        <?php echo ($dato[$value['nombre']] == 'S') ? 'Si' : 'No'; ?>
                                    </td>
                                    <?php
} else {
                    ?>
                                    <td>
                                        <?php echo $dato[$value['nombre']]; ?>
                                    </td>
                                    <?php
}
            } else {
                ?>
                                        <td>
                                            <?php echo $this->general_model->obtiene_descripcion($value['relacion']['tabla'],
                    $value['relacion']['id_tabla_relacion'],
                    $dato[$value['nombre']],
                    $value['relacion']['campo_descripcion']
                ); ?>
                                        </td>
                                        <?php
}
        }
    }
    if ($this->controlador == 'adminpublicas') {
        ?>
    <td><?php echo $this->listaspublicas_model->obtiene_cant_x_lista($dato[$this->general_model->id_tabla]); ?></td>
    <?php
}
    ?>
                                            <td>
                                                <?php

    if ($this->controlador == 'listasinternacionales') {
        if ($dato['archivo'] == 'S') {
            echo " " . anchor($this->controlador . "/subir/" . $dato[$this->general_model->id_tabla], 'Subir Archivo', array('class' => 'btn btn-warning')) . " ";
            echo " " . anchor($dato['ruta'] . $dato['nombre_archivo'], 'Ver Archivo', array('class' => 'btn btn-info', 'target' => '_blank')) . " ";
        }

    }

    if ($this->controlador == 'adminpublicas') {
        echo " " . anchor($this->controlador . "/asignar_cliente/" . $dato[$this->general_model->id_tabla], 'Agregar registro', array('class' => 'btn btn-warning')) . " ";

        if ($ver_descargar) {
            echo " " . anchor($this->controlador . "/generar_excel/" . $dato[$this->general_model->id_tabla], 'Descargar', array('class' => 'btn btn-info')) . " ";
        }

    }

    echo anchor($this->controlador . "/editar/" . $dato[$this->general_model->id_tabla], 'Editar', array('class' => 'btn btn-primary'));
    if ($this->controlador == 'roles') {
        echo " " . anchor($this->controlador . "/permisos/" . $dato[$this->general_model->id_tabla], 'Asignar Permisos', array('class' => 'btn btn-warning'));
    }
    if ($this->controlador == 'usuarios') {
        $atributos_ficha = array(
            'class'       => 'btn btn-info',
            'width'       => 800,
            'height'      => 600,
            'scrollbars'  => 'yes',
            'status'      => 'yes',
            'resizable'   => 'yes',
            'screenx'     => 50,
            'screeny'     => 50,
            'window_name' => '_blank',
        );

        echo " " . anchor_popup($this->controlador . "/ficha_usuario/" . $dato[$this->general_model->id_tabla], 'Ver Ficha', $atributos_ficha);
        echo " " . anchor($this->controlador . "/logo/" . $dato[$this->general_model->id_tabla], 'Logo', array('class' => 'btn btn-warning'));
        echo " " . anchor($this->controlador . "/paises/" . $dato[$this->general_model->id_tabla], 'Paises', array('class' => 'btn btn-danger'));
        echo " " . anchor($this->controlador . "/permisolistas/" . $dato[$this->general_model->id_tabla], 'Listas', array('class' => 'btn btn-danger'));
        echo " " . anchor("empresa/inicio/" . urlencode(encriptar_num($dato[$this->general_model->id_tabla])), 'Pagina Inicio', array('class' => 'btn btn-info', 'target' => '_blank'));
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