addEventListener('load', cargar, false);
var arrReservas;
var arrIdPortatiles;

var fechaActual;
var fechaReserva;
var fechaReservaUsuario;
var turnosMañana = new Array("8:30", "9:20", "10:30", "11:20", "12:35", "13:25");
var turnosTarde = new Array('14:45', '15:35', '16:40', '17:30', '18:35', '19:25');
var idPcElegido = 0;
var turno;
function cargar() {
    introducirOrdenadores();
    recogerReservas();
    fechaReservaUsuario = document.querySelector("#fechaReservaUsuario");
    fechaReservaUsuario.addEventListener("change", elegirFecha, false);
    reser.addEventListener("click", realizarReserva, false);
    borrar.addEventListener("click", reiniciarDatos, false);
}

function realizarReserva() {

}

function reiniciarDatos() {
    idPcElegido = 0;
    let botones1 = document.querySelectorAll(".botonesReservaLibre");
    let botones2 = document.querySelectorAll(".botonesReservaOcupado");
    for (let i = 0; i < botones1.length; i++) {
        botones1[i].remove();
    }
    for (let i = 0; i < botones2.length; i++) {
        botones2[i].remove();
    }
    mañana.style.display = "none";
    tarde.style.display = "none";
    fechaReservaUsuario.value = null;
    fechaReserva = null;
    horaReserva = null;
}

function elegirFecha() {
    fechaReserva = new Date(Date.parse(fechaReservaUsuario.value));
    fechaActual = new Date(Date.now());
    if (fechaActual > fechaReserva) {
        alert(`La fecha ${fechaReserva.toLocaleDateString('es')} es anterior a la actual`)
        fechaReservaUsuario.value = null;
    } else if (idPcElegido == 0) {
        alert("Selecciona el ordenador primero para ver sus horarios disponibles");
        fechaReservaUsuario.value = null;
    } else {
        mañana.style.display = "block";
        tarde.style.display = "block";
        for (let i = 0; i < turnosMañana.length; i++) {
            let inp = document.createElement("input");
            inp.type = "button";
            inp.value = turnosMañana[i];
            inp.id = i;
            inp.className = "botonesReservaLibre";
            mañana.appendChild(inp);
        }
        for (let i = 0; i < turnosTarde.length; i++) {
            tarde.appendChild(inp2);
            let inp2 = document.createElement("input");
            inp2.type = "button";
            inp2.value = turnosTarde[i];
            inp2.id = i;
            inp2.className = "botonesReservaLibre";
            inp2.disabled = false;
        }
    }
}

function introducirOrdenadores() {
    for (let i = 0; i < 10; i++) {
        let ima = document.createElement("img");
        ima.src = "ordenador.png";
        ima.className = "PC";
        ima.id = i + 1;
        ima.addEventListener("click", obtenerId, false);
        imagenesOrdenador.appendChild(ima);
    }
}

function obtenerId(e) {
    idPcElegido = e.target.id;
    alert(`Ordenador nº elegido ${idPcElegido}`);
}

function recogerHoraReserva(e) {
    horaReserva = e.target.value;
    alert(`Hora elegida ${horaReserva}`);
    if (e.target.id <= 5) {
        turno = "mañana";
    } else {
        turno = "tarde"
    }
}

/*function envioform() {
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    let url;
    var datos = new FormData();
    email = mail.value;
    contra1 = pass1.value;
    contra2 = pass2.value;
    datos.append('envioEmail', idPcElegido);
    datos.append('envioContra1', fechaReserva);
    datos.append('envioContra2', horaReserva);
    datos.append('envioContra2', turno);
    url = "php1.php";
    xhr.open('POST', url, true);
    xhr.send(datos);
    xhr.onreadystatechange = muestracontenido;

    function muestracontenido() {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                info.innerHTML = "recibido " + xhr.responseText;
            }
            else {
                info.innerHTML = "Codigo de error " + xhr.status;
            }
        }
    };
}*/

function recogerReservas() {

    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('GET', "/usuarios/datos", true);
    xhr.send(null);
    xhr.onreadystatechange = muestracontenido;

    function muestracontenido() {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                let datos = JSON.parse(xhr.responseText);
                info.innerHTML = datos;
            }
            else {
                info.innerHTML = "Codigo de error " + xhr.status;
            }
        }
    };
};

function recogerPortatiles() {
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('GET', "/portatiles/datos", true);
    xhr.send(null);
    xhr.onreadystatechange = muestracontenido;

    function muestracontenido() {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                let datos = JSON.parse(xhr.responseText);
                info.innerHTML = datos;
            }
            else {
                info.innerHTML = "Codigo de error " + xhr.status;
            }
        }
    };
}

function recogerReservas() {
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('GET', "/reservas/datos", true);
    xhr.send(null);
    xhr.onreadystatechange = muestracontenido;

    function muestracontenido() {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                let datos = JSON.parse(xhr.responseText);
                info.innerHTML = datos;
            }
            else {
                info.innerHTML = "Codigo de error " + xhr.status;
            }
        }
    };
}

/*
$.ajax({
    url: "{{ route('reservas.datos') }}",
    type: 'POST',
    dataType: 'json',
    contentType: 'json',
    //data: JSON.stringify(p),
    // contentType: 'application/json; charset=utf-8',
    success: function () {
        //$('#').submit(); // ENVIO FORMULARIO DE ALUMNO MEDIANTE SU RUTA
        //$("#").DataTable().clear().draw();
        info.innerHTML = p;
    },
    error: function () {

    }
});
*/

