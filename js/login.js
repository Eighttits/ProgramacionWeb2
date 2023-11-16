src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"

$(document).ready(function(){
  $('.user').submit(function(e){
    e.preventDefault();
    var user = $('#exampleInputEmail').val();
    var password = $('#exampleInputPassword').val();
    
    var formData = {
      user: user,
      password: password
    };

    $.ajax({
      url: "../../controller/login/logincontroller.php", 
      method: 'POST',
      data: formData,
      dataType: 'json',
      success: function (response) {
        console.log(response);

        if (response.status === 'success') {
          alert('Inicio de sesión exitoso');
          window.location.href = 'index.php';
        } else {
          alert('Error al iniciar sesión');
        }
      },
      error: function (e) {
        console.log('Error en ajax');
        console.log(e);
      },
    });
  });
});

