<!-- Main content -->
<section class="content h-100 ">
      <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-10 col-sm-12">
          <div class="card">
          <?php if(isset($old)):?>    
          <div class="card-header">

            <h4>Actualizar <i class="fa fa-edit"></i>  </h4>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
       
                <?=form_open('parametros/nuevo');?>
             <?php foreach($old as $items):?>

                    <div class="form-group row mt-1">
                    <label for="nombre" class="col-sm-4 col-form-label">Descripcion del parametro</label>
                        <div class="col-sm-12">
                        <?php echo form_error('des'); ?>
                    
                        <input type="text" class="form-control" value="<?=$items['descripcion'];?>" id="des" name="des" placeholder="Ingrese descripcion del campo">
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                    <label for="nombre" class="col-sm-4 col-form-label">Valor del parametro</label>
                        <div class="col-sm-12">
                        <?php echo form_error('param'); ?>
                    
                        <input type="text" class="form-control" value="<?=$items['valor'];?>" id="parametro" name="param" placeholder="Ingrese el valor del parametro">
                        </div>
                    </div>
                 

                    <div class="row mt-4">
                        <div class="col col-md-6 col-sm-6">
                        <input type="submit" value="Actualizar"  name="update" id="update" class="btn btn-primary  btn-block"/>  
                        <input type="hidden" value="<?=$items['id'];?>" name="id" class="btn btn-primary  btn-block"/>
                        

                        </div>
                        <div class="col col-md-6 col-sm-6">

                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>parametros" >Cancelar </a>  

                    </div>
                 </div>   
        <?php endforeach;?>                             

          <?=form_close();?>   

         <?php endif;?>          
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>   
