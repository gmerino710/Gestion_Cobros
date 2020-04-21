$(document).ready(function() {
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
                  zeroRecords: "Ningu dato dispone",
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
            zeroRecords: "Ningu dato dispone",
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

  var tb_sub_actividad = $('#tb_sub').DataTable({  // pagincion
      pagingType: "simple_numbers",
      language :{
            lengthMenu: "Total _MENU_ ",
            zeroRecords: "Ningu dato dispone",
            info: "Mostrando pagina _PAGE_ de _PAGES_",
            infoEmpty: "Vacio",
            infoFiltered: "(filtered from _MAX_ total records)"
        },
      lengthMenu: [[5,10],[5,10]]});

   // evento de selccion
   tb_actividad.on('click', 'tr', function () {

      var rows = tb_actividad.rows(this).data();

      
      var id= rows[0][0];
  
      
      serach(tb_sub_actividad,id);
  });
  
      //filstros

      $('#tb_sub_filter').css('display','none');
  
   
});