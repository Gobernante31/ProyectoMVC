<?php
require_once '../conexion.php';
require_once '../lib/funciones.php';


/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['ID', 'AVATAR', 'NOMBRE', 'TELEFONO', 'EMAIL', 'ACTIVO', 'CREDITO'];

/* Nombre de la tabla */
$table = "clientes";

$id = 'ID';

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;


/* Filtrado */
$where = '';

if ($campo != null) {
  $where = "WHERE (";

  $cont = count($columns);
  for ($i = 0; $i < $cont; $i++) {
    $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
  }
  $where = substr_replace($where, "", -3);
  $where .= ")";
} else {
  $where = "";
}


/* Limit */
$limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
  $inicio = 0;
  $pagina = 1;
} else {
  $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";

/**
 * Ordenamiento
 */

$sOrder = "";
if (isset($_POST['orderCol'])) {
  $orderCol = $_POST['orderCol'];
  $oderType = isset($_POST['orderType']) ? $_POST['orderType'] : 'asc';

  $sOrder = "ORDER BY " . $columns[intval($orderCol)] . ' ' . $oderType;
}


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sOrder
$sLimit";

$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

/* Consulta para total de registro filtrados */
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

/* Consulta para total de registro filtrados */
$sqlTotal = "SELECT COUNT($id) FROM $table";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

/* Mostrado resultados */
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

// Generar el contenido HTML
if ($num_rows > 0) {
  while ($row = $resultado->fetch_assoc()) {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td>' . $row['ID'] . '</td>';
    $output['data'] .= '<td>';
    $output['data'] .= '<a href="#" data-id="' . $row['ID'] . '"><img src="' . $row['AVATAR'] . '" class="avatar" alt="Avatar">' . $row['NOMBRE'] . '</a>';
    $output['data'] .= '</td>';
    $output['data'] .= '<td>' . $row['TELEFONO'] . '</td>';
    $output['data'] .= '<td>' . $row['EMAIL'] . '</td>';
    $output['data'] .= '<td>' . mostrarEstadoActivacion($row['ACTIVO'] == 1 ? 'Activo' : 'Inactivo') . '</td>';
    $output['data'] .= '<td>' . $row['CREDITO'] . '</td>';
    $output['data'] .= '<td>';
    $output['data'] .= '<a href="#edditEmployeeModal" class="settings" data-id="' . $row['ID'] . '" class="btn btn-secondary" data-toggle="modal" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>';
    $output['data'] .= '<a href="#deleteEmployeeModal" class="delete" data-id="' . $row['ID'] . '" class="btn btn-secondary" data-toggle="modal" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>';    
    $output['data'] .= '</td>';
    $output['data'] .= '</tr>';

  }
} else {
  $output['data'] .= '<tr>';
  $output['data'] .= '<td colspan="7">Sin resultados</td>';
  $output['data'] .= '</tr>';
}

// Aquí incluyes el script jQuery para inicializar los tooltips
$output['script'] = '<script>
$(document).ready(function(){
    $(\'[data-toggle="tooltip"]\').tooltip();
});
</script>';



if ($output['totalRegistros'] > 0) {
  $totalPaginas = ceil($output['totalRegistros'] / $limit);

  $output['paginacion'] .= '<nav>';
  $output['paginacion'] .= '<ul class="pagination">';

  $numeroInicio = 1;

  if (($pagina - 4) > 1) {
    $numeroInicio = $pagina - 4;
  }

  $numeroFin = $numeroInicio + 9;

  if ($numeroFin > $totalPaginas) {
    $numeroFin = $totalPaginas;
  }

  for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
    if ($pagina == $i) {
      $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
    } else {
      $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="nextPage(' . $i . ')">' . $i . '</a></li>';
    }
  }

  $output['paginacion'] .= '</ul>';
  $output['paginacion'] .= '</nav>';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
