$(document).ready(function() {
    $('#logoutForm').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: 'views/handlers/loginHandler.php?logout',
        success: function(response){
					location.href = location.href;
        }
      });
    });
  });
  