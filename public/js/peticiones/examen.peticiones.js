class Examen_Peticiones {

    async fetchResultBuscar(detalle) {
        debugger     
        try {
            const response = await fetch('/examenes/' + detalle, {
                method: 'GET',                
            });
            const jsonResult = await response.json();
            return jsonResult;
        } catch (error) {
            console.error('Error al obtener respuesta de la API:', error);
            throw error;
        }
    };

    async fetchResultEnviar(data, id) {
        try {
            const response = await fetch('/examen/'+id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)    
            });
            const jsonResult = await response.json();
            // debugger
            return jsonResult;
        } catch (error) {
            console.error('Error al obtener respuesta de la API:', error);
            throw error;
        }
    };
}
export default Examen_Peticiones;