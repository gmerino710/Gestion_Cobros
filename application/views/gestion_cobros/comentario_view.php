
 <!-- Main content -->
 <?php foreach($filtrado as $item):?> 
  <?php if(empty($item['Comentario_cuenta'])):?> 
        <section class="content  ">
              <div class="row">
                <div class="col-md-12">
                <?php if($this->session->flashdata('errr')):?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('errr'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>   
                </div>
                <?php endif;?>
                
                  <div class="card " >
                  

                      
                            <div class="card-header text-white bg-primary mb-1"> Nombre de cliente :<?=$item['Nombre_cliente']?>- Codigo de cliente: <?=$item['Cod_cliente'];?> <i class="fa fa-user" aria-hidden="true"></i> </div> 
                            <!-- /.card-header -->
                            <div class="card-body ">
                          
                            <H3>Añadir comentario <i class="fa fa-edit"></i></H3>
                            <?=form_open('cobros/comentario/'.$id);?>
                            
                            <div class="form-group">
                            
                            <textarea name="comentario"  class="form-control" id="exampleFormControlTextarea3" rows="7"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info"> Añadir  comentario</button>
                            <a href="<?=base_url()?>cobros" class="btn btn-danger"> Cancelar</a>

                            <?= form_close();?>
                            </div>
                    
                    
                    


                    
                    <!-- /.card-body -->
            
                  </div>
                </div>
              </div> 
        </section>  
    <?php else :?> 
      <section class="content  ">
              <div class="row">
                <div class="col-md-8">

                      <div class="card-deck">
                    
                        <div class="card">
                        <div class="card-header text-white bg-primary mb-1"> Nombre de cliente :<?=$item['Nombre_cliente']?>- Codigo de cliente: <?=$item['Cod_cliente'];?> <i class="fa fa-user" aria-hidden="true"></i> </div> 
                          <div class="card-body">
    
                            <h5 class="card-title">Nota Peramente </h5>
                         
                            <p class="card-text"><?=$item['Comentario_cuenta'];?> </p>
                            <p class="card-text"><small class="text-muted"><?=$item['fecha_de_modificacion'];?></small></p>
                          </div>
                          <div class="card-footer ">
                         <a href="<?=base_url()?>cobros" class="btn btn-danger"> Regresar</a>
                      </div>
                        </div>
                      
        
                  </div>
                 
                  
        
                </div>
              </div>

             

      </section>
   <?php endif;?>
<?php endforeach;?> 