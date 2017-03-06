// ////////
// ajax
// ////////
$('#submitButton').click(function(){
  var data = $('form').serialize();
  $.ajax({
    data: data,
    type: "post",
    url: "php/post.php",
    success: function(data){
      alert("data save: " + data);
    }
  })
})
