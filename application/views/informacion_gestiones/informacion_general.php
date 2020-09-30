<div class="contenedor_iframe">
	<div class="text-center">
		<p>Codigo Cliente: <b><?php echo $cliente['Cod_cliente']; ?></b></p>
		<p>Nombre del Cliente: <b><?php echo $cliente['Nombre_cliente']; ?></b></p>
		<p>Codigo Cartera: <b><?php echo $cliente['Cartera']; ?></b></p>
	</div>
	<ul class="nav nav-tabs justify-content-center" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información del cliente</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="histo_ges-tab" data-toggle="tab" href="#histo_ges" role="tab" aria-controls="histo_ges" aria-selected="false">Historial de Gestiones</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="crear_ges-tab" data-toggle="tab" href="#crear_ges" role="tab" aria-controls="crear_ges" aria-selected="false">Crear nueva gestión</a>
	  </li>
	</ul>
	<div class="tab-content">
	  <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
	  	<div>
	  		<table class="table table-striped table-bordered table-hover">
			  <tbody>
			    <tr>
			      <th>Género</th>
			      <td><?php echo $cliente['Sexo']; ?></td>
			      <th>Fecha Nacimiento</th>
			      <td><?php echo $cliente['f_nacimiento']; ?></td>
			    </tr>
			    <tr>
			      <th>DUI</th>
			      <td><?php echo $cliente['Dui']; ?></td>
			      <th>NIT</th>
			      <td><?php echo $cliente['NIT']; ?></td>
			    </tr>

			    <tr>
			      <th>Email</th>
			      <td><?php echo $cliente['email']; ?></td>
			      <th>Gestor</th>
			      <td><?php echo $cliente['Gestor']; ?></td>
			    </tr>

			    <tr>
			      <th>Domicilio</th>
			      <td colspan="3"><?php echo $cliente['domicilio']; ?></td>
			    </tr>

			    <tr>
			      <th># de Operacion</th>
			      <td><?php echo $cliente['id_operacion']; ?></td>
			      <th>Descripción Producto</th>
			      <td><?php echo $cliente['descripcion_producto']; ?></td>
			    </tr>

			    <tr>
			      <th>Monto Otorgado</th>
			      <td><?php echo $cliente['monto_otorgado']; ?></td>
			      <th>Plazo</th>
			      <td><?php echo $cliente['plazo']; ?></td>
			    </tr>

			    <tr>
			      <th>Fecha Apertura</th>
			      <td><?php echo $cliente['dia_apertura'] . "/" . $cliente['mes_apertura'] . "/" . $cliente['año_apertura']; ?></td>
			      <th>Fecha Vencimiento</th>
			      <td><?php echo $cliente['dia_vencimiento'] . "/" . $cliente['mes_vencimiento'] . "/" . $cliente['año_vencimiento']; ?></td>
			    </tr>

			    <tr>
			      <th>Cuota</th>
			      <td><?php echo $cliente['cuota']; ?></td>
			      <th>Monto Ultimo Pago</th>
			      <td><?php echo $cliente['monto_ultimo_pago']; ?></td>
			    </tr>

			    <tr>
			      <th>Cuotas Pagadas</th>
			      <td><?php echo $cliente['cuotas_pagadas']; ?></td>
			      <th>Garantia</th>
			      <td><?php echo $cliente['garantia']; ?></td>
			    </tr>
			    <tr>
			      <th>Tipo Cartera</th>
			      <td><?php echo $cliente['tipo_cartera']; ?></td>
			      <th>Salario Cliente</th>
			      <td><?php echo $cliente['salario_cliente']; ?></td>
			    </tr>


			    <tr>
			      <th>Saldo Capital</th>
			      <td><?php echo $cliente['saldo_capital']; ?></td>
			      <th>Saldo Interes</th>
			      <td><?php echo $cliente['saldo_interes']; ?></td>
			    </tr>

			    <tr>
			      <th>Saldo Vencido</th>
			      <td><?php echo $cliente['saldo_vencido']; ?></td>
			      <th>Saldo Total</th>
			      <td><?php echo $cliente['saldo_total']; ?></td>
			    </tr>

			    <tr>
			      <th>Saldo Mora</th>
			      <td><?php echo $cliente['saldo_mora']; ?></td>
			      <th>Deuda Total</th>
			      <td><?php echo $cliente['deuda_total']; ?></td>
			    </tr>

			    <tr>
			      <th>Dias Mora</th>
			      <td><?php echo $cliente['dias_mora']; ?></td>
			      <th>Fecha de Ultima Pago</th>
			      <td><?php echo $cliente['f_ultimo_pago']; ?></td>
			    </tr>

			    <tr>
			      <th>Trabajo</th>
			      <td><?php echo $cliente['trabajo']; ?></td>
			      <th>Dirección Trabajo</th>
			      <td><?php echo $cliente['direccion_trabajo']; ?></td>
			    </tr>

			    <tr>
			      <th>Tel. Casa</th>
			      <td><?php echo $cliente['tel_casa']; ?></td>
			      <th>Tel. Trabajo</th>
			      <td><?php echo $cliente['tel_trabajo']; ?></td>
			    </tr>

			    <tr>
			      <th>Tel. Celular</th>
			      <td><?php echo $cliente['tel_celular']; ?></td>
			      <th>Tel. Alterno</th>
			      <td><?php echo $cliente['tel_alterno']; ?></td>
			    </tr>

			    <tr>
			      <th>Tel. Familiar</th>
			      <td><?php echo $cliente['tel_familiar']; ?></td>
			      <th>Nombre Familiar</th>
			      <td><?php echo $cliente['nombre_familiar']; ?></td>
			    </tr>
			    <?php
