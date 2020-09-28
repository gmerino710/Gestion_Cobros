
<?php if($resultado):?>

  <section class="content">
 
 <div class="container-fluid">
   <h2>Gestiones</h2>
     <!-- Small boxes (Stat box) -->
     <div class="row">
  <?php if(array_key_exists(0,$conteos)):?>
    <?php if($conteos[0]['Estado'] == 'Completada'):?>
       <div class="col-lg-3 col-6">
         <!-- small box -->
        
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$conteos[0]['Cantidad'];?></h3>

                <p><?=$conteos[0]['Estado'];?></p>
              </div>
              <div class="icon">
                <i class="ion ion-checkmark-round"></i>
              </div>
              <a href="<?=base_url();?>cobros/crear-promesa/<?=$this->usuario['usuario'];?>/<?=$conteos[0]['Estado'];?>" class=" btn small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php elseif($conteos[0]['Estado'] == 'Con acuerdo'):?>
        <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-info">
           <div class="inner">
           <h3><?=$conteos[0]['Cantidad'];?></h3>

           <p><?=$conteos[0]['Estado'];?></p>
          </div>
           <div class="icon">
             <i class="ion ion-clock"></i>
           </div>
           <a  href="<?=base_url();?>cobros/crear-promesa/<?=$this->usuario['usuario'];?>/<?=$conteos[0]['Estado'];?>" class="btn small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <?php elseif($conteos[0]['Estado'] == 'Incumplida'):?>
        <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-danger">
           <div class="inner">
           <h3><?=$conteos[0]['Cantidad'];?></h3>

           <p><?=$conteos[0]['Estado'];?></p>
          </div>
           <div class="icon">
             <i class="ion ion-close"></i>
           </div>
           <a href="<?=base_url();?>cobros/crear-promesa/<?=$this->usuario['usuario'];?>/<?=$conteos[0]['Estado'];?>" class=" btn small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
    
       <?php endif;?> 

       
      
  <?php endif;?> 
       <!-- ./col -->
       <?php if(array_key_exists(1,$conteos)):?>
        <?php if($conteos[1]['Estado'] == 'Con acuerdo'):?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?=$conteos[1]['Cantidad'];?></h3>

              <p><?=$conteos[1]['Estado'];?></p>
              </div>
              <div class="icon">
                <i class="ion ion-clock"></i>
              </div>
              <a href="<?=base_url();?>cobros/crear-promesa/<?=$this->usuario['usuario'];?>/<?=$conteos[1]['Estado'];?>" class="btn small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php else:?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?=$conteos[1]['Cantidad'];?></h3>

              <p><?=$conteos[1]['Estado'];?></p>
              </div>
              <div class="icon">
                <i class="ion ion-close"></i>
              </div>
              <a href="<?=base_url();?>cobros/crear-promesa/<?=$this->usuario['usuario'];?>/<?=$conteos[1]['Estado'];?>" class="btn small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endif;?>  
        
      
      <?php endif;?> 
         <!-- ./col -->
         <?php if(array_key_exists(2,$conteos)):?>
       <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-danger">
           <div class="inner">
           <h3><?=$conteos[2]['Cantidad'];?></h3>

            <p><?=$conteos[2]['Estado'];?></p>
           <div class="icon">
             <i class="ion ion-close"></i>
           </div>
         </div>
         <a href="<?=base_url();?>cobros/crear-promesa/<?=$this->usuario['usuario'];?>/<?=$conteos[2]['Estado'];?>" class=" btn small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>

       </div>
       </div>

      
      <?php endif;?> 
       <!-- ./col -->
     </div>
   
 </section>



<?php else:?>
  <section class="content">
 
 <div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row">
       <div class="col-lg-3 col-6">
         
       </div>
     </div>
 </div>
  </section>

<?php endif; ?>

