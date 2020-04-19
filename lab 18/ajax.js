//Función para crear el objeto para realizar una petición asíncrona
function getRequestObject() {
    // Asynchronous objec created, handles browser DOM differences
    if (window.XMLHttpRequest) {
        // Mozilla, Opera, Safari, Chrome IE 7+
        return (new XMLHttpRequest());
    } else if (window.ActiveXObject) {
        // IE 6-
        return (new ActiveXObject("Microsoft.XMLHTTP"));
    } else {
        // Non AJAX browsers
        return (null);
    }
}


//Función que detona la petición asíncrona 
function buscar() {
    request = getRequestObject();
    if (request != null) {
        let id_Autor = document.getElementById("autor").value;
        let nombre_Genero = document.getElementById("genero").value;
       
        var url = 'control_buscar.php?id_Autor=' + id_Autor + '&nombre_Genero=' + nombre_Genero;

        request.open('GET', url, true);
        request.onreadystatechange =
            function () {
                if ((request.readyState == 4)) {
                    // Se recibió la respuesta asíncrona, entonces hay que actualizar el cliente.
                    // A esta parte comúnmente se le conoce como la función del callback
                    document.getElementById("resultados_consulta").innerHTML = request.responseText;
                }
            };
        // Limpiar la petición
        request.send(null);

    }
}
document.getElementById("buscar").onclick = buscar;

