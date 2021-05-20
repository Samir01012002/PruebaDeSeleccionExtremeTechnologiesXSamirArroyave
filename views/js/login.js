$(document).ready(function() {
  $('#loginform').submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: 'views/handlers/loginHandler.php',
      data: $(this).serialize(),
      success: function(response){
        var jsonData = JSON.parse(response);
        localStorage.setItem('userData', jsonData.data);
        if (jsonData.success) {
          location.href = location.href;
        }else{
          alert('Error al loguearse');
        }
      }
    });
  });
});
