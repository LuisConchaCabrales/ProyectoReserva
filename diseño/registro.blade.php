<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="login.css">
    <style>
        form {
            height: 520px;
            width: 700px;
        }

        input {
            width: 260px;
        }
        .titulo{
            margin-top: -260px;
        }
    </style>
</head>

<body>
    <div class="background">
    </div>
    <form>
        <div class="titulo">
            <h3>Registrar Usuario</h3>
        </div>

        <div>

            <label for="username">Usuario</label>
            <input type="text" placeholder="Nombre de Usuario" id="username">

            <label for="password">Contraseña</label>
            <input type="password" placeholder="Password" id="password">

            <label for="password2">Repetir Contraseña</label>
            <input type="password" placeholder="Repetir Password" id="password2">

        </div>
        <div class="derecha">

            <label for="name">Nombre</label>
            <input type="text" placeholder="Nombre propio" id="name">

            <label for="apellidos">Apellidos</label>
            <input type="text" placeholder="Apellido Apellido" id="apellidos">

            <label for="mail">Correo Electrónico</label>
            <input type="email" placeholder="ejemplo@gmail.com" id="mail">

        </div>
        <button class="inicio">Registrarse</button>
    </form>
</body>

</html>