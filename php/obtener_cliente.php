<?php
// Verificar si se recibió el ID del cliente
if (isset($_POST['id'])) {
    // Conexión a la base de datos (debes incluir tu propio archivo de conexión)
    require_once '../conexion.php';


    // Sanitizar y obtener el ID del cliente
    $clienteId = $_POST['id'];

    // Consulta SQL para obtener los datos del cliente según su ID
    $sql = "SELECT * FROM clientes WHERE ID = $clienteId";

    // Ejecutar la consulta
    $resultado = $conn->query($sql);

    // Verificar si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        // Obtener los datos del cliente
        $row = $resultado->fetch_assoc();

        // Obtener los datos del cliente y almacenarlos en un array
        $datos_cliente = array(
            'id' => $row['ID'],
            'avatar' => $row['AVATAR'],
            'nombre' => $row['NOMBRE'],
            'telefono' => $row['TELEFONO'],
            'email' => $row['EMAIL'],
            'activo' => $row['ACTIVO'],
            'credito' => $row['CREDITO']
        );

        // Devolver los datos del cliente en formato JSON
        header('Content-Type: application/json');
        echo json_encode($datos_cliente);
    } else {
        // Si no se encontraron resultados para el ID proporcionado, devolver un mensaje de error
        echo json_encode(['error' => 'Cliente no encontrado']);
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    exit; // Terminar la ejecución del script
}
?>
