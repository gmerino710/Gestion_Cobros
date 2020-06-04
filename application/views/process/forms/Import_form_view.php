
    <!-- Main content -->
    <section class="content h-100 ">
      <div class="row  h-100 justify-content-center align-items-center">
        <div class=" col-md-7 col-sm-12 ">
          <div class="card">
      
        <div class="card-header">

        <h4>Cargar archivo <i class="fas fa-upload"></i>  </h4>
  
       </div>

          <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php if(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>

    <?php };?>


       <div class="card-body ">     
      <!-- method="post" enctype="multipart/form-data"-->
                <?=form_open('import/subir');?>


                <div class="form-group row mt-1">
                <label for="nombre" class="col-sm-4 col-form-label">Selecionar Archivo</label>
                    <div class="col-sm-12">
                    <?php echo form_error('empresa'); ?>
                 
                    <input type="file" name="file" />


                    </div>
                </div>

              
                <div class="row mt-4">
                    <div class="col col-md-6 col-sm-6">
                    <button type="submit" class="btn btn-primary  btn-block"  value="IMPORT" name="subir">Subir</button>

                    </div>
                    <div class="col col-md-6 col-sm-6">

                    <a  class="btn btn-danger  btn-block" href="<?=base_url()?>" >Cancelar </a> 

                   </div>
                </div>   
              
               
                <?= form_close();?>    


            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> 
    </section>   
    