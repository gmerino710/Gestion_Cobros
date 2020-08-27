 <!-- Display status message -->
 <?php if(!empty($success_msg)):?>
                          <div class="col-xs-12">
                          <div class="alert alert-success"><?php echo $success_msg; ?>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            
                        
                        </div>
                        </div>
                      <?php elseif(!empty($error_msg)):?>
                          <div class="col-xs-12">
                          <div class="alert alert-danger"><?php echo $error_msg; ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        
                        </div>
                        </div>
 <?php endif;?>


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Importacion de clientes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Importacion de Colas de Trabajo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pago-tab" data-toggle="tab" href="#pago" role="tab" aria-controls="pago" aria-selected="false">Importacion de Pagos</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="gestion-tab" data-toggle="tab" href="#gestion" role="tab" aria-controls="gestion" aria-selected="false">Importacion de Gestiones</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <!-- Main content -->
                   
                  <section class="content h-100 mt-4 ">
                      <div class="row  h-100 justify-content-center align-items-center">
                        <div class=" col-md-7 col-sm-12 ">
                          <div class="card">
                      
                        <div class="card-header">

                        <h4>Cargar archivo <i class="fas fa-upload"></i>  </h4>
                  
                      </div>

                    

                          <div class="card-body ">     
                      <!-- method="post" enctype="multipart/form-data"-->
                                <?=form_open_multipart('import/subir');?>


                                <div class="form-group row mt-1">
                                <label for="nombre" class="col-sm-4 col-form-label">Selecionar Archivo</label>
                                    <div class="col-sm-12">
                                  
                                
                                    <input type="file" name="file" />


                                    </div>
                                </div>

                              
                                <div class="row mt-4">
                                    <div class="col col-md-6 col-sm-6">
                                    <input type="submit" class="btn btn-block btn-primary" name="importSubmit" value="Importar"/>

                                    </div>
                                    <div class="col col-md-6 col-sm-6">

                                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>" >Cancelar </a> 

                                  </div>
                                </div>   
                              
                              
                                <?= form_close();?>    


                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div>
                      </div> 
                    </section>   
                    

          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- Main content -->
                   
                  <section class="content h-100 mt-4 ">
                      <div class="row  h-100 justify-content-center align-items-center">
                        <div class=" col-md-7 col-sm-12 ">
                          <div class="card">
                      
                        <div class="card-header">

                        <h4>Cargar archivo <i class="fas fa-upload"></i>  </h4>
                  
                      </div>

                    

                          <div class="card-body ">     
                      <!-- method="post" enctype="multipart/form-data"-->
                                <?=form_open_multipart('import/subir');?>


                                <div class="form-group row mt-1">
                                <label for="nombre" class="col-sm-4 col-form-label">Selecionar Archivo</label>
                                    <div class="col-sm-12">
                                  
                                
                                    <input type="file" name="file" />


                                    </div>
                                </div>

                              
                                <div class="row mt-4">
                                    <div class="col col-md-6 col-sm-6">
                                    <input type="submit" class="btn btn-block btn-primary" name="importCol" value="Importar"/>

                                    </div>
                                    <div class="col col-md-6 col-sm-6">

                                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>" >Cancelar </a> 

                                  </div>
                                </div>   
                              
                              
                                <?= form_close();?>    


                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div>
                      </div> 
                    </section>   


          
        </div>

        
        <div class="tab-pane fade " id="pago" role="tabpanel" aria-labelledby="pago-tab">
                  <!-- Main content -->
                   
                  <section class="content h-100 mt-4 ">
                      <div class="row  h-100 justify-content-center align-items-center">
                        <div class=" col-md-7 col-sm-12 ">
                          <div class="card">
                      
                        <div class="card-header">

                        <h4>Cargar archivo <i class="fas fa-upload"></i>  </h4>
                  
                      </div>

                    

                          <div class="card-body ">     
                      <!-- method="post" enctype="multipart/form-data"-->
                                <?=form_open_multipart('import/subir');?>


                                <div class="form-group row mt-1">
                                <label for="nombre" class="col-sm-4 col-form-label">Selecionar Archivo</label>
                                    <div class="col-sm-12">
                                  
                                
                                    <input type="file" name="file" />


                                    </div>
                                </div>

                              
                                <div class="row mt-4">
                                    <div class="col col-md-6 col-sm-6">
                                    <input type="submit" class="btn btn-block btn-primary" name="importPago" value="Importar"/>

                                    </div>
                                    <div class="col col-md-6 col-sm-6">

                                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>" >Cancelar </a> 

                                  </div>
                                </div>   
                              
                              
                                <?= form_close();?>    


                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div>
                      </div> 
                    </section>   
                    

          </div> 
            
          <div class="tab-pane fade " id="gestion" role="tabpanel" aria-labelledby="gestion-tab">
                  <!-- Main content -->
                   
                  <section class="content h-100 mt-4 ">
                      <div class="row  h-100 justify-content-center align-items-center">
                        <div class=" col-md-7 col-sm-12 ">
                          <div class="card">
                      
                        <div class="card-header">

                        <h4>Cargar archivo <i class="fas fa-upload"></i>  </h4>
                  
                      </div>

                    

                          <div class="card-body ">     
                      <!-- method="post" enctype="multipart/form-data"-->
                                <?=form_open_multipart('import/subir');?>


                                <div class="form-group row mt-1">
                                <label for="nombre" class="col-sm-4 col-form-label">Selecionar Archivo</label>
                                    <div class="col-sm-12">
                                  
                                
                                    <input type="file" name="file" />


                                    </div>
                                </div>

                              
                                <div class="row mt-4">
                                    <div class="col col-md-6 col-sm-6">
                                    <input type="submit" class="btn btn-block btn-primary" name="importGest" value="Importar"/>

                                    </div>
                                    <div class="col col-md-6 col-sm-6">

                                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>" >Cancelar </a> 

                                  </div>
                                </div>   
                              
                              
                                <?= form_close();?>    


                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div>
                      </div> 
                    </section>   
                    

          </div>



           <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- Main content -->
                   
                  <section class="content h-100 mt-4 ">
                      <div class="row  h-100 justify-content-center align-items-center">
                        <div class=" col-md-7 col-sm-12 ">
                          <div class="card">
                      
                        <div class="card-header">

                        <h4>Cargar archivo <i class="fas fa-upload"></i>  </h4>
                  
                      </div>

                    

                          <div class="card-body ">     
                      <!-- method="post" enctype="multipart/form-data"-->
                                <?=form_open_multipart('import/subir');?>


                                <div class="form-group row mt-1">
                                <label for="nombre" class="col-sm-4 col-form-label">Selecionar Archivo</label>
                                    <div class="col-sm-12">
                                  
                                
                                    <input type="file" name="file" />


                                    </div>
                                </div>

                              
                                <div class="row mt-4">
                                    <div class="col col-md-6 col-sm-6">
                                    <input type="submit" class="btn btn-block btn-primary" name="importCol" value="Importar"/>

                                    </div>
                                    <div class="col col-md-6 col-sm-6">

                                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>" >Cancelar </a> 

                                  </div>
                                </div>   
                              
                              
                                <?= form_close();?>    


                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div>
                      </div> 
                    </section>   


          
        </div>

 
</div>
       
       
       
       
       
       
       
       
       
     
   
   
   