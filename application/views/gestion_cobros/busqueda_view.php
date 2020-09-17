 <!-- Main content -->
 <section class="content  ">
      <div class="row">
        <div class="col-12">
          <div class="card " >
          <div class="card-header text-white bg-primary mb-1"> Busqueda de cliemtes <i class="fa fa-users" aria-hidden="true"></i> </div> 
            <!-- /.card-header -->
            <div class="card-body ">
      
            <div class="input-group">
                  <input name="buscar" id="input_busqueda" type="text" required class="form-control" placeholder="Sucursal">
                  <button type="button"  id="buscar" value="Buscar" class="btn btn-primary">Buscar</button>
                  

                    <select id="busqueda" class="ml-3  browser-default custom-select ">
               
                            <?php foreach($estados as $item):?>
                                    
                                    <option value="<?=$item['criterio'];?>">
                                      <?=$item['nombre'];?>

                                </option>
                                    <?php endforeach;?>  

                    </select>

          
               </div>
               
           <table   class="table table-bordered table-responsive-sm  table-hover">
               
               
               <div class="form-group"> </div>
            <thead>
             
                <tr>
                  <th>Codigo cliente</th>
                  <th>Dui</th>
                  <th>Nombre</th>
                  <th>Cartera</th>
                </tr>
                </thead>
                              
                  <tbody id="tb_clientes">

                  <!-- this will show our spinner -->
                  <div hidden id="spinner"></div>

                  </tbody>
       </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>  
