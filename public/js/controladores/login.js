const loginButton = document.getElementById('loginButton');

$("#mensajeError").hide();
loginButton.addEventListener('click', function(event) {
  event.preventDefault(); // Evita que el formulario se envíe automáticamente

  const user = document.getElementById('username_login').value;
  const password = document.getElementById('password_login').value;
  
  const formData = new FormData();
  formData.append('usuario_cuenta', user);
  formData.append('usuario_clave', password);
    
  fetch('/acceso', {
    method: 'POST',
    body: formData
  })
  .then(response => {     
    if (response.ok) {
      response.json().then(data => {
        if (data && data.token && data.usuario_id) {          
          localStorage.setItem('token', data.token);
          localStorage.setItem('id', data.usuario_id);
          window.location.href = "/examenes";
        }
      });
    } else {					
      response.json().then(errorJson => {          
        if (errorJson.usuario_clave || errorJson.usuario_cuenta) {
          $("#mensajeError").text('Ingrese sus credenciales');
          $("#mensajeError").show();
        } else {
          $("#mensajeError").text(errorJson.error);
          $("#mensajeError").show();
        }
      });
    }
  })
  .catch(error => {
    console.error('Error al iniciar sesión:', error);
  });
});