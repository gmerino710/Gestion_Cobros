  <!-- Main content -->
  <section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
         
              <button class="btn btn-outline-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              Añadir Usuario <i class="fa fa-plus"></i> 
              </button>  
            
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id_meu</th>
                  <th>Menu</th>
                  <th>url</th>
                  <th> Icono </th>
                  <th>id_padre</th>
              
                </tr>
                </thead>
                <tbody>
                <?php foreach($menu as $item):?>
                <tr>
                <td><?=$item['id_menu'];?></td>
                <td><?=$item['nombre_menu'];?></td>
                <td><?=$item['url'];?></td>
                <td><?=$item['fa'];?></td>
                <td><?=$item['id_padre'];?></td>
                
                </tr>
                <?php endforeach;?>
                </tbody>
               
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>

          <!--Codigo del modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              
            <div class="form-group row mt-1">
                        <label for="estados" class="col-sm-2 col-form-label">Estados</label>    
                            <select id="estados" class="form-control" name="estados" >
                            <?php foreach($menu as $item):?>
                              <option value="<?=$item['id_menu'];?>" ><?=$item['nombre_menu'];?></option>
                            <?php endforeach;?>   
                        </select>
                </div>
   
      </div>
      <div class="modal-footer">
    
        <input type="submit" class="btn btn-primary" value="enviar" >  
          
      </div>
    <?=form_close();?>  
    </div>
  </div>
</div>

    </section>    