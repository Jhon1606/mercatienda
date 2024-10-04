<?php
require_once('../../Productos/Modelo/productos.php');

if (isset($_POST['id'])) {
    $modeloProducto = new productos();
    $cambios = $modeloProducto->getCambios($_POST['id']);

    if (!empty($cambios)) {
        echo '<ul>';
        foreach ($cambios as $cambio) {
            echo '<li> Fecha y hora: ' . $cambio['fecha_cambio'] . ' - ' . $cambio['campo_modificado'] . ': de ' . $cambio['valor_anterior'] . ' a ' . $cambio['valor_nuevo'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No se encontraron cambios para este producto.</p>';
    }
} else {
    echo 'ID de producto no proporcionado.';
}
