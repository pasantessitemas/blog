
<?php

include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $correo = $_POST['email'];
    $usuario = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $country = $_POST['country'];

    $sql = "INSERT INTO users (usuario, contraseña, correo, nombre, apellido, pais) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = $conexion->prepare($sql)) { 
        $stmt->bind_param("ssssss", $usuario, $pass, $correo, $nombre, $apellido, $country);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            echo 'Registro exitoso';
        } else {
            echo 'Error al registrar';
        }
        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta';
    }
    $conexion->close();
}
?>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        




