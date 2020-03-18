<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('favicon.ico'); ?>" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/login.css">
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body id="lgn" class=" loginaje login-page">
    <div class="login-box">

        <div class="card">
                <div class="card-body login-card-body forms">
                
                <h2 class="inicio">Inicio</h2>
               
                <?=form_open();?>
                        <?php if($error):  ?>
                            <div class="form-group has-error">
                            <?php echo $error; ?>
                            </div>
                        <?php endif;?>
                        <div class="input-group mb-3">
                             <?php echo form_error('usuario'); ?>
                            <input type="text" class="form-control" placeholder="Usuario" name="usuario" value="<?php echo set_value('usuario'); ?>" id="usuario" />
                           
                         </div>
                        
                         <div class="input-group mb-3">
                         <?php echo form_error('clave'); ?>
                            <input type="password" class="form-control" placeholder="Clave" name="clave">
                           
                         </div>

                         <div class="social-auth-links text-center mb-3">
     
                         <button type="submit" class="btn btn-primary  btn-block btn-flat" 
                                ta-toggle="tooltip" data-placement="top" title="Tooltip on top">Ingresar</button>
                    </div>
  

                <?form_close();?>

                </div>

        </div>
     
   
        <!-- /.login-box-body -->
    </div>


  
<!-- /.login-box -->
    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>asset/plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
        jQuery(document).ready(function($) {
            $('#usuario').focus();
        });
    });
    </script>
</body>

</html>