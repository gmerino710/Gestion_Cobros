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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id_meu</th>
                  <th>Menu</th>
                  <th>url</th>
                  <th> Icono </th>
                  <th>id_padre</th>
              
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
                
                </tr>
                <?php endforeach;?>
                </tbody>
               
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>



    </section>    