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
<style>
    #mañana {
        display: none;
    }

    .botonesReservaLibre {
        background-color: #28A453;
        width: 170px;
        margin: 6px 150px 6px 180px;
        padding: 10px;
        height: 50px;
        border-radius: 16px;
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

    .PC {
        width: 210px;
        height: 180px;
        margin: -10px 40px 10px 40px;
        padding: 8px;
    }

    #tarde {
        display: none;
    }
</style>

<body>

    <div id="usuario">
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <span id="textoConexion">Bienvenido <?php echo Auth::user()->name; ?></span> <button class="botonRojo">Cerrar
                sesion</button>
        </form>
    </div>
    <form action="" method="POST">
        <input type="number" id="id" name="id" value="<?php echo Auth::user()->id; ?>" hidden>
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
    <div id="info"></div>

</body>

</html>
