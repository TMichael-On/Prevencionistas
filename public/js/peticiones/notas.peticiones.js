class Notas_Peticiones {
    async fetchResultlist() {
        try {            
            const token = localStorage.getItem('token');
            const headers = {'Content-Type': 'application/json'};
    
            if (token) {
                headers['Authorization'] = `Bearer ${token}`;
            }
            const response = await fetch('/nota', {
                method: 'GET',
                headers: headers,
            });
            const jsonResult = await response.json();
            return jsonResult;
        } catch (error) {
            console.error('Error al obtener respuesta de la API:', error);
            throw error;
        }
    };
}
export default Notas_Peticiones;