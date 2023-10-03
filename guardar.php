<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
	$comentarios = $_POST["comentarios"];
    $servername = "sql302.infinityfree.com";
    $username = "if0_34542700";
    $password = "FII38tTRV3OBY";
    $database = "if0_34542700_db_pw2023";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta INSERT
    $sql = "INSERT INTO clientes_tbl (nombre, correo, comentarios) VALUES ('$nombre', '$correo','$comentarios')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos guardados en la base de datos correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   $consulta = "SELECT * FROM clientes_tbl"; 
    $resultado = $conn->query($consulta);

    echo "<br>";
    echo "<table border = '1'> <tr><th>Nombre</th><th>Correo electrónico</th><th>Comentario</th></tr>";
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr> <td>" . $fila["nombre"] . "</td><td>" . $fila["correo"] . "</td><td>".$fila["comentarios"]."</td></tr>";
        }
    } else {
        echo "No se encontraron resultados";
    }
    echo "</table>";
    // Cerrar la conexión
    $conn->close();
}
?>