if (!empty($cliente['nombre_fiador'])) {
    ?>
	<tr>
      <th>Nombre Fiador</th>
      <td colspan="3"><?php echo $cliente['nombre_fiador']; ?></td>
    </tr>
    <tr>
      <th>DUI</th>
      <td><?php echo $cliente['DUI_fiador']; ?></td>
      <th>NIT</th>
      <td><?php echo $cliente['NIT_fiador']; ?></td>
    </tr>
    <tr>
      <th>Tel. Fiador</th>
      <td><?php echo $cliente['tel_fiador']; ?></td>
      <th>Tel. Alterno Fiador</th>
      <td><?php echo $cliente['tel_alterno_fiador']; ?></td>
    </tr>
    <tr>
      <th>Tel. Casa Fiador</th>
      <td><?php echo $cliente['tel_casa_fiador']; ?></td>
      <th>Tel. Trabajo Fiador</th>
      <td><?php echo $cliente['tel_trabajo_fiador']; ?></td>
    </tr>
    <tr>
      <th>Domicilio Fiador</th>
      <td><?php echo $cliente['direccion_domicilio_fiador']; ?></td>
      <th>Lugar Trabajo Fiador</th>
      <td><?php echo $cliente['lugar_trabajo_fiador']; ?></td>
    </tr>

    <tr>
      <th>Direccion Trabajo Fiador</th>
      <td colspan="3"><?php echo $cliente['direccion_trabajo_fiador']; ?></td>
    </tr>
	<?php
}
?>
				<tr>
			      <th>Tel. Referecia 1</th>
			      <td><?php echo $cliente['tel_ref1']; ?></td>
			      <th>Nombre referencia 1</th>
			      <td><?php echo $cliente['nombre_ref1']; ?></td>
			    </tr>
			    <tr>
			      <th>Tel. Referecia 2</th>
			      <td><?php echo $cliente['tel_ref2']; ?></td>
			      <th>Nombre referencia 2</th>
			      <td><?php echo $cliente['nombre_ref2']; ?></td>
			    </tr>

			    <tr>
			      <th>Comentario Cuenta</th>
			      <td colspan="3"><?php echo $cliente['Comentario_cuenta']; ?></td>
			    </tr>

			    <tr>
			      <th>Factura</th>
			      <td><?php echo $cliente['Factura']; ?></td>
			      <th>Sucursal</th>
			      <td><?php echo $cliente['Sucursal']; ?></td>
			    </tr>

			    <tr>
			      <th>Asesor</th>
			      <td><?php echo $cliente['Asesor']; ?></td>
			      <th>Fecha Asignación</th>
			      <td><?php echo $cliente['dia_asignacion'] . "/" . $cliente['mes_asignacion'] . "/" . $cliente['año_asignacion']; ?></td>
			    </tr>
			  </tbody>
			</table>
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="histo_ges" role="tabpanel" aria-labelledby="histo_ges-tab">
	  	<div class="row text-center">
	  		<div class="col-sm">
		      Desde <input type="text" class="fecha" id="fecha_inicio" />
		    </div>
		    <div class="col-sm">
		      Hasta <input type="text" class="fecha" id="fecha_fin" />
		    </div>
		    <div class="col-sm">
		      <button class="btn btn-primary" onclick="buscar_gestiones()">Buscar</button>
		    </div>
	  	</div>
	  	<div id="resultado_busqueda">
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="crear_ges" role="tabpanel" aria-labelledby="crear_ges-tab">
	  	<div class="form-group row mt-1">
            <label  class="col-sm-2 col-form-label">Accion</label>
            <div class="col-sm-12">
            	<?php
