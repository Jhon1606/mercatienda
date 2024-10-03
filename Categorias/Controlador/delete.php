<?php
require_once('../Modelo/categorias.php');

if ($_POST) {
    try {
        $modeloCategoria = new categorias();

        $id = $_POST['id'];
        $modeloCategoria->delete($id);

        header('Location: ../Vista/index.php?mensaje=success&accion=eliminar');
        exit;
    } catch (Exception $e) {
        header('Location: ../Vista/index.php?mensaje=error&accion=eliminar&detalle=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    header('Location: ../Vista/index.php');
    exit;
}
