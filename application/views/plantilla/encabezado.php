<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->nombre_empresa; ?> | <?php echo $this->titulo; ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="https://cdn3.iconfinder.com/data/icons/basic-ui-elements-2-4-flat-style-36/512/Basic_UI_Elements_2.4_-_Flat_Style_-_36-48-512.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url();?>asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url();?>asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url();?>asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url();?>asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url();?>asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url();?>asset/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Mis stilos--->
  <link rel="stylesheet" href="<?=base_url();?>asset/dist/css/estilos.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
     <li class="nav-item dropdown user user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
    <?= img(array('src' => url_logo($this->usuario['logo']),
                  'class'=> 'user-image img-circle elevation-2',
                  'alt'=> 'Imagen del Usuario'));
                    ?>
      <span class="hidden-xs">
      <?php if(isset($this->usuario['usuario_empresa'])):?> 
                      <?=$this->usuario['usuario_empresa']['perfil']['nombre_perfil'];?>
                    <?php else :?>
                      <?=$this->usuario['rol']['nombre_rol'];?>
                    <?php endif;?>
        </p>


      </span>
    </a>
  
    <ul class="dropdown-menu dropdown-menu-lg  dropdown-menu-right" style="border-radius: 15px;">
   
    
   
      <li class="user-header" >
      <?= img(array('src' => url_logo($this->usuario['logo']),
                  'class'=> 'img-size-50 mr-3 img-circle',
                  'alt'=> 'Imagen del Usuario'));
                    ?>

        <p id="usuario">
        <?php if(isset($this->usuario['usuario_empresa'])):?> 
                      <?=$this->usuario['usuario_empresa']['perfil']['nombre_perfil'];?>
                    <?php else :?>
                      <?=$this->usuario['rol']['nombre_rol'];?>
                    <?php endif;?>
        </p>
        <?php if (!isset($this->usuario['usuario_empresa'])):?> 
      
      <small class= 'text-secondary'>Ult. Acceso: <?=$this->usuario['ultimo_acceso']; ?></small>

                    
     <?php endif;?>
      </li>
    
      <!-- Menu Footer-->
      <li class="user-footer">
        <div class="pull-left text-center" >
        <?php if (isset($this->usuario['usuario_empresa'])):?> 
                  <small> <?=anchor('empresa/salir', 'Salir'); ?></small>
                    <?php else:?> 
                <?= anchor('inicio/salir', 'Salir',array('title' => 'Salir!'));?>
                
                    <?php endif;?>
                    
          <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
        </div>
      </li>
    </ul>
  
  </li>
   
     </ul>
  </nav>
 
  <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?=base_url();?>" class="brand-link">
                <img src="https://i.pinimg.com/originals/7a/b0/2a/7ab02ae6078aea3ebcb59ab42836e4fa.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Empresa</span>
              </a>
              <!-- sidebar: style can be found in sidebar.less -->
  <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                  <?php
                  echo img(array('src' => url_logo($this->usuario['logo']),
                      'class'              => 'img-circle elevation-2',
                      'alt'                => 'Imagen Usuario'));
                  ?>
                  
                  </div>
                  <div class="info">
                  <a href="#" class="d-block"><?=$this->usuario['nombre']; ?></a>
              
                  <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
                  </div>
              </div>
          <!-- Sidebar -->
          
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php
                  if (isset($this->usuario['usuario_empresa'])) {
                      $menu = $this->usuario_model->obtiene_menu_empresa($this->usuario['usuario_empresa']['perfil']['id_perfil'], $this->usuario['id_usuario']);
                  } else {
                      $menu = $this->usuario_model->obtiene_menu($this->usuario['id_rol']);
                  }

               foreach ($menu as $key => $value) {
                        if ($value['hijos']) {
                            $clase_hijo = '';
                            foreach ($value['hijos'] as $key_1 => $value_1) {
                                if ($this->controlador == $value_1['url']) {
                                    $clase_hijo = 'active';
                                    break;
                                }
                            }
                            ?>  
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link ">
                          <i class="fa fa-<?php echo $value['fa']; ?>"></i>
                      <p>
                      <?php echo $value['nombre_menu'];?>
                      <span class="pull-right-container">
                        <i class="right fas fa-angle-left"></i>
                        
                    
                      </span>
                      </p>
                 </a>
                 <ul class="nav nav-treeview">
                 <?php
                                    $clase_hijo = '';
                                      foreach ($value['hijos'] as $key_1 => $value_1) {
                                      $clase_hijo = ($this->controlador == $value_1['url']) ? 'active' : '';
                                            ?>
                                    <li class="<?php echo $clase_hijo; ?>"><a href="<?php echo site_url($value_1['url']); ?>"><i class="fa fa-<?php echo $value_1['fa']; ?>"></i> <?php echo $value_1['nombre_menu']; ?></a></li>
                                      <?php    
                                          
                                          }
                                                  ?>
                                                  
                                  </ul>
                                
                                <?php
                                } else {
                                        ?>
                                            <li class="<?php echo ($this->controlador == $value['url']) ? 'active' : ''; ?>">
                                              <a href="<?php echo site_url($value['url']); ?>">
                                                <i class=" fa fa-<?php echo $value['fa']; ?>"></i> <span><?php echo $value['nombre_menu']; ?></span>
                                                <span class="pull-right-container">
                                                  <!-- <small class="label pull-right bg-green">new</small>-->
                                                </span>
                                              </a>
                                              </li>
                                          <?php
                             }
          }
          
          ?>

                 </ul>

                </li> 
          

      </nav>


    </div> 
    
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $this->titulo; ?>
        
      </h1>
     <!-- <ol class="breadcrumb">
        <li><a href="<?php echo site_url('sistema'); ?>"><i class="fa fa-dashboard"></i> Sistema</a></li>
      
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
$mensaje = $this->session->userdata('mensaje');
if ($mensaje) {
    ?>
            <div class="panel box box-<?php echo $mensaje['tipo']; ?>">
                <div class="box-header with-border">
                  <?php echo $mensaje['mensaje']; ?>

                </div>
            </div>
            <?php
$this->session->set_userdata('mensaje', null);
}
?>