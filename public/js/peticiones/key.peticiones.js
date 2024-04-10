class Key_Peticiones {
    async fetchResultGenerar(data) {
        try {            
            const token = localStorage.getItem('token');
            const headers = {'Content-Type': 'application/json'};
    
            if (token) {
                headers['Authorization'] = `Bearer ${token}`;
            }
            const response = await fetch('/key', {
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
export default Key_Peticiones;