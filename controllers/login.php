<?php

include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['username'];
    $pass = $_POST['password'];


    $sql = "SELECT username, password FROM users WHERE username = ? AND password = ?";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("ss", $usuario, $pass);
        $stmt->execute();
        $result= $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['username'];
        } else {
            echo "0 results";
        }
    }
}
$conexion->close();

?>