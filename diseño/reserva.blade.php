<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="reserva.js"></script>
    <link rel="stylesheet" href="reserva.css">
</head>
<style>
    #mañana {
        display: none;
    }

    .botonesReservaLibre {
        background-color: #28A453;
        width: 120px;
        margin: 6px 45px 6px 30px;
        padding: 10px;
        height: 50px;
        border-radius: 10px;
        box-shadow: 3px 3px 8px black;
        border: 0;
        color: white;
    }

    .botonesReservaOcupado {
        background-color: #A22929;
        width: 120px;
        margin: 6px 45px 6px 30px;
        padding: 10px;
        height: 50px;
        border-radius: 10px;
        box-shadow: 3px 3px 8px black;
        border: 0;
        color: white;
    }

    #tarde {
        display: none;
    }
</style>

<body>
    <form action="reserva.html" method="POST">
        <div id="usuario">
            <span id="textoConexion">Bienvenido xxxxxxx</span> <button class="botonRojo">Cerrar sesion</button>
        </div>
        <fieldset id="imagenesOrdenador">
            <legend><a class="centrar">Selecciona ordenador</a></legend>
        </fieldset>
        <fieldset>
            <legend><a class="centrar2">Escoge una fecha</a></legend>
            <input type="date" id="fechaReserva">
        </fieldset>
        <fieldset id="mañana">
            <legend><a class="centrar2">Turnos de mañana</a></legend>
        </fieldset>
        <fieldset id="tarde">
            <legend><a class="centrar2">Turnos de tarde</a></legend>

        </fieldset>
        <button id="borrar">Borrar seleccion</button>
        <button id="reser">Reservar</button>
    </form>

</body>

</html>
