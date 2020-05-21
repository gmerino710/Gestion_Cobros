
 <!-- Profile Image -->
 <div class="row">
    <!-- left column -->
    <div class="col-md-5 mx-auto">
 
                
                <div class="card card-primary card-outline">
                   
                            <div class="card-body box-profile">

                   
       
                                <div  class="text-center">

                             
                                    <?php echo img(array('src'=>url_logo($this->usuario['logo']),'class'=>'profile-user-img img-responsive img-circle'));?>

                            
                                </div>

                                <h3 class="profile-username text-center"><?= $this->usuario['nombre'];?></h3>

                                <p class="text-muted text-center"><?= ($this->usuario['rol']['nombre_rol']);?></p>

                          <div class="row">

                                 <div class="col-12">
                                    <div class="card collapsed-card card-outline card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Cambio de Imagen de perfil</h3>

                                                <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                            <?php echo form_open_multipart('',array('role'=>"form"));?>
                                                                                
                                            <div class="form-group">
                                                <label for="archivo_logo">Subir archivo</label>
                                                <input type="file" id="archivo_logo" name="archivo_logo" />
                                            </div>
                                                    <div class="row ">

                                                        <div class="col-6 mt-1 mx-auto">
                                                        <input type="submit" class="btn btn-primary btn-block" value="Guardar" name="guardar" />
                                                        </div>
                                                    
                                                    </div>
                                                       
                                            </div>
                                            <!-- /.card-body -->
                                    </div>
                                <!-- /.card -->


                                <div class="card collapsed-card card-outline card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Cambio de Contraseña</h3>

                                                <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="clave">Contraseña</label>
                                                        <input name="clave" type="password" class="form-control" id="clave" placeholder="Ingresar contraseña">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="clave">Repetir contraseña</label>
                                                        <input name="repetido" type="password" class="form-control" id="repetido" placeholder="Repetir contraseña">
                                                    </div>
                                                    <div class="row ">

                                                        <div class="col-6 mx-auto">
                                                        <input type="submit" class="btn btn-primary btn-block" value="Guardar" name="guardar" />


                                                        </div>

                                                        
                                                        <?php echo form_close(); ?>
                                                    </div>
                                            </div>
                                            <!-- /.card-body -->
                                    </div>
                                <!-- /.card -->
                              </div>
                         </div>
                               
                               


                    </div>
                            <!-- /.card-body -->
                </div>
    
    </div>
 </div>              


 


