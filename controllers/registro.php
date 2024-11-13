<?php

include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['email'];
    $pass = $_POST['password'];


    $sql = "SELECT email, password FROM users WHERE email = ? AND password = ?";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("ss", $correo, $pass);
        $stmt->execute();
        $result= $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['email'];
        } else {
            echo "0 results";
        }
    }
}
$conexion->close();

?>