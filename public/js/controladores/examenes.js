import Examen_Peticiones from "../peticiones/examen.peticiones.js";

const examenObj = new Examen_Peticiones();

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

    $(document).on("click", ".btn-ingresar", function(event) {
        debugger
        var btn = $(this);
        var data = btn.data("row");
        window.location.href = '/examen';
    });
});
//#endregion

btnBuscar.on("click", async function() {
    try {        
        const jsonData = await examenObj.fetchResultBuscar(detalle.val())
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

// var tablaUsuario = document.getElementById("tablaUsuario");
// table.on("click", function(event) {  
//     if (event.target.classList.contains("btn-ingresar")) {           
//         var btn = event.target;
//         var data = btn.getAttribute("data-row");
//         window.location.href = '/venta-up/'+data;
//     }
// });