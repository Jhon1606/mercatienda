<?php
require_once('../Modelo/productos.php');

if ($_POST) {
    try {
        $modeloProducto = new productos();

        $id = $_POST['id'];
        $modeloProducto->delete($id);

        header('Location: ../../index.php?mensaje=success&accion=eliminar');
        exit;
    } catch (Exception $e) {
        header('Location: ../../index.php?mensaje=error&accion=eliminar&detalle=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    header('Location: ../../index.php');
    exit;
}
