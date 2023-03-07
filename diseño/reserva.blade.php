<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="reserva.js"></script>
    <link rel="stylesheet" href="reserva.css">
</head>

<body>
    <form action="reserva.html">
        <div id="usuario">
            <span id="textoConexion">Bienvenido xxxxxxx</span> <button class="botonRojo">Cerrar sesion</button>
        </div>
        <fieldset>
            <legend><a class="centrar">Selecciona ordenador</a></legend>
            <div id="imagenesOrdenador"></div>
        </fieldset>
        <fieldset>
            <legend><a class="centrar2">Escoge una fecha</a></legend>
            <input type="date" id="fechaReserva">
        </fieldset>
        <fieldset>
            <legend><a class="centrar2">Turnos de mañana</a></legend>
            <div id="turnosMañana" class="tamaño"></div>
        </fieldset>
        <fieldset>
            <legend><a class="centrar2">Turnos de tarde</a></legend>
            <div id="turnosTarde" class="tamaño"></div>
        </fieldset>
        <button id="borrar">Borrar seleccion</button>
        <button id="reser">Reservar</button>
    </form>

</body>

</html>