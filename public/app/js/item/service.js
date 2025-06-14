const itemService = {

    load: id => {

        let encontrado = false
        let indice = -1
        for(let i = 0; i < items.length && !encontrado; i++){
            if(items[i].id === id){
                encontrado = true
                indice = i
            }
        }
        return encontrado ? items[indice] : null
    },

    save : item => {
        item.id = items.length;
        items.push(item)
    },

    update : item => {

        let id = item.id;

        for (let i = 0; i<items.lenght ;i ++){

            if(items[i].id === id){
                items[i] = item;
            }
        }

        //BORRAR Y REEMPLAZAR EL OBJETO VIEJO O ACTUALIZAR EL ACTUAL
    },


    delete : id => {
        let index = items.findIndex(item => item.id === id);
        if(index!== -1){

            return items.splice(index,1);
        }

        return null;
    },


            
    list : () => {
        return items;
    }

}


const items = [

    { id:1, nombreProducto:"Guitarra", codigo:"001", descripcion:"Instrumento de Viento", categoria:"Instrumento", precio:"$50000", stock:"5"},
    { id:2, nombreProducto:"Charli xcx - brat", codigo:"002", descripcion:"Disco Físico", categoria:"CD", precio:"$30000", stock:"15"},
    { id:3, nombreProducto:"Lady Gaga - Mayhem", codigo:"003", descripcion:"Disco de Vinilo", categoria:"Vinilo", precio:"$50000", stock:"3"},
    { id:4, nombreProducto:"Dua Lipa - Future Nostalgia", codigo:"004", descripcion:"Disco de Vinilo", categoria:"Vinilo", precio:"$40000", stock:"10"},

]