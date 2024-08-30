<?php
function mostrarEstadoActivacion($estado)
{
  switch ($estado) {
    case 'Activo':
      return '<span class="status text-success">&bull;</span> Activo';
      break;
    case 'Inactivo':
      return '<span class="status text-warning">&bull;</span> Inactivo';
      break;
    case 'Suspendido':
      return '<span class="status text-danger">&bull;</span> Suspendido';
      break;
    default:
      return '';
      break;
  }
}