echo form_dropdown('id_accion', $acciones, '0', array('class' => "form-control", 'id' => 'id_accion'));
?>
            </div>
        </div>

	  	<div class="form-group row mt-1">
        	<label for="nombre" class="col-sm-2 col-form-label">Observaciones</label>
            <div class="col-sm-12">
            	<?php
echo form_textarea('observaciones', '',
    array(
        'class' => 'form-control',
        'rows'  => 4,
        'id'    => 'observaciones',
    )
);
?>
            </div>
        </div>

        <div class="form-group row mt-1">
            <label  class="col-sm-2 col-form-label">Estatus</label>
            <div class="col-sm-12" onchange="">
                <?php
echo form_dropdown('id_estatus', $estatus, '0', array('class' => "form-control", 'id' => 'id_estatus', 'onchange' => 'buscar_sub_estatus($(this))'));
?>
            </div>
        </div>

        <div class="form-group row mt-1">
            <label  class="col-sm-2 col-form-label">Sub Estatus</label>
            <div class="col-sm-12">
                <?php
echo form_dropdown('id_sub_estatus', array("-- Seleccionar --"), '0', array('class' => "form-control", 'id' => 'id_sub_estatus'));
?>
            </div>
        </div>
        <div class="mensajes_proceso text-center">
        </div>

        <div class="row mt-4">
            <div class="col col-md-6 col-sm-6">
            	<button class="btn btn-primary  btn-block" onclick="procesar_gestion()">Crear Gestión</button>
            </div>
            <div class="col col-md-6 col-sm-6">
            	<?php
echo anchor(current_url(), 'Cancelar', array('class' => 'btn btn-danger  btn-block'));
?>
           </div>
        </div>

	  </div>
	</div>
</div>
<script type="text/javascript">

	function buscar_sub_estatus(estatus) {
		$.get('<?php echo site_url('cobros/obtener_sub_estatus/'); ?>'+estatus.val(), function(data) {
			$('#id_sub_estatus').html(data);
		});

	}
	function procesar_gestion()
	{
		mostrar_loading();
		$.post('<?php echo site_url('cobros/procesar_gestion'); ?>',
			{
				id_accion: $('#id_accion').val(),
				observaciones: $('#observaciones').val(),
				id_estatus: $('#id_estatus').val(),
				id_sub_estatus: $('#id_sub_estatus').val(),
				cod_cliente: '<?php echo $cliente['Cod_cliente'] ?>',
				cartera: '<?php echo $cliente['Cartera'] ?>'
		}, function(data, textStatus, xhr) {
			$('.alerta_proceso').remove();
			if(data.cod_error==0)
			{
				$('.mensajes_proceso').append('<div class="alert alert-success alerta_proceso" role="alert">'+data.error+'</div>');

				$('#id_accion').val('0');
				$('#observaciones').val('');
				$('#id_estatus').val('0');
				$('#id_sub_estatus').html('');
			}else{
				$('.mensajes_proceso').append('<div class="alert alert-danger alerta_proceso" role="alert">'+data.error+'</div>');
			}
			quitar_loading();
		});
	}

	function buscar_gestiones()
	{
		mostrar_loading();
		$.post('<?php echo site_url('cobros/buscar_gestiones'); ?>',
			{
				fecha_inicio: $('#fecha_inicio').val(),
				fecha_fin: $('#fecha_fin').val(),
				cod_cliente: '<?php echo $cliente['Cod_cliente'] ?>',
				cartera: '<?php echo $cliente['Cartera'] ?>'
		}, function(data, textStatus, xhr) {
			$('#resultado_busqueda').html(data);
			quitar_loading();
		});
	}
</script>