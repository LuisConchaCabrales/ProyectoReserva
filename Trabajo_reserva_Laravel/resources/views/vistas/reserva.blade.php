<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="{{ asset('js/clases.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/reserva.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/reserva.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

</head>

<body>

    <div id="usuario">
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <span id="textoConexion">Bienvenido <?php echo Auth::user()->name; ?></span> <button class="botonRojo">Cerrar
                sesion</button>
        </form>
    </div>
    <form method="POST" action="{{route('reserva.crear')}}">
        @csrf
        @method("put")
        <input type="number" id="idUser" name="id_usuario" value="<?php echo Auth::user()->id; ?>" hidden>
        <input type="text" name="dia" hidden value="" id="dia">
        <input type="text" name="turno" hidden value="" id="turnoEnvio">
        <input type="text"  name="id_portatil" hidden value="" id="idPortatil">
        <input type="text"  name="hora" hidden value="" id="hora">
        <fieldset id="imagenesOrdenador">
            <legend><a class="centrar">Selecciona ordenador</a></legend>
        </fieldset>
        <fieldset>
            <legend><a class="centrar2">Escoge una fecha</a></legend>
            <input type="date" id="fechaReservaUsuario">
        </fieldset>
        <fieldset id="mañana">
            <legend><a class="centrar2">Turnos de mañana</a></legend>
        </fieldset>
        <fieldset id="tarde">
            <legend><a class="centrar2">Turnos de tarde</a></legend>

        </fieldset>
        <button id="reser">Reservar</button>
    </form>
    <button id="borrar">Borrar seleccion</button>
</body>

</html>
