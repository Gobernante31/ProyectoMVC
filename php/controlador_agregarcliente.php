<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar'])) {
  require_once './conexion.php';

  // Verificar si se recibieron todos los campos requeridos
  if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['email']) || empty($_POST['activo']) || empty($_POST['credito'])) {
      echo "Falta uno o más campos requeridos.";
      exit;
  }

  // Recibir datos del formulario
  $nombre = $_POST['nombre'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $activo = $_POST['activo'];
  $credito = $_POST['credito'];

  // Verificar si ya existe un cliente con los mismos datos
  $sql = "SELECT ID FROM clientes WHERE NOMBRE = ? AND TELEFONO = ? AND EMAIL = ?";
  $stmt = $conn->prepare($sql_check);
  $stmt_check->bind_param("sss", $nombre, $telefono, $email);
  $stmt_check->execute();
  $result_check = $stmt_check->get_result();

  if ($result_check->num_rows > 0) {
      echo "Ya existe un cliente con estos datos.";
      exit;
  }

  // Insertar datos del cliente en la base de datos
  $sql = "INSERT INTO clientes (NOMBRE, TELEFONO, EMAIL, ACTIVO, CREDITO) VALUES (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssi", $nombre, $telefono, $email, $activo, $credito);

  if ($stmt->execute()) {
      // Obtener el ID del cliente recién insertado
      $cliente_id = $stmt->insert_id;

      // Verificar si se cargó una imagen
      if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
          // Obtener la extensión del archivo
          $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

          // Construir la ruta de destino para la imagen
          $ruta_destino = './img/' . $cliente_id . '.' . $extension;

          // Mover la imagen cargada a la ruta de destino
          if (move_uploaded_file($_FILES['avatar']['tmp_name'], $ruta_destino)) {
              // Actualizar la ruta de la imagen en la base de datos
              $sql_update = "UPDATE clientes SET AVATAR = ? WHERE ID = ?";
              $stmt_update = $conn->prepare($sql_update);
              $stmt_update->bind_param("si", $ruta_destino, $cliente_id);
              if (!$stmt_update->execute()) {
                  echo "Error al actualizar la ruta de la imagen.";
              }
          } else {
              echo "Error al mover la imagen.";
          }
      }

      echo "Cliente agregado correctamente.";
  } else {
      echo "Error al agregar el cliente: " . $conn->error;
  }

  // Cerrar las consultas preparadas
  $stmt_check->close();
  $stmt->close();
  if (isset($stmt_update)) {
      $stmt_update->close();
  }

  // Cerrar la conexión a la base de datos
  $conn->close();
}
