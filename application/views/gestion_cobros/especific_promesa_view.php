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
                <th>Estado de promesa</th>
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
                            
                              <td> <?=$item['Estado']?></td>
                              <td> <?=$item['Cod_Gestores']?></td>

                              <td>
                              <?php if($item['Estado']=='Completada'):?>   
                            <button type="button" class="btn btn-primary disabled"  title="Cambiar fecha">

                            <i class="fa fa-edit" aria-hidden="true"></i>

                            </button>

                              <a   onclick="return confirm('¿Promesa cumplida?')" class="btn btn-primary  disabled"  title="Finalizar promesa">

                              <i  class="fa fa-check text-white " aria-hidden="true"></i> 
                            </a>

                              <?php else:?>
                                <button   type="button" class="btn btn-primary "  title="Cambiar fecha" data-toggle="modal" data-target="#exampleModal">

                              <i class="fa fa-edit" aria-hidden="true"></i>

                              </button>

                              <a   onclick="return confirm('¿Promesa cumplida?')" class="btn btn-primary "  title="Finalizar promesa" href="<?=base_url()?>cobros/crear-promesa-upt/<?=$item['Cod_cliente']?>">

                              <i  class="fa fa-check text-white " aria-hidden="true"></i> 
                            </a>
                            <?php endif;?>   
                          </td>
                           
                         
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