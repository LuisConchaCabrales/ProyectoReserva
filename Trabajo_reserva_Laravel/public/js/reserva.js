addEventListener('load', cargar, false);
var arrReservas = [];
var arrIdPortatiles = [];
var fechaActual;
var fechaReserva;
var fechaReservaUsuario;
var fechaComprobacion;
var horaReserva = null;
var turnosMañana = new Array("8:30", "9:20", "10:30", "11:20", "12:35", "13:25");
var turnosTarde = new Array('14:45', '15:35', '16:40', '17:30', '18:35', '19:25');
var idPcElegido = 0;
var turno;
function cargar() {
    fechaReservaUsuario = document.querySelector("#fechaReservaUsuario");
    recogerPortatiles();
    recogerReservas();
    fechaReservaUsuario.addEventListener("change", elegirFecha, false);
    reser.addEventListener("click", realizarReserva, false);
    borrar.addEventListener("click", reiniciarDatos, false);
}

function realizarReserva() {
    dia.value = fechaComprobacion;
    turnoEnvio.value = turno;
    if (horaReserva == null) {
        alert("Elige un boton con una hora disponible");
    } else {
        alert(`El portatil numero ${idPcElegido}
ha sido reservado el dia ${fechaReserva.toLocaleDateString("es")}
a la hora ${horaReserva} del turno de ${turno}`);
    }
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
        let botones1 = document.querySelectorAll(".botonesReservaLibre");
        let botones2 = document.querySelectorAll(".botonesReservaOcupado");
        for (let i = 0; i < botones1.length; i++) {
            botones1[i].remove();
        }
        for (let i = 0; i < botones2.length; i++) {
            botones2[i].remove();
        }
        mañana.style.display = "block";
        tarde.style.display = "block";
        if (fechaReserva.getMonth() + 1 < 10 && fechaReserva.getDate() < 10) {
            fechaComprobacion = fechaReserva.getFullYear() + "-0" + (fechaReserva.getMonth() + 1) + "-0" + fechaReserva.getDate();
        } else if (fechaReserva.getDate() < 10) {
            fechaComprobacion = fechaReserva.getFullYear() + "-" + (fechaReserva.getMonth() + 1) + "-0" + fechaReserva.getDate();
        } else if (fechaReserva.getMonth() + 1 < 10) {
            fechaComprobacion = fechaReserva.getFullYear() + "-0" + (fechaReserva.getMonth() + 1) + "-" + fechaReserva.getDate();
        } else {
            fechaComprobacion = fechaReserva.getFullYear() + "-" + (fechaReserva.getMonth() + 1) + "-" + fechaReserva.getDate();
        }
        for (let j = 0; j < turnosMañana.length; j++) {
            let turnoMañanaOcupado = false;
            let turnoTardeOcupado = false;
            for (let i = 0; i < arrReservas.length; i++) {
                if (arrReservas[i]["id_portatil"] == idPcElegido && arrReservas[i]["dia"] == fechaComprobacion && arrReservas[i]["hora"] == turnosMañana[j]) {
                    turnoMañanaOcupado = true;
                }
                if (arrReservas[i]["id_portatil"] == idPcElegido && arrReservas[i]["dia"] == fechaComprobacion && arrReservas[i]["hora"] == turnosTarde[j]) {
                    turnoTardeOcupado = true;
                }
            }
            botonTarde(turnoTardeOcupado, j);
            botonMañana(turnoMañanaOcupado, j);
        }
    }
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



function botonTarde(turnoTardeOcupado, i) {
    if (turnoTardeOcupado) {
        let inp = document.createElement("input");
        inp.type = "button";
        inp.value = turnosTarde[i];
        inp.id = i;
        inp.name = "hora";
        inp.className = "botonesReservaOcupado";
        inp.disabled = true;
        inp.addEventListener("click", recogerHoraReserva, false);
        tarde.appendChild(inp);
    } else {
        let inp = document.createElement("input");
        inp.type = "button";
        inp.value = turnosTarde[i];
        inp.id = i;
        inp.name = "hora";
        inp.className = "botonesReservaLibre";
        inp.addEventListener("click", recogerHoraReserva, false);
        tarde.appendChild(inp);
    }
}

function botonMañana(turnoMañanaOcupado, i) {
    if (turnoMañanaOcupado) {
        let inp = document.createElement("input");
        inp.type = "button";
        inp.value = turnosMañana[i];
        inp.id = i;
        inp.className = "botonesReservaOcupado";
        inp.disabled = true;
        inp.name = "hora";
        inp.addEventListener("click", recogerHoraReserva, false);
        mañana.appendChild(inp);
    } else {
        let inp = document.createElement("input");
        inp.type = "button";
        inp.value = turnosMañana[i];
        inp.id = i;
        inp.name = "hora";
        inp.className = "botonesReservaLibre";
        inp.addEventListener("click", recogerHoraReserva, false);
        mañana.appendChild(inp);
    }
}

function introducirOrdenadores() {
    for (let i = 0; i < arrIdPortatiles.length; i++) {
        let ima = document.createElement("img");
        ima.src = "../img/ordenador.png";
        ima.className = "PC";
        ima.id = i + 1;
        ima.name = "id_portatil";
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
                let datos = JSON.parse(xhr.responseText.substring(132, xhr.responseText.length));
                for (let i = 0; i < datos.length; i++) {
                    arrIdPortatiles.push(datos[i]["id"]);
                }
                introducirOrdenadores();
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
                let datos = JSON.parse(xhr.responseText.substring(132, xhr.responseText.length));
                for (let i = 0; i < datos.length; i++) {
                    let reserva1 = new reserva(datos[i]["user_id"], datos[i]["portatil_id"], datos[i]["dia"], datos[i]["hora"], datos[i]["turno"])
                    arrReservas.push(reserva1);
                }

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

