class Usuario_Peticiones {
    // LISTAR USUARIO
    async fetchResultListar(detalle) {        
        try {
            const response = await fetch('/prueba/usuario/' + detalle, {
                method: 'GET',                
            });
            const jsonResult = await response.json();
            return jsonResult;
        } catch (error) {
            console.error('Error al obtener respuesta de la API:', error);
            throw error;
        }
    };

    async fetchResultListarById(id) {        
        try {
            const response = await fetch('/prueba/usuarioId/' + id, {
                method: 'GET',                
            });
            const jsonResult = await response.json();
            return jsonResult;
        } catch (error) {
            console.error('Error al obtener respuesta de la API:', error);
            throw error;
        }
    };
}
export default Usuario_Peticiones;