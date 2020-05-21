<section class="content ">
<div class="container-fluid">

<div class="row">
    <!-- left column -->
    <div class="col-md-10 col-sm-12 mx-auto">
        <!-- general form elements -->
        <div class="card">
             <div class="card-header">
                <h3 class="box-title">Asignación de permisos para rol <?php echo $dato['nombre_rol'];?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('',array('role'=>"form"));?>
            <div class="card-body">

            <?php foreach($menus as $key => $value):?>

                <div class="form-group">
                 <div class="custom-control custom-checkbo">
                         <label>
                            
                            <?php echo form_checkbox('id_menu[]', $value['id_menu'],$value['tiene'],array('onClick'=>'chequear_sub_menu(\'padre_'.$value['id_menu'].'\')','id'=>'padre_'.$value['id_menu']),array('class'=>'custom-control-input')); ?>
                            <b><?php echo $value['nombre_menu'];?></b>
                        </label>

                        <div class="sub_menu_<?php echo $value['id_menu'];?>">
                        <?php if($value['hijos']):?>
                                    <?php foreach($value['hijos'] as $key_2 => $value_2):?>

                                        <div>
                                        <label style="margin-left: 10px;">
                                            <?php echo form_checkbox('id_menu[]', $value_2['id_menu'],$value_2['tiene'],array('id'=>'item')); ?>
                                            <?php echo $value_2['nombre_menu'];?>
                                        </label>
                                    </div>

                                    <?php endforeach;?>   

                        <?php endif;?>    

                        </div>
                 </div>
                </div>
                                        
            <?php endforeach;?>
                 

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
            <div class="card-footer ">
            <div class="row mt-4 mx-auto">
                    <div class="col col-md-6 col-sm-6">
              
                    <input type="submit" class="btn btn-primary name  btn-block" value="Guardar" name="guardar" />

                    </div>
                    <div class="col col-md-6 col-sm-6">

                 
                    <a href="<?php echo site_url($this->controlador);?>" class="btn btn-danger  btn-block">Cancelar </a>

                   </div>
                </div>   
                <!--
            <div class="row mt-4">
                    <div class="col col-md-6 col-sm-12">
                    <input type="submit" class="btn btn-success" value="Guardar" name="guardar" />

                    </div>
                    <div class="col col-md-6 col-sm-12">

                  

                   </div>
                </div>   
        -->
                    
                   
                    
                </div>

                
            </div>
            <?php
    echo form_close();
    ?>
        </div>
        <!-- /.box -->
    </div>
</div>
  </div>

                </div>
   </section>
   
   