import Notas_Peticiones from "../peticiones/notas.peticiones.js";

const objNotas = new Notas_Peticiones();
var table;

//#region Metodos para inicializar la TABLE examen
let dataExamen = {
    headings: ['Id', 'Examen', 'N° de intentos', 'Nota'],
};

var opciones = {
    searchable: false,
    data: dataExamen,
}

$(document).ready(function() {
    $("#layoutSidenav_content").LoadingOverlay("show");  
    if (simpleDatatables) {
        table =  new simpleDatatables.DataTable('#tablaNotas', opciones);
    }
    (async function() {
        try {
            const jsonData = await objNotas.fetchResultlist();            
            if (jsonData.error) {
                Swal.fire({
                    title: 'Error',
                    text: jsonData.error,
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonText: 'Log in',
                    cancelButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/";
                    }
                });
            } else{
                table.insert(jsonData);    
            }
            $("#layoutSidenav_content").LoadingOverlay("hide");  
        } catch (error) {
          console.error('Error al obtener los datos:', error);
        }
    })();
});
//#endregion