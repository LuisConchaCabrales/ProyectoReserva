<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
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
    <form method="post" action="{{route("usuario.crear")}}">
        @csrf
        <div class="titulo">
            <h3>Registrar Usuario</h3>
        </div>

        <div>

            <label for="username">Usuario</label>
            <input type="text" placeholder="Nombre de Usuario" name="username" id="username">

            <label for="password">Contraseña</label>
            <input type="password" placeholder="Password" name="password" id="password">

            <label for="password2">Repetir Contraseña</label>
            <input type="password" placeholder="Repetir Password" name="password2" id="password2">

        </div>
        <div class="derecha">

            <label for="name">Nombre</label>
            <input type="text" placeholder="Nombre propio" name="name" id="name">

            <label for="surname">Apellidos</label>
            <input type="text" placeholder="Apellido Apellido" name="surname" id="surname">

            <label for="email">Correo Electrónico</label>
            <input type="email" placeholder="ejemplo@gmail.com" name="email" id="email">

            <a href="/login" >iniciar sesion</a>
        </div>
        <input type="submit" id="crear" class="inicio" value="Registrarse">

    </form>

</body>

</html>
