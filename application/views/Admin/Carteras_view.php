
 <!-- Main content -->
 <section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <?php if($this->session->flashdata('item')):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('item'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>   
              </div>
              <?php endif;?> 
            <a title="Nuevo cartera" href="<?=base_url()?>carteras/nuevo"><button class="btn btn-outline-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              Añadir Cartera <i class="fa fa-plus"></i> 
              </button>  
            </a>
            </button>  
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    
                  <th>Id</th>
                  <th>Nombre de la cartera</th>
                  <th>Estados</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if($administracion):?>    
                    <?php foreach($administracion as $item):?>
                    <tr>
                    <td><?=$item['Cod_Catera'];?></td>
                    <td><?=$item['Nombre_Cartera'];?></td>
                    <td><?=$item['estado'];?></td>
                    <td><a onclick="return confirm('¿Eliminar element?')" class="btn btn-danger" href="<?=base_url();?>carteras/eliminar/<?=$item['Cod_Catera'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <a class="btn btn-warning" href="<?=base_url()?>carteras/editar/<?=$item['Cod_Catera']?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
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


    <!--Model -->