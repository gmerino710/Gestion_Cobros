 
   
       <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Configuraciones basicas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Logo </a>
                  </li>
              
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

                      <!-- Main content -->
            <section class="content ">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                    
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table class=" tb  table table-bordered table-responsive-sm">
                          <thead>
                          <tr>
                              
                            <th>Id</th>
                            <th>Parametro</th>
                            <th>Descripcion</th>
                            <th>Valor</th>
                            <th>Editar</th>
                          </tr>
                          </thead>
                          <tbody>
                          
                              <?php foreach($params as $item):?>
                              <tr>
                              <td><?=$item['id'];?></td>
                              <td><?=$item['nombre_parametro'];?></td>
                              <td><?=$item['descripcion'];?></td>
                              <td><?=$item['valor'];?></td>
                              <td>
                              <a class="btn btn-warning" href="<?=base_url()?>parametros/editar/<?=$item['id']?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
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


                </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                     
                                                  
                          <!-- Profile Image -->
                          <div class="row">
                              <!-- left column -->
                              <div class="col-md-5 mx-auto">
                          
                                          
                                          <div class="card card-primary card-outline">
                                            
                                                      <div class="card-body box-profile">

                                            
                                
                                                          <div  class="text-center">

                                                                <?php if($logo):?>
                                                        
                                                              <?php echo img(array('src'=>Logo_empresa( $logo['Logo_empresa']),'class'=>'profile-user-img img-responsive img-circle'));?>
   
                                                              
                                                              <?php endif;?>
                                                                                                              

                                                      
                                                          </div>

                                                          <h3 class="profile-username text-center">
                                                          <?= $this->abrev_empresa; ?>

                                                          </h3>

                                                  

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
                                                                  

                                                                <?php echo form_open_multipart('logo-empresa');?>
                                                                                                                                                                          
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
                                                          <?php echo form_close(); ?>
                                                        </div>
                                                  </div>
                                                        
                                                        


                                              </div>
                                                      <!-- /.card-body -->
                                          </div>
                              
                              </div>
                          </div>              


                 
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
   
        </div>