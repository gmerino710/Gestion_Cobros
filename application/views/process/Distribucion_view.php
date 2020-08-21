 <!-- Main content -->
 <section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">
              <table  id="tb_disc" class=" table table-bordered table-responsive-sm">
                <thead>
             


                <div class="form-group">
                <label for="busqueda">Selecione la cartera</label>

                <select id="busqueda" class="browser-default custom-select ">
                        <option selected>Selecione la cartera </option>
                        <?php foreach($estados as $item):?>
                                  
                                  <option value="<?=$item['Cod_catera'];?>">
                      <?=$item['Cod_catera'];?>

                            </option>
                                <?php endforeach;?>  

                        </select>
                            
                </div>
                <tr>
                    
                  <th>Id</th>
                  <th>nombre</th>
                  <th>Estados</th>
                  <th>Creacion</th>
                </tr>
                </thead>
                <tbody>
                
                  
                  
                </tbody>
               
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>  


    <!--Model -->