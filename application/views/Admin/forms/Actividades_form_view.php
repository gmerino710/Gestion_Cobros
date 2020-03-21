
    <!-- Main content -->
    <section class="content h-100 ">
      <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-10">
          <div class="card">
          <?php if(isset($old)):?>    
          <div class="card-header">

            <h4>Actualizar <i class="fa fa-edit"></i>  </h4>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
       
                <?=form_open('actividades/nuevo_elemento');?>
             <?php foreach($old as $items):?>

                    <div class="form-group row mt-1">
                    <label for="nombre" class="col-sm-2 col-form-label">Actividad</label>
                        <div class="col-sm-12">
                        <?php echo form_error('actividad'); ?>
                    
                        <input type="text" class="form-control" value="<?=$items['Actividad'];?>" id="actividad" name="actividad" placeholder="Añadir Actividad">
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                    <?php echo form_error('estado'); ?>
                            <label for="estado"  class="col-sm-2 col-form-label">Estado</label>    
                            <div class="col-sm-12">
                                <select id="estado" name="estado"  class="form-control">
                                <?php foreach($estados as $item):?>
                                  <option value="<?=$item['Cod_estado'];?>"><?=$item['estado'];?></option>
                                <?php endforeach;?>   
                                </select>
                            </div>    
                    </div>


                    <div class="row mt-4">
                        <div class="col col-md-6 col-sm-12">
                        <input type="submit" value="Actualizar"  name="update" id="update" class="btn btn-primary  btn-block"/>  
                        <input type="hidden" value="<?=$items['Cod_act'];?>" name="id" class="btn btn-primary  btn-block"/>
                        

                        </div>
                        <div class="col col-md-6 col-sm-12">

                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>actividades" >Cancelar </a>  

                    </div>
                 </div>   
        <?php endforeach;?>                             

          <?=form_close();?>   


       <?php else:?>
        <div class="card-header">

        <h4>Añadir <i class="fa fa-edit"></i>  </h4>
  
       </div>
       <div class="card-body ">     
                <?=form_open('actividades/nuevo_elemento');?>


                <div class="form-group row mt-1">
                <label for="nombre" class="col-sm-2 col-form-label">Actividad</label>
                    <div class="col-sm-12">
                    <?php echo form_error('actividad'); ?>
                 
                    <input type="text" class="form-control"  value="<?=set_value('actividad')?>" id="actividad" name="actividad" placeholder="Añadir actividad">
                    </div>
                </div>

                <div class="form-group row mt-1">
                <?php echo form_error('estado'); ?>
                        <label for="estado"  class="col-sm-2 col-form-label">Estado</label> 
                        <div class="col-sm-12">    
                            <select id="estado" name="estado"  class="form-control">
                            <?php foreach($estados as $item):?>
                              <option value="<?=$item['Cod_estado'];?>"><?=$item['estado'];?></option>
                            <?php endforeach;?>   
                        </select>
                        </div> 
                </div>

              
                <div class="row mt-4">
                    <div class="col col-md-6 col-sm-12">
                    <button type="submit" class="btn btn-primary  btn-block">Agregar</button>

                    </div>
                    <div class="col col-md-6 col-sm-12">

                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>actividades" >Cancelar </a> 

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