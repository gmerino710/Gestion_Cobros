
    <!-- Main content -->
    <section class="content h-100 ">
      <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-10 col-sm-12">
          <div class="card">
            <div class="card-header">

            <h4>Actualizar <i class="fa fa-edit"></i>  </h4>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <?=form_open('gestores/actualizar');?>
        
      <?php foreach($old as $items):?>
                <div class="form-group row mt-1">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-12">
                    <?php echo form_error('nombre'); ?>
                 
                    <input type="text" class="form-control"  value="<?=$items['Nombre']?>" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                </div>

                

                
                <div class="form-group row mt-1">          
                <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>      
                    <div class="col-sm-12">
                    <?php echo form_error('apellido'); ?>
                   
                    <input type="text" class="form-control"  value="<?=$items['Apellido']?>" id="apellido" name="apellido" placeholder="Apellido">
                   
                  </div>
               

                </div>

                <div class="form-group row mt-1">
                <?php echo form_error('estado'); ?>
                        <label for="estado"  class="col-sm-2 col-form-label">Estado</label>  
                        <div class="col-sm-12">   
                            <select id="estado" name="estado"  class="form-control">
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
                    <button type="submit" value="<?= $items['Cod_Gestores'];?>" name="id" class="btn btn-primary  btn-block">Agregar</button>

                    </div>
                    <div class="col col-md-6 col-sm-6">

                  <a  href="<?=base_url()?>gestores" class="btn btn-danger  btn-block">Cancelar</a>

                </div>
                </div>   
                

               
                <?= form_close();?>    
            </div>

      <?php endforeach;?>   
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>   
