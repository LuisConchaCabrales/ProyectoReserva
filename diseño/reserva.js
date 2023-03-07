addEventListener('load', cargar, false);
var fechaActual;
var fechaReserva;
var turnosMañana = new Array("8:30", "9:20", "10:30", "11:20", "12:35", "13:25");
var turnosTarde = new Array('14:45', '15:35', '16:40', '17:30', '18:35', '19:25')
function cargar() {
    fechaReserva = document.querySelector("#fechaReserva");
    fechaReserva.addEventListener("change", elegirFecha, false);
}

function elegirFecha() {
    fecha = new Date(Date.parse(fechaReserva.value));
    fechaActual = new Date(Date.now());
    if (fechaActual > fecha) {
        alert(`La fecha ${fecha.toLocaleDateString('es')} es anterior a la actual`)
        fechaReserva.value = null;
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
