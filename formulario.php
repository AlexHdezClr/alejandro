<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formulario.php" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Email:  <input type="text" name="email"><br>
        Edad:   <input type="text" name="edad"><br>
        País:   <select name="pais" id="pais">
                    <option value="Espana">España</option>
                    <option value="Alemania">Alemania</option>
                    <option value="Suiza">Suiza</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Japon">Japón</option>
        <input type="hidden" name="form_enviado" value="1">
        <input type="submit">
    </form>
</body>
</html>

<?php

    session_start();
    if (isset($_POST['form_enviado']) && $_POST['form_enviado'] == '1'){
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $edad=$_POST['edad'];
        $pais=$_POST['pais'];

        $nombreVal=false;
        $emailVal=false;
        $edadVal=false;
        $paisVal=false;

        if (preg_match("/^\s*$/", $nombre)){
            $nombreVal=true;
            $_SESSION['nombre']=$nombre;
            echo $_SESSION['nombre'];
        }else{
            $_SESSION['nombre']="Hubo un problema con el nombre<br>";
        }
        if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/",$email)){
            $emailVal=true;
            $_SESSION['email']=$email;
            echo $email;
        }else{
            echo $email;
            $_SESSION['email']="Hubo un problema con el correo<br>";
        }
        if ((preg_match("/[0-9]{1,3}$/",$edad))){
            $edadVal=true;
            $_SESSION['edad']=$edad;
            echo $edad;
        }else{
            $_SESSION['edad']="Hubo un problema con la edad<br>";
        }

        if (isset($pais)){
            $paisVal=true;
            $_SESSION['pais']=$pais;
            echo $pais;
        }else{
            $_SESSION['pais']="Hubo un problema con el país<br>";
        }


    }