

<video id="video" width="640" height="480" autoplay></video>
<button id="snap">Snap Photo</button>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$('#snap').on('click', function(e){
 $data = e.originalEvent.target.files[0];
  $reader = new FileReader();
  reader.onload = function(evt){
  $('#your_img_id').attr('src',evt.target.result);
  reader.readAsDataUrl($data);
}});

</script>