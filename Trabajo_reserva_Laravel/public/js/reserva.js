addEventListener('load', cargar, false);
var fechaActual;
var fechaReserva;
var turnosMañana = new Array("8:30", "9:20", "10:30", "11:20", "12:35", "13:25");
var turnosTarde = new Array('14:45', '15:35', '16:40', '17:30', '18:35', '19:25');
var idPcElegido = 0;
function cargar() {
    introducirOrdenadores();
    fechaReserva = document.querySelector("#fechaReserva");
    fechaReserva.addEventListener("change", elegirFecha, false);
}

function elegirFecha() {
    fecha = new Date(Date.parse(fechaReserva.value));
    fechaActual = new Date(Date.now());
    if (fechaActual > fecha) {
        alert(`La fecha ${fecha.toLocaleDateString('es')} es anterior a la actual`)
        fechaReserva.value = null;
    } else if (idPcElegido = 0) {
        alert("Selecciona el ordenador primero para ver sus horarios disponiles");
    } else {
        mañana.style.display = "block";
        tarde.style.display = "block";
        for (let i = 0; i < turnosMañana.length; i++) {
            let inp = document.createElement("input");
            inp.type = "button";
            inp.value = turnosMañana[i];
            inp.id = i;
            inp.className = "botonesReservaLibre";
            let inp2 = document.createElement("input");
            inp2.type = "button";
            inp2.value = turnosTarde[i];
            inp2.id = i;
            inp2.className = "botonesReservaLibre";
            inp2.disabled = false;
            mañana.appendChild(inp);
            tarde.appendChild(inp2);
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
}

function envioform() {
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
    datos.append('envioContra2', idPcElegido);
    url = "php1.php";
    xhr.open('POST', url, true);
    xhr.send(datos);
    xhr.onreadystatechange = muestracontenido;

    function muestracontenido() {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                divInfo.innerHTML = "recibido " + xhr.responseText;
            }
            else {
                divInfo.innerHTML = "Codigo de error " + xhr.status;
            }
        }
    };
}
