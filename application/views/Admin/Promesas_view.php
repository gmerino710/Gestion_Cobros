
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
            <a title="Nuevo Uusario" href="<?=base_url()?>Promesas/nuevo"><button class="btn btn-outline-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              Añadir Usuario <i class="fa fa-plus"></i> 
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
                  <th>Estados</th>
                  <th>Apellido</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
              
                    <?php foreach($administracion as $item):?>
                    <tr>
                    <td><?=$item['id'];?></td>
                    <td><?=$item['Estado'];?></td>
                    <td><?=$item['Descripcion'];?></td>
                    <td><a onclick="return confirm('¿Eliminar element?')" class="btn btn-danger" href="<?=base_url();?>Promesas/eliminar/<?=$item['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <a class="btn btn-warning" href="<?=base_url()?>Promesas/editar/<?=$item['id']?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
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
