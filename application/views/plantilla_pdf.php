<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php $this->load->view('css/reset');?>
	<?php $this->load->view('css/css_pdf');?>
</head>
<body>
	<div>
		<table width="100%">
			<tr>
				<td style="text-align: left; width: 20%;"><img width="80" height="40" src="<?php echo FCPATH . "asset" . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "perfiles" . DIRECTORY_SEPARATOR . $this->usuario['logo']; ?>" alt="Imagen Usuario" /></td>
				<td style="text-align: center;width: 60%;"><h1><?php echo $titulo_pdf; ?></h1></td>
				<td style="text-align: right; width: 20%;"><p><?php echo date('d/m/Y'); ?></p>
															<p><?php echo date('h:i:s A'); ?></p>
														   <p><?php echo obtener_cod_usuario(); ?></p>
				</td>
			</tr>
		</table>
	</div>
	<div style="margin-top: 5px;">
		<?php $this->load->view($vista_pdf);?>
	</div>
</body>
</html>