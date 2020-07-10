

$('#submit').click(function(){
    var doctor = $('#c_doctor').val();
    var spec = $('#specialty').val();
    var prn = $('#prn').text().trim();
    var cat = $('#category').val();
   if(doctor != null && spec != null && prn != null && cat != null){
       var conf = confirm("Are you sure you want to post this patient to the doctor?");
       if(conf){
           $.ajax({
               type : "POST",
               url : "../model/fd/fd_post_existing_patient.php",
               data : {prn : prn, spec : spec, cat : cat, doctor : doctor},
               //dataType : 'json',
               success : function(data){
                $('#workspace').load('fd/fd_post_existing_patient.php');
                $('#tsuccess').html('<div class="alert alert-success"><strong>Patient posted successfully!</strong></div>')
            
                setTimeout(function () { 
                    $('#tsuccess').empty(); 
                   }, 5000);
            
            },
               fail : function(data){
                   alert('fail');
               }
           });
       }
   }

});


