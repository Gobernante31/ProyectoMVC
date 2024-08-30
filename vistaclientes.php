<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bootstrap User Management Data Table</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    body {
      color: #566787;
      background: #f5f5f5;
      font-family: 'Varela Round', sans-serif;
      font-size: 13px;
    }

    .table-responsive {
      margin: 30px 0;
    }

    .table-wrapper {
      min-width: 1000px;
      background: #fff;
      padding: 20px 25px;
      border-radius: 3px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
      padding-bottom: 15px;
      background: #299be4;
      color: #fff;
      padding: 16px 30px;
      margin: -20px -25px 10px;
      border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
      margin: 5px 0 0;
      font-size: 24px;
    }

    .table-title .btn {
      color: #566787;
      float: right;
      font-size: 13px;
      background: #fff;
      border: none;
      min-width: 50px;
      border-radius: 2px;
      border: none;
      outline: none !important;
      margin-left: 10px;
    }

    .table-title .btn:hover,
    .table-title .btn:focus {
      color: #566787;
      background: #f2f2f2;
    }

    .table-title .btn i {
      float: left;
      font-size: 21px;
      margin-right: 5px;
    }

    .table-title .btn span {
      float: left;
      margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
      border-color: #e9e9e9;
      padding: 12px 15px;
      vertical-align: middle;
    }

    table.table tr th:first-child {
      width: 60px;
    }

    table.table tr th:last-child {
      width: 100px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
      background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
      background: #f5f5f5;
    }

    table.table th i {
      font-size: 13px;
      margin: 0 5px;
      cursor: pointer;
    }

    table.table td:last-child i {
      opacity: 0.9;
      font-size: 22px;
      margin: 0 5px;
    }

    table.table td a {
      font-weight: bold;
      color: #566787;
      display: inline-block;
      text-decoration: none;
    }

    table.table td a:hover {
      color: #2196F3;
    }

    table.table td a.settings {
      color: #2196F3;
    }

    table.table td a.delete {
      color: #F44336;
    }

    table.table td i {
      font-size: 19px;
    }

    table.table .avatar {
      border-radius: 50%;
      vertical-align: middle;
      margin-right: 10px;
    }

    .status {
      font-size: 30px;
      margin: 2px 2px 0 0;
      display: inline-block;
      vertical-align: middle;
      line-height: 10px;
    }

    .text-success {
      color: #10c469;
    }

    .text-info {
      color: #62c9e8;
    }

    .text-warning {
      color: #FFC107;
    }

    .text-danger {
      color: #ff5b5b;
    }

    .pagination {
      float: right;
      margin: 0 0 5px;
    }

    .pagination li a {
      border: none;
      font-size: 13px;
      min-width: 30px;
      min-height: 30px;
      color: #999;
      margin: 0 2px;
      line-height: 30px;
      border-radius: 2px !important;
      text-align: center;
      padding: 0 6px;
    }

    .pagination li a:hover {
      color: #666;
    }

    .pagination li.active a,
    .pagination li.active a.page-link {
      background: #03A9F4;
    }

    .pagination li.active a:hover {
      background: #0397d6;
    }

    .pagination li.disabled i {
      color: #ccc;
    }

    .pagination li i {
      font-size: 16px;
      padding-top: 6px
    }

    .hint-text {
      float: left;
      margin-top: 10px;
      font-size: 13px;
    }

    /* Modal styles */
    .modal .modal-dialog {
      max-width: 600px;
    }

    .modal .modal-header,
    .modal .modal-body,
    .modal .modal-footer {
      padding: 20px 30px;
    }

    .modal .modal-content {
      border-radius: 3px;
      font-size: 14px;
    }

    .modal .modal-footer {
      background: #ecf0f1;
      border-radius: 0 0 3px 3px;
    }

    .modal .modal-title {
      display: inline-block;
    }

    .modal .form-control {
      border-radius: 2px;
      box-shadow: none;
      border-color: #dddddd;
    }

    .modal textarea.form-control {
      resize: vertical;
    }

    .modal .btn {
      border-radius: 2px;
      min-width: 100px;
    }

    .modal form label {
      font-weight: normal;
    }
  </style>
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</head>

