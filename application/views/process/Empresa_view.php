
 <!-- Main content -->
 <section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header hd-white">
            <?php if($this->session->flashdata('item')):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('item'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>   
                </div>
              <?php endif;?> 
            <a title="Nueva empresa" href="<?=base_url()?>Empresa/nuevo"><button class="btn btn-outline-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              Añadir Cartera <i class="fa fa-plus"></i> 
              </button>  
            </a>
            </button>  
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table  class="tb table table-bordered table-responsive-sm">
                <thead>
                <tr>
                    
                  <th>Id</th>
                  <th>Empresa</th>
                  <th>Estados</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                
                    <?php foreach($administracion as $item):?>
                    <tr>
                    <td><?=$item['Cod_empresa'];?></td>
                    <td><?=$item['Empresa'];?></td>
                    <td><?=$item['estado'];?></td>
                    <td><a onclick="return confirm('¿Eliminar element?')" class="btn btn-danger" href="<?=base_url();?>Empresa/eliminar/<?=$item['Cod_empresa'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <a class="btn btn-warning" href="<?=base_url()?>Empresa/editar/<?=$item['Cod_empresa']?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
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


    <!--Model -->