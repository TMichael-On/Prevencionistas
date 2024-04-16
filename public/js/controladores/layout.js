$(document).ready(function() {
    var valorUsuario = sessionStorage.getItem('usuario');
    if (valorUsuario) {
        $('#nav-usuario').text(valorUsuario)    
    }
})