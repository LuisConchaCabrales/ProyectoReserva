addEventListener('load', cargar, false);
    var fechaActual;
function cargar() {
    fechaReserva.addEventListener("change", elegirFecha, false);
}

function elegirFecha() {
    fecha = fechareserva.value;
    fechaActual = new Date(Date.now());
    alert(fecha)
}
