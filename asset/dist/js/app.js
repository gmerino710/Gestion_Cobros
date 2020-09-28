$(document).ready(function() {


     var $filtro_gestor= $('#filtro_gestor_select');
     
     const $tb_gestor= $('.tb_gestor').DataTable({
      language :{
            lengthMenu: "Total _MENU_ ",
            zeroRecords: "Sin Informacion",
            info: "Mostrando pagina _PAGE_ de _PAGES_",
            infoEmpty: "Vacio",
            infoFiltered: "(filtered from _MAX_ total records)"
        }
       
      
});


     $filtro_gestor.change(function() {
      let gestor = $(this).val();
      serach_by_id($tb_gestor,9,gestor);
    });



      $('input[name="birthday"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: false,
            locale: {
                  format: 'DD/MM/YYYY'
            },
            drops:'auto',
            opens:'center',
            minYear: 2020,
            maxYear: parseInt(moment().format('YYYY'),10)
          }, function(start, end, label) {
          
          })


          
  


      $('#tb_disc2').DataTable({  // pagincion
            pagingType: "simple_numbers",
            bFilter: false,
            pagination:true,
            language :{
                  lengthMenu: "Total _MENU_ ",
                  zeroRecords: "Ningu dato dispone",
                  info: "Mostrando pagina _PAGE_ de _PAGES_",
                  infoEmpty: "Vacio",
                  infoFiltered: "(filtered from _MAX_ total records)"
              },
              "searching": true,
              "dom": 'tipr',
             
             
            lengthMenu: [[5,10],[5,10]]});
        





      $('#tb_disc').DataTable({  // pagincion
            pagingType: "simple_numbers",
            bFilter: false,
            pagination:true,
            language :{
                  lengthMenu: "Total _MENU_ ",
                  zeroRecords: "Ningu dato dispone",
                  info: "Mostrando pagina _PAGE_ de _PAGES_",
                  infoEmpty: "Vacio",
                  infoFiltered: "(filtered from _MAX_ total records)"
              },
              "searching": true,
              "dom": 'tipr',
             
             
            lengthMenu: [[5,10],[5,10]]});
      
      // definir tipo de cambiod
            $.extend( $.fn.dataTable.defaults, {
                  ordering:  false,
            
            } );
     
      $('#modal').draggable({
            scroll: true,
            scrollSensitivity: 40,
            scrollSpeed: 40
            });

      $('.tb').DataTable({
            language :{
                  lengthMenu: "Total _MENU_ ",
                  zeroRecords: "Sin Informacion",
                  info: "Mostrando pagina _PAGE_ de _PAGES_",
                  infoEmpty: "Vacio",
                  infoFiltered: "(filtered from _MAX_ total records)"
              }
             
            
      });

   




      

    var esconder =  $('#timer');

    setTimeout(() => {
            
      esconder.hide();

      }, 3000);     



      /// actividades y sub actividades
     var tb_actividad = $('#tb_actividad').DataTable({

      select: true,
        // pagincion
        pagingType: "simple_numbers",
        lengthMenu: [[5,10],[5,10]],
        language :{
            lengthMenu: "Total _MENU_ ",
            zeroRecords: "Sin informacion",
            info: "Mostrando pagina _PAGE_ de _PAGES_",
            infoEmpty: "Vacio",
            infoFiltered: "(filtered from _MAX_ total records)"
        }
   });
   tb_actividad.select.info( false); 
// formular parapintar
   function serach(table,id) {
      // con eso buscas
      table.column( 0 ).search(id).draw();
  }  

  // formular parapintar
  function serach_by_id(table,index,id) {
      // con eso buscas
      table.column( index ).search(id).draw();
  } 

  var tb_sub_actividad = $('#tb_sub').DataTable({  // pagincion
      pagingType: "simple_numbers",
      lengthMenu: [[5,10],[5,10]],
      select: true,
      bFilter: true,
      language :{
            lengthMenu: "Total _MENU_ ",
            zeroRecords: "Ningu dato dispone",
            info: "Mostrando pagina _PAGE_ de _PAGES_",
            infoEmpty: "Vacio",
            infoFiltered: "(filtered from _MAX_ total records)"
        }});






      // evento de selccion
   tb_actividad.on('click', 'tr', function () {

      var rows = tb_actividad.rows(this).data();

      
      var id= rows[0][0];
  
      
      serach(tb_sub_actividad,id);
  });
  
      //filstros

      $('#tb_sub_filter').css('display','none');


      
  
     
          

});