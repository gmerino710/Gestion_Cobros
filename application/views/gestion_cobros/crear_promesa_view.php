
   <?php if($filtrado):?>
  
   <!-- Main content -->
<section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header  mb-1"> Clientes <i class="fa fa-users" aria-hidden="true"></i> 
     
        
        </div> 

            <!-- /.card-header -->
            <div class="card-body">
            <?php if($this->session->flashdata('item')):?>
                <div id="timer"  class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('item'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>   
              </div>
              <?php elseif($this->session->flashdata('errr')):?>
                <div id="timer"  class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('errr'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>   
              </div>
              
              <?php endif;?> 
        
             <div class="table-responsive text-nowrap">

             <table  class="tb table table-bordered  table-striped">
                <thead>
                <tr>
                										
                <th>Código cliente</th>
                <th>DUI</th>
                <th>Nombre</th>
                <th>Fecha de ingreso</th>
                <th>Monto de ingreso</th>
                <th>Fecha de pago</th>
                <th>Gestor</th>
                <th>Accion</th>
                </tr>
         
                </thead>
                <tbody >
                         
                
                            <?php foreach($filtrado as $item):?>
                            <tr>
                              <td> <?=$item['Cod_cliente']?></td>
                              <td> <?=$item['Dui']?></td>
                              <td> <?=$item['Nombre_cliente']?></td>
                              <td> <?=$item['F_ingreso']?></td>
                              
                              <td> <?=$item['Monto_empresa']?></td>
                              <td> <?=$item['F_pago']?></td>

                              <td> <?=$item['Cod_Gestores']?></td>

                              <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Cambiar fecha</button></td>
                           
                         
                           </tr>
                            <?php endforeach;?> 
                      



                </tbody>
               
                
              </table>

             </div> 

             
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar fecha de pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <?=form_open('cobros/crear-promesa-upt');?>

                    

                        <div class="form-group row mt-1">          
                        <label for="fecha" class="col-sm-5 col-form-label">Fecha de pago  </label>      
                            <div class="col-sm-12">
                            <?php echo form_error('fecha'); ?>  

                            <input class="form-control"   type="text" name="birthday"  />

                             </div>
                       </div>

                      <div class="modal-footer">
                      
                        <input type="submit" value="Actualizar"  name="upt" id="update" class="btn btn-primary  btn-block"/>  
                        <input type="hidden" value="<?=$item['Cod_cliente'];?>" name="id" class="btn btn-primary  btn-block"/>
                      </div>
                    </div>
                  </div>
                </div>
              
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>  


    <!--Model -->
   
    <?php else: ?>
   <!-- Main content -->
    <section class="content h-100 ">
      <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-10 col-sm-12">
          <div class="card">
        
             

                <div class="card-header">

                <h4>Añadir <i class="fa fa-edit"></i>  </h4>              
                </div>
                <!-- /.card-header -->
                    <div class="card-body ">
                        <?=form_open('cobros/crear-promesa/'.$id);?>

                        <div class="form-group row mt-1">          
                        <label for="pago" class="col-sm-3 col-form-label">Monto promesa</label>      
                            <div class="col-sm-12">
                            <?php echo form_error('monto'); ?>  
                        
                            <input type="text" class="form-control"   id="pago" name="monto" placeholder="Ingresar monto">
                        
                        </div>
                    

                        </div>

                        <div class="form-group row mt-1">          
                        <label for="fecha" class="col-sm-2 col-form-label">Fecha de pago</label>      
                            <div class="col-sm-12">
                            <?php echo form_error('fecha'); ?>  
                        
                            <input class="form-control"   type="text" name="birthday"  />
                        
                        </div>


                        </div>

                        
                        <div class="row mt-4">
                            <div class="col col-md-6 col-sm-6">
                            <button type="submit" class="btn btn-primary  btn-block">Agregar</button>

                            </div>
                            <div class="col col-md-6 col-sm-6">

                        <a class="btn btn-danger  btn-block" href="<?=base_url()?>gestores" >Cancelar  </a>  

                            </div>
                        </div>   


                    

                    
                        <?= form_close();?>    
                    </div>
                    <!-- /.card-body -->

            <?php endif;?>   

          
        
        
        
        </div>
        </div>
      </div> 
    </section>   
