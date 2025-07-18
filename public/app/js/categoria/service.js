export const categoryService = {

    load: (id) => {
        typeof id !== 'number' && (id = parseInt(id, 10));
        console.log("Cargando la categoría con el ID:", id);
        return fetch(`categoria/load/${id}`, {
            method: "GET", 
            headers: {
                "Accept": "application/json" 
            }
        })
         .then(response => {
            if (!response.ok) {
                throw new Error('Error en el método. No se pudo cargar el usuario');
            }
            return response.json(); 
        })
        .then(data => {
            console.log("Respuesta del back-end:", data);
            if (data.error) {
                throw new Error(data.message || 'No se pudo cargar el usuario');
            }
            return data;
        })
        .catch(error => {
            console.error("Error al cargar", error);
        });
    },
    save : (newCategory) => {
        return fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/categoria/save", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(newCategory)
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

    update : (updatedCategory) => {
        return fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/categoria/update", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(updatedCategory)
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
        return fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/categoria/delete", {
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

    list : () =>{

        return fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/categoria/list", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify({})
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP error: " + response.status);
        }
        return response.json();
    })
    .then(data => {
    if (Array.isArray(data.message)) {
        return data.message; 
    } else {
        console.warn("La respuesta no contiene categorías en 'message':", data);
        return [];
    }
})
    .catch(error => {
        console.error("ERROR DE PETICIÓN:", error);
        return [];
    });

    
}
}