<body>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Función para manejar el ordenamiento de las columnas de la tabla
      function manejarOrdenamiento(event) {
        // Obtener el elemento clickeado
        const columna = event.target.closest('th');

        // Verificar si la columna clickeada tiene la clase "clickeable"
        if (columna && columna.classList.contains('clickeable')) {
          // Obtener el nombre de la columna y el tipo de orden actual
          const tipoOrden = columna.classList.contains('ascendente') ? 'descendente' : 'ascendente';

          // Eliminar clases de ordenamiento de todas las columnas
          document.querySelectorAll('.clickeable').forEach(col => {
            col.classList.remove('ascendente', 'descendente');
            col.querySelectorAll('.icono-orden').forEach(icono => icono.innerHTML = ''); // Limpiar los íconos de ordenamiento
          });

          // Aplicar clase de ordenamiento a la columna clickeada
          columna.classList.add(tipoOrden);

          // Obtener el ícono de ordenamiento y mostrar el emoji correspondiente
          const iconoOrden = columna.querySelector('.icono-orden');
          iconoOrden.innerHTML = tipoOrden === 'ascendente' ? '<i class="ri-arrow-up-line"></i>' : '<i class="ri-arrow-down-line"></i>';
        }
      }

      // Evento clic para manejar el ordenamiento de las columnas
      document.querySelectorAll('th.clickeable').forEach(th => {
        th.addEventListener('click', manejarOrdenamiento);
      });
    });
  </script>


  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
  </head>

  <body>
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-5">
                <h2>User <b>Management</b></h2>
              </div>
              <div class="col-sm-7">
                <div class="row g-4 align-items-center">
                  <div class="col-auto">
                    <label for="num_registros" class="col-form-label">Mostrar: </label>
                  </div>
                  <div class="col-auto">
                    <select name="num_registros" id="num_registros" class="form-select">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                  </div>
                  <div class="col-auto">
                    <label for="num_registros" class="col-form-label">registros </label>
                  </div>
                  <div class="col-auto">
                    <label for="campo" class="col-form-label">Buscar: </label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="campo" id="campo" class="form-control">
                  </div>
                </div>
                <div class="row mt-3 justify-content-end">
                  <div class="col-auto">
                    <a href="#" class="btn btn-secondary" id="exportExcel">
                      <i class="material-icons">&#xE24D;</i> <span>Export to Excel</span>
                    </a>
                  </div>
                  <div class="col-auto">
                    <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal">
                      <i class="material-icons">&#xE147;</i> <span>Add New User</span>
                    </a>
                  </div>
                </div>
              </div>

            </div>

          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th class="sort asc clickeable" scope="col">ID <span class="icono-orden"></span></th>
                <th class="sort asc clickeable" scope="col">Nombre<span class="icono-orden"></span></th>
                <th class="sort asc clickeable" scope="col">Teléfono<span class="icono-orden"></span></th>
                <th class="sort asc clickeable" scope="col">Email<span class="icono-orden"></span></th>
                <th class="sort asc clickeable" scope="col">Activo<span class="icono-orden"></span></th>
                <th class="sort asc clickeable" scope="col">Crédito<span class="icono-orden"></span></th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="content">

            </tbody>
          </table>

          <div class="clearfix">
            <div class="hint-text">
              <label id="lbl-total"></label>
            </div>
            <div class="page-item" class="col-6" id="nav-paginacion"></div>
            <input type="hidden" id="pagina" value="1">
            <input type="hidden" id="orderCol" value="0">
            <input type="hidden" id="orderType" value="asc">
          </div>
        </div>
      </div>
    </div>



    <script>
      /* Llamando a la función getData() */
      getData()

      /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
      document.getElementById("campo").addEventListener("keyup", function() {
        getData()
      }, false)
      document.getElementById("num_registros").addEventListener("change", function() {
        getData()
      }, false)


      /* Peticion AJAX */
      function getData() {
        let input = document.getElementById("campo").value
        let num_registros = document.getElementById("num_registros").value
        let content = document.getElementById("content")
        let pagina = document.getElementById("pagina").value
        let orderCol = document.getElementById("orderCol").value
        let orderType = document.getElementById("orderType").value

        if (pagina == null) {
          pagina = 1
        }

        let url = "./php/load_users.php"
        let formaData = new FormData()
        formaData.append('campo', input)
        formaData.append('registros', num_registros)
        formaData.append('pagina', pagina)
        formaData.append('orderCol', orderCol)
        formaData.append('orderType', orderType)

        fetch(url, {
            method: "POST",
            body: formaData
          }).then(response => response.json())
          .then(data => {
            content.innerHTML = data.data
            document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
              ' de ' + data.totalRegistros + ' registros'
            document.getElementById("nav-paginacion").innerHTML = data.paginacion
          }).catch(err => console.log(err))
      }

      function nextPage(pagina) {
        document.getElementById('pagina').value = pagina
        getData()
      }

      let columns = document.getElementsByClassName("sort")
      let tamanio = columns.length
      for (let i = 0; i < tamanio; i++) {
        columns[i].addEventListener("click", ordenar)
      }

      function ordenar(e) {
        let elemento = e.target

        document.getElementById('orderCol').value = elemento.cellIndex

        if (elemento.classList.contains("asc")) {
          document.getElementById("orderType").value = "asc"
          elemento.classList.remove("asc")
          elemento.classList.add("desc")
        } else {
          document.getElementById("orderType").value = "desc"
          elemento.classList.remove("desc")
          elemento.classList.add("asc")
        }

        getData()
      }
    </script>
    <!-- FIN Usuarios Registrados -->





    <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="$_POST" action="">
            <div class="modal-header">
              <h4 class="modal-title">Clientes</h4>
              <p>
                <?php
                require_once './php/controlador_agregarcliente.php';
                ?>
              </p>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Avatar (solo PNG y JPG)</label>
                <input type="file" class="form-control" accept=".png, .jpg, .jpeg" required>
              </div>
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Activo</label>
                <select class="form-control" name="activo" required>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>

              <div class="form-group">
                <label>Crédito</label>
                <input type="number" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="submit" name="guardar" class="btn btn-success" value="Guardar">

              </div>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

            </div>
          </form>
        </div>
      </div>
    </div>




    <script>
      $(document).ready(function() {
        $('.settings, .delete').click(function(e) {
          e.preventDefault();
          var clienteId = $(this).data('id'); // Recuperar el ID del cliente correctamente

          // Realizar solicitud AJAX para enviar el ID
          $.ajax({
            url: './php/obtener_cliente.php',
            method: 'POST',
            data: {
              id: clienteId
            },
            success: function(response) {
              // Manejar la respuesta aquí
              console.log('ID enviado con éxito:', response);
              // Actualizar los campos del formulario modal con los datos del cliente
              $('#id').val(response.id);
              $('#avatar').val(response.avatar);
              $('#nombre').val(response.nombre);
              $('#telefono').val(response.telefono);
              $('#email').val(response.email);
              $('#activo').val(response.activo);
              $('#credito').val(response.credito);
            },
            error: function(xhr, status, error) {
              // Manejar errores aquí
              console.error('Error al enviar el ID:', error);
            }
          });
        });
      });
    </script>
    <div id="edditEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="">
            <div class="modal-header">
              <h4 class="modal-title">Clientes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Id</label>
                <input type="text" id="id" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Avatar</label>
                <input type="text" id="avatar" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" id="nombre" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input type="text" id="telefono" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Activo</label>
                <input type="text" id="activo" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Crédito</label>
                <input type="text" id="credito" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Modificar">
              </div>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            </div>
          </form>
        </div>
      </div>
    </div>



    <div id="deleteEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title">Clientes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Id</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Avatar</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Activo</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Crédito</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Borrar">
              </div>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

            </div>
          </form>
        </div>
      </div>
    </div>


  </body>

</html>