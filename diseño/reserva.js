addEventListener('load', cargar, false);

function cargar() {
    fechareserva.addEventListener("change", elegirFecha, false);
}

function elegirFecha() {
    fecha = fechareserva.value;
    alert(fecha)
}
