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
              <a title="Nuevo Uusario" href="<?=base_url()?>usuarios/nuevo"><button class="btn btn-outline-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              Añadir Usuario <i class="fa fa-plus"></i> 
              </button>  
            </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbt" class="table table-bordered table-responsive-sm ">
                <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Nombre</th>
                  <th> Estado </th>
                  <th>Acciones</th>
              
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $item):?>
                <tr>
                <td><?=$item['Usuario'];?></td>
                <td><?=$item['Rol'];?></td>
                <td><?=$item['Nombre'];?></td>
                <td><?=$item['Estado'];?></td>
                <td>
                <a class="btn btn-danger" id="usr"  onclick="return confirm('¿Eliminar element?')" href="<?=base_url()?>usuarios/delete/<?=$item['Id']?>">  
                <i class="fas fa-trash"> </i>
                </a>  
              
                <a href="<?=base_url()?>usuarios/user_edit/<?=$item['Id']?>"><button  title="Editar" type="button" class="btn btn-warning">
                  <i class="fa fa-edit" aria-hidden="true"></i></button></a>
                </tr>
                <?php endforeach;?>
                </tbody>
               
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>

          

    </section>    