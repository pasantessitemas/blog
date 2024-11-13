<?php

include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['username'];
    $pass = $_POST['password'];
    $correo = $_POST['email'];
    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];

    $sql = "INSERT INTO users (username, password, email, name, last_name) VALUES ('?', '?', '?', '?', '?')";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_Param("sssss", $usuario, $apellido, $pass, $correo, $nombre);
        $stmt->execute();
        $result= $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo print "El usuario se ha creado con exito";
        } else {
            
        } 
    }

    $conexion->close();
}

?>





