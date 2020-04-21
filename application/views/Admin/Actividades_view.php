
 <!-- Main content -->
 <section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header hd-white">
          
            <?php if($this->session->flashdata('item')):?>
                <div id="timer"  class="alert alert-success alert-dismissible fade show" role="alert">
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
            <a title="Nuevo cartera" href="<?=base_url()?>actividades/nuevo"><button class="btn btn-outline-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              Añadir Actividad <i class="fa fa-plus"></i> 
              </button>  
            </a>
            </button>  
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            
              <table id="tb_actividad" class=" table table-striped table-bordered">
                <thead>
                <tr>
                    
                  <th>Id</th>
                  <th>Nombre de la accion</th>
                  <th>Estados</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if($administracion):?>    
                    <?php foreach($administracion as $item):?>
                    <tr>
                    <td><?=$item['Cod_act'];?></td>
                    <td><?=$item['Actividad'];?></td>
                    <td><?=$item['estado'];?></td>
                    <td><a onclick="return confirm('¿Eliminar element?')" class="btn btn-danger" href="<?=base_url();?>actividades/eliminar/<?=$item['Cod_act'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <a class="btn btn-warning" href="<?=base_url()?>actividades/editar/<?=$item['Cod_act']?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php endforeach;?>
                    <?php else:?>

                       
                           <tr>
                           <td  colspan="4"><center><h1 class="display-4 center">Sin Data</h1></center></td>
                           </tr> 
                     

              <?php endif;?> 
                </tbody>
               
        
               </table>
 
            </div>

          
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>  




  <?php if(!empty($administracion)):?>
                  
 <!-- Main content -->
 <section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header hd-white">
            <?php if($this->session->flashdata('actividad')):?>
                <div id="timer"  class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('actividad'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>   
              </div>
              <?php endif;?> 

          
            <a title="Nuevo cartera" href="<?=base_url()?>actividades/subactividad/nuevo"><button class="btn btn-outline-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              Añadir Sub actividad <i class="fa fa-plus"></i> 
              </button>  
            </a>
            </button>  
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tb_sub" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                       <th>Actividad</th> 
                      <th>Id</th>
                      <th>Sub actividad</th>
                      <th>Estados</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($sub):?>    
                        <?php foreach($sub as $item):?>
                        <tr>
                        <td><?=$item['actividad'];?></td>
                        <td><?=$item['Id'];?></td>
                        <td><?=$item['Subactividad'];?></td>
                        <td><?=$item['estado'];?></td>
                        <td><a onclick="return confirm('¿Eliminar element?')" class="btn btn-danger" href="<?=base_url();?>actividades/subactividad/eliminar/<?=$item['Id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        
                        <?php endforeach;?>

                        <?php else:?>

                          
                              <tr>
                              <td  colspan="4"><center><h1 class="display-4 center">Sin Data</h1></center></td>
                              </tr> 
                        

                  <?php endif;?> 
                    </tbody>
               
        
               </table>
              
         
 
            </div>

          
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>  
    
      <?php endif;?>  