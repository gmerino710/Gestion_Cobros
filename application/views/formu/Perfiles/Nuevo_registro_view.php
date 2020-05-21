    <!-- Main content -->
  <section class="content h-100 ">
      <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-10 col-sm-12 ">
          <div class="card">
            <div class="card-header">

                <h3 class="text-center"><b>Registro de Usuarios </b> <i class="fas fa-user"></i> </h3>
             
              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <?=form_open('usuarios/registrar');?>
        

                <div class="form-group row mt-1">
              
                    <label for="Usuario" class="col-sm-2 col-form-label">Usuario</label>
                    <div class="col-sm-12">
                    <?php echo form_error('usuario'); ?>
                    <input type="text" class="form-control" value="<?= set_value('usuario'); ?>" id="usuario" name="usuario" placeholder="Ingresar usuario">
                    </div>
                </div>

                <div class="form-group row mt-2">
                   
                    <label for="Contraseña" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-12">
                    <?php echo form_error('clave'); ?>
                    <input type="password" value="<?= set_value('clave'); ?>"  class="form-control" id="Contraseña" name="clave" placeholder="Ingresar contraseña">
                    </div>
                </div>

                <div class="form-group row mt-2">
                <label for="Contraseña1" class="col-sm-3 col-form-label">Repetir contraseña</label>              
                <div class="col-sm-12">
                <?php echo form_error('conf'); ?>

                    <input type="password" class="form-control" id="Contraseña1" name="conf" placeholder="Repetir contraseña">
                    </div>
                </div>

                
                <div class="form-group row mt-1">
             
                    <label for="cargo" class="col-sm-2 col-form-label">Nombre</label>
                   
                    <div class="col-sm-12">
                    <?php echo form_error('nombre'); ?>
                    <input type="text" class="form-control" value="<?= set_value('nombre'); ?>"   id="cargo" name="nombre" placeholder="Ingresar nombre ">
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
                    <div class="col col-md-6 col-sm-6">
                    <button type="submit" class="btn btn-primary  btn-block">Agregar</button>

                    </div>
                    <div class="col col-md-6 col-sm-6">

                  <a  href="<?=base_url()?>usuarios" class="btn btn-danger  btn-block">Cancelar</a>

                </div>
                </div>   
                

               
                <?= form_close();?>    
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>   

    
