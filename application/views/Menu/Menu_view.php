  <!-- Main content -->
  <section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
         
              <h3>Administración de menu</h3>
            
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="tb table table-bordered table-responsive-sm">
                <thead>
                <tr>
                  <th>Id_meu</th>
                  <th>Menu</th>
                  <th>url</th>
                  <th> Icono </th>
                  <th>id_padre</th>
                  <th>Editar</th>
              
                </tr>
                </thead>
                <tbody>
                <?php foreach($menu as $item):?>
                <tr>
                <td><?=$item['id_menu'];?></td>
                <td><?=$item['nombre_menu'];?></td>
                <td><?=$item['url'];?></td>
                <td><?=$item['fa'];?></td>
                <td><?=$item['id_padre'];?></td>
                <td><a  title="Asignar permisos" class="btn btn-primary"  href="<?=base_url();?>Menu/editar/<?=$item['id_menu'];?>"><i class="fa fa-edit"></i></a></td>
                
                </tr>
                <?php endforeach;?>
                </tbody>
               
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>



    </section>    