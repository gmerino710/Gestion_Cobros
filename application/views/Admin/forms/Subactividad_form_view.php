
    <!-- Main content -->
    <section class="content h-100 ">
      <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-10 col-sm-12">
          <div class="card">
            <div class="card-header">

            <h4>Añadir <i class="fa fa-edit"></i>  </h4>      
                    
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <?=form_open('actividades/subactividad/nuevo_elemento');?>
        

                <div class="form-group row mt-1">
                <label for="nombre" class="col-sm-2 col-form-label">Subactividad</label>
                    <div class="col-sm-12">
                    <?php echo form_error('nombre'); ?>
                 
                    <input type="text" class="form-control"  value="<?=set_value('Nombre')?>" id="nombre" name="nombre" placeholder="Ingrese la subactividad">
                    </div>
                </div>


                <div class="form-group row mt-1">
                <?php echo form_error('actividad'); ?>
                        <label for="actividad"  class="col-sm-2 col-form-label">Actividades</label>    
                        <div class="col-sm-12">                        
                        <select id="actividad" name="actividad"  class="form-control">
                            <?php foreach($actvity as $item):?>
                              <option value="<?=$item['Cod_act'];?>"><?=$item['Actividad'];?></option>
                            <?php endforeach;?>   
                        </select>
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
                    <div class="col col-md-6 col-sm-6">
                    <button type="submit" class="btn btn-primary  btn-block">Agregar</button>

                    </div>
                        <div class="col col-md-6 col-sm-6">

                    <a class="btn btn-danger  btn-block" href="<?=base_url()?>actividades" >Cancelar  </a>  

                        </div>
                </div>   
                

               
                <?= form_close();?>    
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>   