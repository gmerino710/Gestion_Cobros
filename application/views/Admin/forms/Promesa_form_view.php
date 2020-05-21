
    <!-- Main content -->
    <section class="content h-80 ">
      <div class="row  h-100 justify-content-center align-items-center">
        <div class=" col-md-10 col-sm-12 ">
          <div class="card">
          <?php if(isset($old)):?>    
          <div class="card-header">

            <h4>Actualizar <i class="fa fa-edit"></i>  </h4>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
       
                <?=form_open('Promesas/nuevo_elemento');?>
             <?php foreach($old as $items):?>

              <div class="form-group row mt-1">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-12">
                    <?php echo form_error('Nombre'); ?>
                 
                    <input type="text" class="form-control"  value="<?=$items['Nombre'];?>" id="nombre" name="nombre" placeholder="Nombre de promesa pago">
                    </div>
                </div>

                <div class="form-group row mt-1">
                <label for="nombre" class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-12">
                    <?php echo form_error('Descripcion'); ?>
                 
                    <input type="text" class="form-control"  value="<?=$items['descripcion'];?>" id="descrip" name="descrip" placeholder="Descripcion de promesa de pago">
                    </div>
                </div>

                <div class="form-group row mt-1">
             
              
                        <label for="estado"  class="col-sm-2 col-form-label">Estado</label> 
                        <div class="col-sm-12">  
                        
                      

                            <select id="estado" name="estado"  class="form-control">
                            <?php echo form_error('estado'); ?>
                            <?php foreach($estados as $item):?>
                              
                              <option value="<?=$item['Cod_estado'];?>"
                              <?php if($item['Cod_estado']==$items['Estado'] ):?> selected <?php endif;?>
  >
                                <?= $item['estado'];?>

                            </option>
                            <?php endforeach;?>   
                        </select>
                        </div> 
                   </div>


                    <div class="row mt-4">
                        <div class="col col-md-6 col-sm-6">
                        <input type="submit" value="Actualizar"  name="update" id="update" class="btn btn-primary  btn-block"/>  
                        <input type="hidden" value="<?=$items['id'];?>" name="id" class="btn btn-primary  btn-block"/>
                        

                        </div>
                        <div class="col col-md-6 col-sm-6">

                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>Promesas">Cancelar </a>  

                    </div>
                 </div>   
        <?php endforeach;?>                             

          <?=form_close();?>   


       <?php else:?>
        <div class="card-header">

        <h4>Añadir <i class="fa fa-edit"></i>  </h4>
  
       </div>
       <div class="card-body ">     
                <?=form_open('Promesas/nuevo_elemento');?>


                <div class="form-group row mt-1">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-12">
                    <?php echo form_error('Nombre'); ?>
                 
                    <input type="text" class="form-control"  value="<?=set_value('Nombre')?>" id="nombre" name="nombre" placeholder="Nombre de promesa pago">
                    </div>
                </div>

                <div class="form-group row mt-1">
                <label for="nombre" class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-12">
                    <?php echo form_error('Descripcion'); ?>
                 
                    <input type="text" class="form-control"  value="<?=set_value('Descrip')?>" id="descrip" name="descrip" placeholder="Descripcion de promesa de pago">
                    </div>
                </div>

                <div class="form-group row mt-1">
             
              
                        <label for="estado"  class="col-sm-2 col-form-label">Estado</label> 
                        <div class="col-sm-12">  
                        
                        <?php echo form_error('estado'); ?>
                            <select id="estado" name="estado"  class="form-control">
                            <option value="" selected></option>
                            <?php foreach($estados as $item):?>
                           
                              <option value="<?=$item['Cod_estado'];?>"><?=$item['estado'];?></option>
                            <?php endforeach;?>   
                        </select>
                        </div> 
                </div>

              
                <div class="row mt-4">
                    <div class="col col-md-6 col-sm-6">
                    <button type="submit" class="btn btn-primary  btn-block">Agregar</button>

                    </div>
                    <div class="col col-md-6 col-sm-6">

                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>acciones" >Cancelar </a> 

                   </div>
                </div>   
              
               
                <?= form_close();?>    

         <?php endif;?>          
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>   
