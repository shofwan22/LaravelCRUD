$(document).ready(function(){
	$('#addfile').change(function(){
      var size = $('#addfile')[0].files[0].size;
      var tipe = $('#addfile').val().split('.').pop().toLowerCase();
      var nama = $('#addfile').val();
      if($.inArray(tipe, ['jpg','png','jpeg']) == -1 || size>5097152){
        $('#addfile').val('');
        $('#adddash').css('border','4px dashed red');
        $('#addsub').prop('disabled',true);
        $('#addisi').text('Drag your files here or click in this area.');
        swal('','Max size: 5 MB. Only JPG,PNG,JPEG !','error');
      } else{
        $('#addisi').text(nama);
        $('#adddash').css('border','4px dashed green');
        $('#addsub').prop('disabled',false);
      }
    });
});

$('.datepicker').datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true,	      
});