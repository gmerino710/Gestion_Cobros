




    <!-- Main content -->
    <section class="content h-100 ">
      <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-10">
          <div class="card">
            <div class="card-header">

                <h3 class="text-center"><b>Actualizar  Usuario </b> <i class="fas fa-user"></i> </h3>
             
              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <?=form_open('usuarios/actualizar');?>

      <?php foreach($old as $items):?>

                <div class="form-group row mt-1">
                    <label for="Usuario" class="col-sm-2 col-form-label">Usuario</label>
                    <div class="col-sm-12">
                    <?php echo form_error('usuario'); ?>
                    <input type="text"  disabled class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?=$items['usuario'];?>">
                    </div>
                </div>

                <div class="form-group row mt-1">
                    <label for="Contraseña" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-12">
                    <?php echo form_error('clave'); ?>
                    <input type="password" class="form-control" id="Contraseña" name="clave" placeholder="Contraseña">
                    </div>
                </div>

                <div class="form-group row mt-1">
                <label for="Contraseña1" class="col-sm-3 col-form-label">Repetir contraseña</label>                    
                 <div class="col-sm-12">
                 <?php echo form_error('conf'); ?>
                    <input type="password" class="form-control" id="Contraseña1" placeholder="Repetir contraseña">
                    </div>
                </div>

                
                <div class="form-group row mt-1">
                <label for="cargo" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-12">
                    <?php echo form_error('nombre'); ?>
                    <input type="text" class="form-control" id="cargo" name="nombre" placeholder="Nombre"  value="<?=$items['nombre'];?>" >
                    </div>
                </div>

       
                <div class="form-group row mt-1">
                        <label for="roles"  class="col-sm-2 col-form-label">Rol</label>   
                        <div class="col-sm-12">  
                            <select id="roles" name="rol"  class="form-control">
                            <?php foreach($roles as $item):?>
                              <option   value="<?=$item['id_rol'];?>" ><?=$item['nombre_rol'];?></option>
                            <?php endforeach;?>   
                        </select>
                        </div> 
                </div>
                
                <div class="form-group row mt-1">
                        <label for="estados" class="col-sm-2 col-form-label">Estados</label>    
                        <div class="col-sm-12">  
                          <select id="estados" class="form-control" name="estados" >
                            <?php foreach($estados as $item):?>
                              <option value="<?=$item['id_estado_usuario'];?>" ><?=$item['nombre_estado'];?></option>
                            <?php endforeach;?>   
                        </select>
                        </div> 
                </div>


                
                <div class="row mt-4">
                    <div class="col col-md-6 col-sm-12">
                    <button type="submit"  value="<?= $items['id_usuario'];?>" name="id" class="btn btn-primary  btn-block">Actualizar</button>

                    </div>
                    <div class="col col-md-6 col-sm-12">

                    <a  href="<?=base_url()?>usuarios" class="btn btn-danger btn-block" >Cancelar</button>   </a>  

                     </div>
                </div>   
                
      <?php endforeach;?> 

               
                <?= form_close();?>    
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>   
