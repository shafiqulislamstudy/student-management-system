
jQuery('document').ready(function(){

  jQuery('.select2').select2();
  jQuery('.select3').select2();



    jQuery("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  
      jQuery('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
});

function preview() {
  previewImg.src=URL.createObjectURL(event.target.files[0]);
}


    
