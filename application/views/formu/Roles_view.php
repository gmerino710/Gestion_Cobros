
<!--Codigo del modal-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open('/Register');?>
        <?php echo form_error('usuario'); ?>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del Rol:</label>
            <input type="text" class="form-control" id="rol" name="nombre_rol">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descripcion del rol:</label>
            <textarea class="form-control" id="message-text" name="descripcion" ></textarea>
          </div>
   
      </div>
      <div class="modal-footer">
    
        <input type="submit" class="btn btn-primary" value="enviar" >  
          
      </div>
    <?=form_close();?>  
    </div>
  </div>
</div>




    <!-- Main content -->
  <section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <?php if($this->session->flashdata('item')):?>
                <div id="timer" class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('item'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>   
              </div>


              <?php elseif($this->session->flashdata('delete')):?>
                <div id="timer"  class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('delete'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>   
              </div>
              <?php endif;?> 
          
          
              <button class="btn btn-outline-primary " data-toggle="modal" data-target="#modal" data-whatever="@mdo">
              Añadir Rol <i class="fa fa-plus"></i> 
              </button>  
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table  class="tb table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Rol</th>
                  <th>Descripcion</th>
                  <th>Acciones</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php foreach($roles as $item):?>
                <tr>
                <td><?=$item['nombre_rol'];?></td>
                <td><?=$item['descripcion'];?></td>
                <td><a  title="Asignar permisos" class="btn btn-primary"  href="<?=base_url();?>roles/permissions/<?=$item['id_rol'];?>"><i class="fa fa-edit"></i></a>
                <a  onclick="return confirm('¿Eliminar element?')" title="Eliminar" class="btn btn-danger"  href="<?=base_url();?>roles/eliminar/<?=$item['id_rol'];?>"><i class="fa fa-trash"></i></a>
                  
              </td>
              </tr>
                <?php endforeach;?>
                </tbody>
               
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>   

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

