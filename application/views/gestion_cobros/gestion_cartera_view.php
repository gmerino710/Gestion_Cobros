 <!-- Main content -->
 <section class="content  ">
      <div class="row">
        <div class="col-12">
          <div class="card " >
          <div class="card-header text-white bg-primary mb-1"> Busqueda por cartera <i class="fa fa-users" aria-hidden="true"></i> </div> 
            <!-- /.card-header -->
            <div class="card-body ">
            <?=form_open('cobros');?>

            <div class="input-group">
               
                    <select  id="busqueda_select" name="filtro_cartera_select" class="ml-3  browser-default custom-select form-control">
                        
                        <?php foreach($estados as $item):?>
                          <option value="" selected disabled hidden>Selecione una cartera</option>
                                <option value="<?=$item['Cod_catera'];?>">
                                  <?=$item['Nombre_Cartera'];?>

                            </option>
                                <?php endforeach;?>  

                        </select>

                       
                        <select id="busqueda" class="ml-3  browser-default custom-select form-control ">
                        

                        </select>
                        
                        <button class="btn btn-primary form-control ml-3 " >Buscar </button>   
     
               </div>
           <?= form_close();?>   
            
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>  

<!-- Main content -->
<section class="content ">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header text-white bg-primary mb-1"> Clientes <i class="fa fa-users" aria-hidden="true"></i> </div> 

            <!-- /.card-header -->
            <div class="card-body">
             <div class="table-responsive text-nowrap">

             <table  class="tb table table-bordered  table-striped">
                <thead>
                <tr>
                										
                <th>Código cliente</th>
                <th>DUI</th>
                <th>Nombre</th>
                <th>Teléfono personal</th>
                <th>Telefono casa</th>
                <th>Teléfono trabajo</th>
                <th>dirección domicilio	</th>
                <th>Lugar de trabajo</th>
                <th>dirección trabajo</th>
                <th>Código gestor</th>
                <th>Cartera</th>
                <th>Acciones</th>
                </tr>
         
                </thead>
                <tbody >
                          <?php if(isset($filtrado)):?>
                            <?php foreach($filtrado as $item):?>
                            <tr>
                              <td> <?=$item['Cod_cliente']?></td>
                              <td> <?=$item['Dui']?></td>
                              <td> <?=$item['Nombre_cliente']?></td>
                              <td> <?=$item['tel_celular']?></td>
                              
                              <td> <?=$item['tel_casa']?></td>
                              <td> <?=$item['Dui']?></td>
                              <td> <?=$item['Dui']?></td>

                              <td> <?=$item['trabajo']?></td>

                              <td> <?=$item['direccion_trabajo']?></td>

                              <td> <?=$item['Gestor']?></td>

                              <td> <?=$item['Cartera']?></td>
                              <td>        

                              <a class="btn btn-primary"  href="<?=base_url();?>cobros/comentario/<?=$item['Cod_cliente']?>" title="Hacer comentario" ><i class="fa fa-edit"></i></a>
                              <a class="btn btn-primary"  href="<?=base_url();?>cobros/crear-promesa/<?=$item['Cod_cliente']?>" title="Hacer promesa de pago" ><i class="fa fa-calendar" aria-hidden="true"></i></a>
  
                            </td>
                           </tr>
                            <?php endforeach;?> 
                          <?php endif;?>     

                </tbody>
               
                
              </table>

             </div> 
              
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>  


    <!--Model -->