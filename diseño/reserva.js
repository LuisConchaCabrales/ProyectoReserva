addEventListener('load', cargar, false);

function cargar() {
    fechaReserva.addEventListener("change", elegirFecha, false);
}

function elegirFecha() {
    fecha = fechareserva.value;
    alert(fecha)
}
