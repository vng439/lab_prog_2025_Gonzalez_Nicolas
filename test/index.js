let formCategoria = document.forms["formCategoria"];

function save(e){

    e.preventDefault();
    //console.log("Hola");
    console.log("GUARDANDO DATOS...");

    data = {
        nombre: formCategoria.datoNombre.value, //LOS BOTONES DE REGISTRAR USUARIO, PRODUCTO, CATEGORIA. TENEMOS QUE ARMAR EL DATA CON LOS DATOS DEL FORMULARIO. 
    }

    fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/test/RequestTest.php",{
        method: "post", //POR MÁS QUE SE ESPECIFIQUE POST, ESTO NO VA AL POST DE PHP SINO VA A PARAR AL BUFFER DE ENTRADA, ES SOLO PARA QUE NO APAREZCA EN LA URL
        headers: {"Content-Type" : "application/json", "Accept": "application/json"},
        body: JSON.stringify(data) //STRING JSON
    })  //peticion
    .then(response =>{ 
        if(!response.ok){
            throw new Error (response.status);
        }

        return response.json(); 
    })

    .then(response => {
        console.log(response);
    })
    .catch(error => {
        //dialogs.showAlert("Error en la petición", error, dialogs.type.Error);

        console.log("ERROR DE PETICIÓN", error);
    })
}

function load(e){

    e.preventDefault();

    data = {
        id: document.getElementById("datoId").value, //LOS BOTONES DE REGISTRAR USUARIO, PRODUCTO, CATEGORIA. TENEMOS QUE ARMAR EL DATA CON LOS DATOS DEL FORMULARIO. 
    }

    fetch("http://localhost/lab_prog_2025_Gonzalez_Nicolas/test/RequestLoadTest.php",{
        method: "post", //POR MÁS QUE SE ESPECIFIQUE POST, ESTO NO VA AL POST DE PHP SINO VA A PARAR AL BUFFER DE ENTRADA, ES SOLO PARA QUE NO APAREZCA EN LA URL
        headers: {"Content-Type" : "application/json", "Accept": "application/json"},
        body: JSON.stringify(data) //STRING JSON
    })  //peticion
    .then(response =>{ //RESPONSE DEL BACK. POR DEFECTO RESPETA UNA INTERFAZ CON ATRIBUTO OK. CON OK SIGNIFICA QUE ESTÁ TODO BIEN.
        if(!response.ok){
            throw new Error (response.status);
        }

        return response.json(); //RETORNAMOS LA RESPUESTA DEL SERVIDOR PERO EN FORMATO JSON. ESTO SE COLOCA ASÍ POR EL ACCEPT DEL HEADERS.
    })

    .then(response => {
        console.log(response); //AGREGAR LOS MODALES
        formCategoria.datoNombre.value = response.result.nombre;
    })
    .catch(error => {
        //dialogs.showAlert("Error en la petición", error, dialogs.type.Error);

        console.log("ERROR DE PETICIÓN", error);
    })
}   