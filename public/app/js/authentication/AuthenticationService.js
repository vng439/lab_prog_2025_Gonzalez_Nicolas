function login() {
    const form = document.getElementById("loginForm");
    const errorMsg = document.getElementById("errorMsg");

    if (!form) {
        console.error("No se encontró el formulario con id 'loginForm'");
        return;
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const data = {
            userName: form.userName.value,
            password: form.password.value
        };

        fetch("/lab_prog_2025_Gonzalez_Nicolas/public/authentication/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(response.status);
            }
            return response.json();
        })
        .then(data => {
            const result = data.message;
            console.log("Respuesta del servidor:", result); 

            if (result.success) {
                window.location.href = "/lab_prog_2025_Gonzalez_Nicolas/public/home/index";
            } else {
                errorMsg.textContent = result.message || "Credenciales incorrectas.";
            }
        })
        .catch(error => {
            console.error("Error:", error);
            errorMsg.textContent = "Verifique los datos ingresados.";
        });
    });
}


document.addEventListener("DOMContentLoaded", login);
