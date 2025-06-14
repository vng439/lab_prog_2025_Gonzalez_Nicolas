/* export */ const userService = {

    load: id => {

        let encontrado = false
        let indice = -1
        for(let i = 0; i < users.length && !encontrado; i++){
            if(users[i].id === id){
                encontrado = true
                indice = i
            }
        }
        return encontrado ? users[indice] : null
    },

        //RECORRER USER Y OBTENER COMO RESULTADO EL QUE TENGA EL ID QUE SE MANDE POR PARAMETRO
        //RETURN DEL USUARIO users[id] id=posicion

    save : user => {
        user.id = users.length;
        users.push(user)
    },

    update : user => {

        let id = user.id;

        for (let i = 0; i<users.lenght ;i ++){

            if(users[i].id === id){
                users[i] = user;
            }
        }

        //BORRAR Y REEMPLAZAR EL OBJETO VIEJO O ACTUALIZAR EL ACTUAL
    },

    delete : id => {

       let index = users.findIndex(user => user.id === id);
        if(index!== -1){

            return users.splice(index,1);
        }

        return null;
    },

    list : () =>{
        return users;
    }

}


const users = [

    {id:1, nombres: 'Nicolás', apellido: 'Gonzalez', cuenta:'gonzaleznicolas', perfil:'Administrador', correo: 'vnicolasg@gmail.com', contraseña:'adminNico' },
    {id:2, nombres: 'Martin', apellido: 'Lopez', cuenta:'lopezmartin', perfil:'Operador', correo: 'martin@gmail.com', contraseña:'usuariomartin' },
    {id:3, nombres: 'Franco', apellido: 'Romay', cuenta:'romayf', perfil:'Administrador', correo: 'rfrang@gmail.com', contraseña:'adminFranco' },

]