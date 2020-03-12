
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                  <?php foreach($rol_name as $item):?>
                    <h3 class="card-title">Permisos <?=$item['nombre_rol'];?> </h3>
                  <?php endforeach;?>  
                
              </div>
              <div class="card-body">
               
              <?= form_open('roles/permiso');?>
                 <?php echo form_error('usuario'); ?>          
               <?php foreach($menu as $item):?>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="<?=$item['id_menu'];?>" name='id_menu[]' value="<?=$item['id_menu'];?>"
                            
                            <?=set_checkbox('id_menu[]', $item['id_menu'],true ); ?>
                            
                            >
                            <label class="custom-control-label" for="<?=$item['id_menu'];?>"><?=$item['nombre_menu'];?></label>
                        </div>
                <?php endforeach;?>
                
                <div class="modal-footer">
                <?php foreach($roles as $item):?>
                    <button type="submit" class="btn btn-primary" value="<?=$item['id_rol'];?>" name="save">Enviar</button>
                    <a href="<?=base_url();?>roles"><button type="button" class="btn btn-danger">Cancelar</button></a>
             <?php endforeach;?>
                </div>
             <?=form_close();?>  
              </div>
           
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>