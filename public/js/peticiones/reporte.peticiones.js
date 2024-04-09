class Usuario_Peticiones {
    // LISTAR USUARIO
    async fetchResultListar(data) {        
        try {
            const response = await fetch('/prueba/busqueda', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
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
export default Usuario_Peticiones;