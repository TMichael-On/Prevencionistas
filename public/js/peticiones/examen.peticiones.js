class Examen_Peticiones {

    async fetchResultBuscar(detalle) {             
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

    async fetchResultListar(id) {
        try {
            const token = localStorage.getItem('token');
            const key = localStorage.getItem('key');
            const headers = {'Content-Type': 'application/json'};
    
            if (token) {
                headers['Authorization'] = `Bearer ${token}`;
            }
            if (key){
                headers['key-Examen'] = key;
            }            
            const response = await fetch('/examen/'+id, {
                method: 'POST',
                headers: headers,
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
            const token = localStorage.getItem('token');
            const headers = {'Content-Type': 'application/json'};
    
            if (token) {
                headers['Authorization'] = `Bearer ${token}`;
            }
            const response = await fetch('/nota/'+id, {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(data)    
            });
            const jsonResult = await response.json();
            return jsonResult;
        } catch (error) {
            console.error('Error al obtener respuesta de la API:', error);
            throw error;
        }
    };
}
export default Examen_Peticiones;