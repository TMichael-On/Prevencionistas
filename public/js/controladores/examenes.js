import Examen_Peticiones from "../peticiones/examen.peticiones.js";
import Key_Peticiones from "../peticiones/key.peticiones.js";

const objExamen = new Examen_Peticiones();
const objKey = new Key_Peticiones();

var detalle = $("#detalle");
var btnBuscar = $("#btnBuscar");
var table;

//#region Metodos para inicializar la TABLE examen
let dataExamen = {
    headings: ['Id', 'Examen', 'Fecha de apertura', 'Fecha de cierre', 'Opciones'],
};

var opciones = {
    searchable: false,
    data: dataExamen,
    columns: [
        {
        select: 4,
        render: function(data, td, id, cellIndex) {
            if(data.length !== 0){
                return `<button type='button' class='btn btn-primary btn-sm ms-2 btn-ingresar' data-row='${[data[0].data]}'>Ingresar</button>`;
            }
        }}
    ]
}

$(document).ready(function() {
    if (simpleDatatables) {
        table =  new simpleDatatables.DataTable('#tablaExamen', opciones);
    }
    if(typeof data_examen !== 'undefined'){
        table.insert(data_examen);
    }

    $(document).on("click", ".btn-ingresar", async function() {
        $("#layoutSidenav_content").LoadingOverlay("show");
        var btn = $(this);
        var data = btn.data("row");
        var d ={"examen_id": data}        
        try {      
            const jsonData = await objKey.fetchResultGenerar(d);
            $("#layoutSidenav_content").LoadingOverlay("hide");
            if (jsonData.error) {
                Swal.fire({
                    title: 'Error',
                    text: jsonData.error,
                    icon: 'error',
                    confirmButtonText: 'OK',
                });
            } else{
                localStorage.setItem('key', jsonData.token);
                window.location.href = '/examen/'+data;
                // Key-Examen
            }
        } catch (error) {
            console.error('Error al obtener los datos:', error);
        }
    });
});
//#endregion

btnBuscar.on("click", async function() {
    try {        
        const jsonData = await objExamen.fetchResultBuscar(detalle.val())
        if (table.hasRows) {            
            table.data.data = []
            table.refresh()
            table.insert(jsonData);
        } else{
            table.insert(jsonData);
        }
    } catch (error) {
        console.error('Error al obtener datos: ', error);
    }
});