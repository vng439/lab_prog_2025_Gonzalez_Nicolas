export const itemService = {

    load: (id) => {
        typeof id !== 'number' && (id = parseInt(id, 10));
        console.log("Cargando el producto con el ID:", id);
        return fetch(`producto/load/${id}`, {
            method: "GET", 
            headers: {
                "Accept": "application/json" 
            }
        })
         .then(response => {
            if (!response.ok) {
                throw new Error('Error en el método. No se pudo cargar el producto');
            }
            return response.json(); 
        })
        .then(data => {
            console.log("Respuesta del back-end:", data);
            if (data.error) {
                throw new Error(data.message || 'No se pudo cargar el producto');
            }
            return data;
        })
        .catch(error => {
            console.error("Error al cargar", error);
        });
    },
    save : (newProduct) => {
        return fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/producto/save", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(newProduct)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("HTTP error: " + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log("Respuesta del back-end:", data);
            return data;
        })
        .catch(error => {
            console.error("ERROR DE PETICIÓN:", error);
            return null;
        });
    },

    update : (updatedProduct) => {
        return fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/producto/update", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(updatedProduct)
        })
        .then(response => {
        if (!response.ok) {
            throw new Error("HTTP error: " + response.status);
        }
        return response.json();
        })
        .then(data => {
            console.log("Respuesta del back-end:", data);
            if (data.status === "error") {
                throw new Error(data.message || "No se pudo actualizar el usuario.");
            }
            return data.result || data.message;
        })
        .catch(error => {
            console.error("ERROR DE PETICIÓN:", error.message);
            throw error;
        });

    },

    delete : (id) => {
        return fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/producto/delete", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({ id: id }),

        })
        .then(response => {
            if (!response.ok) {
                throw new Error("HTTP error: " + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log("Respuesta del back-end:", data);
            return data;
        })
        .catch(error => {
            console.error("ERROR DE PETICIÓN:", error);
            return null;
        });

    },

    list : (filters) =>{

        return fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/producto/list", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify(filters)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP error: " + response.status);
        }
        return response.json();
    })
    .then(data => {
        
        if (Array.isArray(data.result)) {
            return data.result; 
        } else {
            console.warn("La respuesta no contiene result:", data);
            return [];
        }
    })
    .catch(error => {
        console.error("ERROR DE PETICIÓN:", error);
        return [];
    });

    
}
}



