$(document).ready(function() {
     
      $('#modal').draggable({
            scroll: true,
            scrollSensitivity: 40,
            scrollSpeed: 40
            });

      $('.tb').DataTable();

      $('#tb').DataTable();

    var esconder =  $('#timer');

    console.log(esconder);
    

    setTimeout(() => {
            
      esconder.hide();

      }, 3000);     

   
});